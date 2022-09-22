<?php

namespace App\Services\ThirdPartyConnection;

use App\Models\ThirdPartyConnectionConfig\WoocommerceConnectionConfig;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class WoocommerceConnection
{
    protected $apiVersion;

    public function __construct(protected WoocommerceConnectionConfig $connectionConfig) {}

    public function get(string $endpoint, array $queryString = [], array $headers = []): Response
    {
        return Http::withBasicAuth(
            $this->connectionConfig->access_key,
            $this->connectionConfig->secret
        )
            ->withHeaders($headers)
            ->get(
                $this->buildPath($endpoint),
                $queryString
            );
    }

    public function post($endpoint, $body, array $headers = []): Response
    {
        return Http::withBasicAuth(
            $this->connectionConfig->access_key,
            $this->connectionConfig->secret
        )
            ->withHeaders($headers)
            ->post(
                $this->buildPath($endpoint),
                $body
            );
    }

    private function buildPath(string $endpoint): string
    {
        return $this->connectionConfig->uri . $endpoint;
    }
}
