<?php

namespace Dant89\ZooplaApiClient;

use Dant89\ZooplaApiClient\Authentication\AuthenticationClient;
use Dant89\ZooplaApiClient\Property\PropertyClient;

/**
 * Class Client
 * @package Dant89\ZooplaApiClient
 */
class Client
{
    protected const ALLOWED_RESPONSE_FORMATS = [
        'json' => '.js',
        'xml' => '.xml'
    ];

    /**
     * @var string
     */
    private $baseUrl = 'https://api.zoopla.co.uk';

    /**
     * @var string
     */
    private $apiKey;

    /** @var int */
    private $apiVersion;

    /**
     * @var string
     */
    protected $responseFormat;

    public function __construct(string $apiKey, string $responseFormat = 'json', int $apiVersion = 1)
    {
        $this->apiKey = $apiKey;
        $this->apiVersion = $apiVersion;

        if (!array_key_exists($responseFormat, self::ALLOWED_RESPONSE_FORMATS)) {
            throw new \InvalidArgumentException('Invalid response format specified: "%s"', $responseFormat);
        }

        $this->responseFormat = self::ALLOWED_RESPONSE_FORMATS[$responseFormat];
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return int
     */
    public function getApiVersion(): int
    {
        return $this->apiVersion;
    }

    /**
     * @return string
     */
    public function getResponseFormat(): string
    {
        return $this->responseFormat;
    }

    /**
     * @param string $type
     * @return AuthenticationClient|PropertyClient
     */
    public function getHttpClient(string $type): AbstractHttpClient
    {
        switch ($type) {
            case 'auth':
                $client = new AuthenticationClient($this);
                break;
               case 'property':
                $client = new PropertyClient($this);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $type));
        }

        return $client;
    }
}
