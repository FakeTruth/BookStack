<?php

namespace BookStack\Http\Controllers\Api;

use BookStack\Http\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitLabApiController extends ApiController
{
    public function getIssues(Request $request)
    {
        $token = session('gitlab_access_token');
        if (empty($token)) {
            return $this->jsonError('GitLab authentication not found', 401);
        }

        // Get project and issue IDs from query parameters
        $projectId = $request->query('project_id');
        $issueIds = $request->query('iids', []);

        if (empty($projectId) || empty($issueIds)) {
            return $this->jsonError('Project ID and issue IDs required', 400);
        }

        try {
            $gitlabUrl = config('gitlablinks.gitlab_url');

            // Build the request
            $request = Http::withToken($token);

            // Log the full URL that will be sent
            $fullUrl = "{$gitlabUrl}/api/v4/projects/{$projectId}/issues";
            $queryParams = http_build_query(['iids' => $issueIds]);
            \Log::info('GitLab API full request:', [
                'url' => $fullUrl . '?' . $queryParams,
                'token' => $token,
                'iids' => $issueIds
            ]);

            // Make the request
            $response = $request->get($fullUrl, ['iids' => $issueIds]);

            \Log::info('GitLab API response:', [
                'status' => $response->status(),
                'body' => $response->body(),
                'headers' => $response->headers()
            ]);

            if (!$response->successful()) {
                return $this->jsonError('Failed to fetch issues: ' . $response->status(), $response->status());
            }

            return response()->json($response->json());
        } catch (\Exception $e) {
            return $this->jsonError('Failed to fetch GitLab issues: ' . $e->getMessage(), 500);
        }
    }

    public function graphql(Request $request)
    {
        $token = session('gitlab_access_token');
        if (empty($token)) {
            return $this->jsonError('GitLab authentication not found', 401);
        }

        try {
            $gitlabUrl = config('gitlablinks.gitlab_url');
            $graphqlEndpoint = "{$gitlabUrl}/api/graphql";

            // Validate request body contains GraphQL query
            if (!$request->has('query')) {
                return $this->jsonError('GraphQL query is required', 400);
            }

            // Make the request to GitLab's GraphQL API
            $response = Http::withToken($token)
                ->post($graphqlEndpoint, [
                    'query' => $request->input('query')
                ]);

            \Log::info('GitLab GraphQL API request:', [
                'url' => $graphqlEndpoint,
                'query' => $request->input('query')
            ]);

            \Log::info('GitLab GraphQL API response:', [
                'status' => $response->status(),
                'body' => $response->json()
            ]);

            if (!$response->successful()) {
                return $this->jsonError('Failed to fetch from GitLab: ' . $response->status(), $response->status());
            }

            // Check for GraphQL errors in the response
            $responseData = $response->json();
            if (isset($responseData['errors'])) {
                return $this->jsonError('GraphQL query failed: ' . json_encode($responseData['errors']), 400);
            }

            return response()->json($responseData);
        } catch (\Exception $e) {
            return $this->jsonError('Failed to execute GraphQL query: ' . $e->getMessage(), 500);
        }
    }
}
