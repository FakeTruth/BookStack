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

    fetchIssueFromCache(projectId, issueId) {
        const cacheKey = `${projectId}/${issueId}`;
        
        // Return cached issue if available
        const cachedIssue = this.cache.get(cacheKey);
        return cachedIssue;
    }

    async fetchIssue(projectId, issueId) {
        const cacheKey = `${projectId}/${issueId}`;
        
        // Return cached issue if available
        if (this.freshCache.has(cacheKey)) {
            return this.freshCache.get(cacheKey);
        }

        // Add to pending issues
        if (!this.pendingIssues.has(projectId)) {
            this.pendingIssues.set(projectId, new Set());
        }
        this.pendingIssues.get(projectId).add(issueId);

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

    async executeBatchFetch() {
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