<?php

namespace Dant89\ZooplaApiClient;

interface HttpClientInterface
{
    /**
     * @param  string $uri
     * @return $this
     */
    public function get(string $uri);
}
