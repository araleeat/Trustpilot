<?php

namespace Araleeat\Trustpilot\Tests\Unit\Service;

use PHPUnit\Framework\TestCase;

class BaseServiceTest extends TestCase
{
    protected array $configuration;
    protected string $apikey = '';
    protected string $apiSecret = '';

    protected string $businessUnitId = '62b050f0efa05fbf04326ec5';

    protected string $accessToken = 'eCAjzwZ916dfnB1Mga1YCFrBpGKQ';

    public function setUp(): void
    {
        $this->configuration = $this->getConfiguration();
    }

    /**
     * @return string[]
     */
    protected function getConfiguration(): array
    {
        // It's better to get this from an environment variable or a configuration file
        return [
            'base_uri' => 'https://api.trustpilot.com/v1/',
            'apikey' => $this->apikey,
            'Authorization' => 'Basic ' . base64_encode($this->apikey . ':' . $this->apiSecret),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    /**
     * @return array
     */
    protected function getInvitationConfiguration()
    {
        return [
            'base_uri' => 'https://invitations-api.trustpilot.com/v1/',
            'apikey' => $this->apikey,
        ];
    }
}
