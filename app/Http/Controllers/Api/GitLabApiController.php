<?php

namespace BookStack\Http\Controllers\Api;

use BookStack\Http\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitLabApiController extends ApiController
{
    public function graphql(Request $request)
    {
        $token = session('oidc_access_token');
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
