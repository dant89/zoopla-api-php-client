<?php

namespace Dant89\ZooplaApiClient\Property;

use Dant89\ZooplaApiClient\AbstractHttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class PropertyClient
 * @package Dant89\ZooplaApiClient\Property
 */
class PropertyClient extends AbstractHttpClient
{
    /**
     * Retrieve property listings for a given area.
     *
     * @param array $filters
     * @return JsonResponse
     */
    public function getPropertyListings(array $filters = []): JsonResponse
    {
        $uri = "property_listings";

        return $this->get($uri, $filters);
    }
}
