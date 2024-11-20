import {GitLabService} from '../services/gitlab';

export class MarkdownEnhancement {

    constructor() {
        this.gitlab = new GitLabService();
    }

    async init() {
        await this.enhanceGitLabReferences();
    }

    createIssueReference(groupId, projectId, issueId, issue, showProjectIds) {
        let cardText = `${projectId}#${issueId} · Loading ...`;
        let url = '#';
        let state = '';
        let target = '';
        if (issue) {
            cardText = `${showProjectIds ? `${issue.project_id}` : ''}#${issue.iid} · ${issue.title}`;
            url = issue.web_url;
            state = issue.state;
            target = '_blank';
        }
        const referenceHtml = `
        <span class="gitlab-issue-card">
            <svg style="margin: 0;" class="svg-icon gitlab-svg" data-icon="copy" role="presentation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2m0 16H8V7h11z"></path></svg>
            <span class="issue-title">
                <a href="${url}" target="${target}" rel="noopener">
                    ${cardText}
                </a>
            </span>
            <span class="gitlab-status ${state}"><span class="status-text">${state}</span></span></span>`;
        return referenceHtml;
    }

    async enhanceGitLabReferences() {
        // Find all GitLab issue references in the format: gitlab#projectId/issueId
        let searchElements = document.querySelectorAll('.page-content body, .page-content p, .page-content li, .page-content td, .comment-box .content p, .comment-box .content li, .comment-box .content td');
        const markdownFrames = document.querySelectorAll('.markdown-display');
        if (markdownFrames.length > 0) {
            const markdownElements = markdownFrames[0].contentWindow.document.querySelectorAll('p, li, td');
            searchElements = [...searchElements, ...markdownElements];
        }

        // First pass: collect all references (groupId/projectId/issueId)
        const enhancements = [];
        for (const matchElement of searchElements) {
            // Match "group/projectId#issueId"
            const textNodes = Array.from(matchElement.childNodes).filter(
                node => node.nodeType === Node.TEXT_NODE,
            );
            for (const textNode of textNodes) {
                let nextTextNode = textNode;
                const matches = nextTextNode.textContent.match(/(\w+)\/(\w+)#(\d+)/g);
                if (!matches) continue;

                for (const match of matches) {
                    const [groupId, projectId, issueId] = match.split(/\/|#/g);

                    // Create an element to replace the reference with
                    const element = document.createElement('span');
                    element.textContent = match;

                    // Create a range for the match text
                    const range = document.createRange();

                    let matchFound = false;
                    const index = nextTextNode.textContent.indexOf(match);
                    if (index !== -1) {
                        range.setStart(nextTextNode, index);
                        range.setEnd(nextTextNode, index + match.length);
                        range.deleteContents();
                        range.insertNode(element);
                        nextTextNode = element.nextSibling;
                        matchFound = true;
                    }

                    if (!matchFound) {
                        console.warn('Could not find match text to replace:', match);
                        continue;
                    }

                    // Store the enhancement info for later
                    enhancements.push({
                        element,
                        groupId,
                        projectId,
                        issueId,
                    });
                }
            }
        }

        // Track unique project IDs
        const uniqueProjectIds = new Set(enhancements.map(e => e.projectId));
        const showProjectIds = uniqueProjectIds.size > 1;

        // Second pass: show loading indicator including project name if there are multiple projects
        for (const {
            element, groupId, projectId, issueId,
        } of enhancements) {
            const issue = this.gitlab.fetchIssueFromCache(groupId, projectId, issueId);
            element.innerHTML = this.createIssueReference(groupId, projectId, issueId, issue, showProjectIds);
        }

        // Third pass: fetch all issues in parallel
        const enhancePromises = enhancements.map(async ({
            element, groupId, projectId, issueId,
        }) => {
            try {
                const issue = await this.gitlab.fetchIssue(groupId, projectId, issueId);
                if (!issue) {
                    throw new Error('Issue not found');
                }

                // Create enhancement HTML
                const referenceHtml = this.createIssueReference(
                    groupId,
                    projectId,
                    issueId,
                    issue,
                    showProjectIds,
                );

                element.innerHTML = referenceHtml;
            } catch (error) {
                console.error('Failed to load GitLab issue:', error);
                element.innerHTML = `<span class="gitlab-error">Failed to load issue ${projectId}/${issueId}</span>`;
            }
        });

        // Immediately start fetching issues in batches
        this.gitlab.executeBatchFetch();

        // Wait for all enhancements to complete
        await Promise.all(enhancePromises);
    }

}
