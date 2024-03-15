<?php

namespace Araleeat\Trustpilot\Service;

use GuzzleHttp\Psr7\Response;
use Araleeat\Trustpilot\ClientTrustpilot;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractService
{
    /**
     * @var ClientTrustpilot
     */
    protected ClientTrustpilot $client;

    /**
     * @param ClientTrustpilot $client
     */
    public function __construct(ClientTrustpilot $client)
    {
        $this->client = $client;
    }

    /**
     * @return ClientTrustpilot
     */
    public function getClient(): ClientTrustpilot
    {
        return $this->client;
    }

    /**
     * @param string $endPoint
     * @param array $routeParts
     * @param array $options
     * @return Response|ResponseInterface
     * @throws
     */
    public function post(string $endPoint, array $routeParts = [], array $options = [])
    {
        try {
            $endPoint = $this->replaceEndpointVariables($endPoint, $routeParts);
            return $this->client->getHttpClient()->request('POST', $endPoint, $options);
        } catch (\Exception $exception) {
            error_log($exception->getMessage());
            $message = new Response(
                $exception->getCode(),
                [
                    'Content-Type' => 'application/json; charset=utf-8;'
                ],
                $exception->getMessage()
            );

            return $message;
        }
    }

    /**
     * @param string $endPoint
     * @param array $routeParts
     * @param array $queryParts
     * @param array $options
     * @return Response|ResponseInterface
     * @throws
     */
    public function get(string $endPoint, array $routeParts = [], array $queryParts = [], array $options = [])
    {
        try {
            $endPoint = $this->replaceEndpointVariables($endPoint, $routeParts);
            $endPoint = $this->combineQueryParts($endPoint, $queryParts);
            return $this->client->getHttpClient()->request('GET', $endPoint, $options);
        } catch (\Exception $exception) {
            error_log($exception->getMessage());
            $message = new Response(
                $exception->getCode(),
                [
                    'Content-Type' => 'application/json; charset=utf-8;'
                ],
                $exception->getMessage()
            );

            return $message;
        }
    }

    /**
     * 替换endpoint链接参数
     *
     * @param string $endPoint
     * @param array $replacements
     * @return mixed|string
     */
    protected function replaceEndpointVariables(string $endPoint, array $replacements): string
    {
        $regex = '/{([a-zA-Z]+)}/';
        return preg_replace_callback($regex, function ($matches) use ($replacements) {
            $replacementKey = $matches[1];
            if (array_key_exists($replacementKey, $replacements)) {
                return $replacements[$replacementKey];
            } else {
                return $matches[0];
            }
        }, $endPoint);
    }

    /**
     * @param string $endPoint
     * @param array $queryParts
     * @return mixed|string
     */
    protected function combineQueryParts(string $endPoint, array $queryParts)
    {
        $parsedUrl = parse_url($endPoint);
        $combinedQueryParts = [];
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $combinedQueryParts);
        }
        $combinedQueryParts = array_merge($combinedQueryParts, $queryParts);
        $query = http_build_query($combinedQueryParts);
        $combinedUrl = $parsedUrl['path'];
        if (!empty($query)) {
            $combinedUrl .= '?' . $query;
        }
        return $combinedUrl;
    }
}