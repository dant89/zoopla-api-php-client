<?php

namespace Dant89\ZooplaApiClient;

use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class AbstractHttpClient
 * @package Dant89\ZooplaApiClient
 */
class AbstractHttpClient
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $baseUrl = rtrim($this->client->getBaseUrl(), '/') . '/';
        $this->httpClient = new \GuzzleHttp\Client(
            [
                'base_uri' => $baseUrl . 'api/v' . $this->client->getApiVersion(). '/',
                'headers' => [
                    'User-Agent' => 'ZOOPLA-API-PHP-CLIENT/1.0.0',
                ]
            ]
        );
    }

    /**
     * @param string $url
     * @param array $filters
     * @return JsonResponse
     * @throws ClientExceptionInterface
     * @throws GuzzleException
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function get(string $url, array $filters = []): JsonResponse
    {
        return $this->generateHttpResponse('GET', $url, ['query' => $filters]);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return JsonResponse
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws GuzzleException
     */
    private function generateHttpResponse(string $method, string $url, array $options = []): JsonResponse
    {
        /** @var ResponseInterface $httpResponse */
        $httpResponse = $this->httpClient->request($method, $url, $options);
        return new JsonResponse(
            $httpResponse->getContent(),
            $httpResponse->getStatusCode(),
            $httpResponse->getHeaders(),
            true
        );
    }
}
