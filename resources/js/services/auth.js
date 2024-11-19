/**
 * Get the GitLab access token from the session.
 * Returns null if no token is available.
 */
export async function getGitLabToken() {
    const url = '/api/oidc/token';
    console.log('Fetching GitLab token from:', url);
    
    try {
        const response = await fetch(url);
        if (response.status === 404) {
            console.info('No GitLab token available - user may need to authenticate with GitLab first');
            return null;
        }
        if (!response.ok) {
            throw new Error('Failed to retrieve token');
        }
        const data = await response.json();
        return data.token;
    } catch (error) {
        console.error('Error fetching GitLab token:', error);
        return null;
    }
} 