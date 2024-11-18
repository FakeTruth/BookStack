import { GitLabService } from '../services/gitlab';

export class MarkdownEnhancement {
    constructor() {
        this.gitlab = new GitLabService();
    }

    async init() {
        const initialized = await this.gitlab.init();
        if (!initialized) {
            return;
        }

        await this.enhanceGitLabReferences();
    }

    async enhanceGitLabReferences() {
        // Find all GitLab issue references in the format: gitlab#projectId/issueId
        const issueRefs = document.querySelectorAll('.page-content p, .page-content li, .page-content td, .comment-box .content p, .comment-box .content li, .comment-box .content td');
        
        // First pass: collect all references and add loading indicators
        const enhancements = [];
        for (const element of issueRefs) {
            const matches = element.innerHTML.match(/gitlab#(\d+)\/(\d+)/g);
            if (!matches) continue;

            for (const match of matches) {
                const [projectId, issueId] = match.replace('gitlab#', '').split('/');
                const issue = this.gitlab.fetchIssueFromCache(projectId, issueId);
                let loadingHtml = '';
                if (!issue) {
                    loadingHtml = `
                    <span class="gitlab-issue-reference">
                    <span class="gitlab-issue-card">
                        <span class="issue-title">
                            Loading issue ${projectId}/${issueId}...
                        </span>
                    </span>
                    </span>`;
                } else {
                    loadingHtml = `
                    <span class="gitlab-issue-reference">
                    <span class="gitlab-issue-card">
                        <span class="issue-title">
                        ${issue.title}
                        </span>
                    </span>
                    </span>`;
                }   
                element.innerHTML = element.innerHTML.replace(match, loadingHtml);
                
                // Store the enhancement info for later
                enhancements.push({
                    element,
                    projectId,
                    issueId,
                    loadingHtml,
                });
            }
        }

        // Second pass: fetch all issues in parallel
        const enhancePromises = enhancements.map(async ({ element, projectId, issueId, loadingHtml }) => {
            try {
                const issue = await this.gitlab.fetchIssue(projectId, issueId);
                if (!issue) {
                    throw new Error('Issue not found');
                }

                // Create enhancement HTML
                const enhancement = document.createElement('span');
                enhancement.className = 'gitlab-issue-reference';
                enhancement.innerHTML = `
                    <span class="gitlab-issue-card">
                        <span class="issue-title">
                            <a href="${issue.web_url}" target="_blank" rel="noopener">
                                #${issue.iid}: ${issue.title}
                            </a>
                        </span>
                        <span class="issue-meta">
                            <span class="status ${issue.state}"><span class="status-text">${issue.state}</span></span><!--<span class="updated">Updated: ${new Date(issue.updated_at).toLocaleDateString()}</span>--></span></span>`;

                element.innerHTML = element.innerHTML.replace(
                    loadingHtml,
                    enhancement.outerHTML
                );
            } catch (error) {
                console.error('Failed to load GitLab issue:', error);
                element.innerHTML = element.innerHTML.replace(
                    loadingHtml,
                    `<span class="gitlab-error">Failed to load issue ${projectId}/${issueId}</span>`
                );
            }
        });

        // Wait for all enhancements to complete
        await Promise.all(enhancePromises);
    }
}
