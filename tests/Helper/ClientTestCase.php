<?php

namespace Tests\Helper;

use Dant89\ZooplaApiClient\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTestCase
 * @package Tests\Helper
 */
class ClientTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $apiKey = '';

    /**
     * @var int
     */
    protected $apiVersion = 1;

    /**
     * @var string
     */
    protected $responseFormat ='json';
    /**
     * @var Client
     */
    protected $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new Client($this->apiKey, $this->responseFormat, $this->apiVersion);
    }
}
