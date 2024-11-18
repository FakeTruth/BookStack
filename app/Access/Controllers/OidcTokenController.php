<?php

namespace BookStack\Access\Controllers;

use BookStack\Http\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class OidcTokenController extends Controller
{
    public function __construct()
    {
        Log::info('OidcTokenController constructed');
        $this->middleware(['auth']);
    }

    public function getToken(): JsonResponse
    {
        \Log::info('Session data in token controller:', [
            'all_keys' => array_keys(session()->all()),
            'has_gitlab_token' => session()->has('gitlab_access_token'),
            'has_oidc_token' => session()->has('oidc_id_token'),
            'gitlab_access_token' => session()->get('gitlab_access_token'),
        ]);
        
        $tokenData = session()->get('gitlab_access_token');
        if (!$tokenData) {
            \Log::warning('No gitlab_access_token found in session');
            return response()->json(['error' => 'No token available'], 404);
        }

        \Log::info('Token found and being returned');
        
        return response()->json(['token' => $tokenData]);
    }
}
