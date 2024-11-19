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

    createIssueReference(groupId, projectId, issueId, issue, showProjectIds) {
        const referenceHtml = `
        <span class="gitlab-issue-reference">
        <span class="gitlab-issue-card">
            <span class="issue-title">
                <a href="${issue.web_url}" target="_blank" rel="noopener">
                    <svg style="margin: 0;" class="svg-icon" data-icon="copy" role="presentation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2m0 16H8V7h11z"></path></svg>
                    ${showProjectIds ? `${issue.project_id}` : ''}#${issue.iid} · ${issue.title}
                </a>
            </span>
            <span class="issue-meta">
                <span class="status ${issue.state}"><span class="status-text">${issue.state}</span></span></span></span></span>`;
        return referenceHtml;
    }

    async enhanceGitLabReferences() {
        // Find all GitLab issue references in the format: gitlab#projectId/issueId
        let issueRefs = document.querySelectorAll('.page-content body, .page-content p, .page-content li, .page-content td, .comment-box .content p, .comment-box .content li, .comment-box .content td');
        const markdownFrames = document.querySelectorAll('.markdown-display');
        if (markdownFrames.length > 0) {
            const markdownIssueRefs = markdownFrames[0].contentWindow.document.querySelectorAll("li");
            issueRefs = [...issueRefs, ...markdownIssueRefs];   
        }
        
        // First pass: collect all references and add loading indicators
        const enhancements = [];
        for (const element of issueRefs) {
            // Match "group/projectId#issueId"
            const matches = element.innerHTML.match(/(\w+)\/(\w+)\#(\d+)/g);
            //const matches = element.innerHTML.match(/gitlab#(\d+)\/(\d+)/g);
            if (!matches) continue;

            for (const match of matches) {
                const [groupId, projectId, issueId] = match.split(/\/|\#/g);
                console.log(`Fetching issue ${groupId}/${projectId}/${issueId}`);
                const issue = this.gitlab.fetchIssueFromCache(groupId, projectId, issueId);
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
                    loadingHtml = this.createIssueReference(groupId, projectId, issueId, issue, false);
                }   
                element.innerHTML = element.innerHTML.replace(match, loadingHtml);
                
                // Store the enhancement info for later
                enhancements.push({
                    element,
                    groupId,
                    projectId,
                    issueId,
                    loadingHtml,
                });
            }
        }

        // Track unique project IDs
        const uniqueProjectIds = new Set(enhancements.map(e => e.projectId));
        const showProjectIds = uniqueProjectIds.size > 1;


        // Second pass: fetch all issues in parallel
        const enhancePromises = enhancements.map(async ({ element, groupId, projectId, issueId, loadingHtml }) => {
            try {
                const issue = await this.gitlab.fetchIssue(groupId, projectId, issueId);
                if (!issue) {
                    throw new Error('Issue not found');
                }

                // Create enhancement HTML
                const referenceHtml = this.createIssueReference(groupId, projectId, issueId, issue, showProjectIds);

                element.innerHTML = element.innerHTML.replace(
                    loadingHtml,
                    referenceHtml
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
