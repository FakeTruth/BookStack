export class GitLabService {
    constructor() {
        this.baseUrl = window.gitlabBaseUrl || 'https://gitlab.com/api/v4';
        this.cache = new Map();
        this.freshCache = new Map();
        this.pendingIssues = new Map();
        this.batchTimeout = null;
        this.CACHE_KEY = 'gitlab_issues_cache';
        this.CACHE_EXPIRY = 1000 * 60 * 60; // 1 hour
        this.loadCacheFromStorage();
    }

    async init() {
        return true;
    }

    loadCacheFromStorage() {
        try {
            const cached = localStorage.getItem(this.CACHE_KEY);
            if (cached) {
                const { issues, timestamp } = JSON.parse(cached);
                // Clear cache if expired
                if (Date.now() - timestamp > this.CACHE_EXPIRY) {
                    localStorage.removeItem(this.CACHE_KEY);
                    return;
                }
                // Restore cache
                Object.entries(issues).forEach(([key, value]) => {
                    this.cache.set(key, value);
                });
            }
        } catch (e) {
            console.error('Error loading GitLab cache:', e);
        }
    }

    saveCacheToStorage() {
        try {
            const cacheData = {
                timestamp: Date.now(),
                issues: Object.fromEntries(this.cache)
            };
            localStorage.setItem(this.CACHE_KEY, JSON.stringify(cacheData));
        } catch (e) {
            console.error('Error saving GitLab cache:', e);
        }
    }

    fetchIssueFromCache(groupId, projectId, issueId) {
        const cacheKey = `${groupId}/${projectId}/${issueId}`;
        
        // Return cached issue if available
        const cachedIssue = this.cache.get(cacheKey);
        return cachedIssue;
    }

    async fetchIssue(groupId, projectId, issueId) {
        const cacheKey = `${groupId}/${projectId}/${issueId}`;
        
        // Return cached issue if available
        if (this.freshCache.has(cacheKey)) {
            return this.freshCache.get(cacheKey);
        }

        // Add to pending issues
        if (!this.pendingIssues.has(groupId)) {
            console.log(`Adding group ${groupId} to pending issues`);
            this.pendingIssues.set(groupId, new Map());
        }
        const projectMap = this.pendingIssues.get(groupId);
        if (!projectMap.has(projectId)) {
            projectMap.set(projectId, new Set());
        }
        projectMap.get(projectId).add(issueId);

        // Set up batch timeout if not already set
        if (!this.batchTimeout) {
            this.batchTimeout = setTimeout(() => this.executeBatchFetch(), 100);
        }

        // Return a promise that will resolve when the issue is fetched
        return new Promise((resolve, reject) => {
            const checkCache = () => {
                if (this.freshCache.has(cacheKey)) {
                    resolve(this.freshCache.get(cacheKey));
                } else {
                    setTimeout(checkCache, 50);
                }
            };
            checkCache();
        });
    }

    // ... existing constructor code ...

    async executeBatchFetch() {
        this.batchTimeout = null;
        const pendingIssues = new Map(this.pendingIssues);
        this.pendingIssues.clear();

        console.log('Executing batch fetch for pending issues:', pendingIssues);

        try {
            const groupIds = Array.from(pendingIssues.keys());
            console.log('Fetching paths for group IDs:', groupIds);

            // Prepare the GraphQL query
            const issueSelections = Array.from(pendingIssues.entries()).map(([groupId, projectMap]) => {
                return Array.from(projectMap.entries()).map(([projectId, issueIds]) => {
                    const projectPath = `${groupId}/${projectId}`;
                    console.log(`Building query for project ${projectId} with path ${projectPath}`);
                    
                    if (!projectPath) {
                        console.error(`No project path found for ID: ${projectId}`);
                        throw new Error(`Could not find project path for ID: ${projectId}`);
                    }
    
                    const issueFilters = Array.from(issueIds).map(iid => `"${iid}"`).join(', ');
                    return `
                        ${groupId}__${projectId}: project(fullPath: "${projectPath}") {
                            issues(first: ${issueIds.size}, iids: [${issueFilters}]) {
                                nodes {
                                    iid
                                    title
                                    webUrl
                                    state
                                    updatedAt
                                }
                            }
                        }
                    `;
                });
            });

            const query = `
                query {
                    ${issueSelections.join('\n')}
                }
            `;

            console.log('Final GraphQL query:', query);

            const response = await window.$http.post('/api/gitlab/graphql', {
                query: query
            });

            console.log('GraphQL response:', response.data);

            // Process and cache the results
            if (response.data.data) {
                Object.entries(response.data.data).forEach(([projectKey, projectData]) => {
                    const [groupId, projectId] = projectKey.split('__');
                    console.log(`Processing results for group ${groupId} and project ${projectId}:`, projectData);
                    
                    projectData.issues.nodes.forEach(issue => {
                        const cacheKey = `${groupId}/${projectId}/${issue.iid}`;
                        this.cache.set(cacheKey, {
                            iid: issue.iid,
                            title: issue.title,
                            web_url: issue.webUrl,
                            state: issue.state,
                            updated_at: issue.updatedAt,
                            project_id: projectId
                        });
                        this.freshCache.set(cacheKey, this.cache.get(cacheKey));
                    });
                });
                this.saveCacheToStorage();
            } else {
                console.warn('No data found in GraphQL response');
            }
        } catch (error) {
            console.error('Error in executeBatchFetch:', {
                error,
                message: error.message,
                response: error.response?.data
            });
            throw error;
        }
    }

    async executeBatchFetchRestApi() {
        this.batchTimeout = null;
        const pendingIssues = new Map(this.pendingIssues);
        this.pendingIssues.clear();

        try {
            // Fetch issues for each project
            for (const [projectId, issueIds] of pendingIssues) {
                // Format the query string manually to ensure proper array parameter format
                const issueIdsQuery = Array.from(issueIds).map(id => `iids[]=${id}`).join('&');
                const url = `/api/gitlab/issues?project_id=${projectId}&${issueIdsQuery}`;
                
                const response = await window.$http.get(url);

                // Cache the results
                if (Array.isArray(response.data)) {
                    for (const issue of response.data) {
                        const cacheKey = `${projectId}/${issue.iid}`;
                        this.cache.set(cacheKey, issue);
                        this.freshCache.set(cacheKey, issue);
                    }
                    this.saveCacheToStorage();
                }
            }
        } catch (error) {
            console.error('Error fetching GitLab issues:', error);
            throw error;
        }
    }
} 