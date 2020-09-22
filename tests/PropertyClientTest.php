<?php

namespace Tests;

use Dant89\ZooplaApiClient\Property\PropertyClient;
use Tests\Helper\ClientTestCase;

/**
 * Class PropertyClientTest
 * @package Tests
 */
class PropertyClientTest extends ClientTestCase
{
    /**
     * @var PropertyClient
     */
    protected $propertyClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->propertyClient = $this->client->getHttpClient('property');
    }

    public function testGetPropertyListings()
    {
        $response = $this->propertyClient->getPropertyListings();
        $this->assertEquals(200, $response->getStatusCode());
        var_dump($response->getContent());
    }
}
