<?php

namespace Dant89\ZooplaApiClient\Authentication;

use Dant89\ZooplaApiClient\AbstractHttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AuthenticationClient
 * @package Dant89\ZooplaApiClient\Authentication
 */
class AuthenticationClient extends AbstractHttpClient
{
    /**
     * Obtain a session ID parameter for use with associated method calls.
     *
     * @return JsonResponse
     */
    public function getSessionId(): JsonResponse
    {
        $uri = "get_session_id";
        return $this->get($uri);
    }
}
