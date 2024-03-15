<?php

namespace Araleeat\Trustpilot\Tests\Unit\Service;

use Araleeat\Trustpilot\ClientTrustpilot;
use Araleeat\Trustpilot\Service\AuthenticationService;
use Araleeat\Trustpilot\Service\BusinessSignupService;

class AuthenticationServiceTest extends BaseServiceTest
{
    /**
     * @return void
     */
    public function testGetAccessToken()
    {
        try {
            $accessTokenParam = [
                'form_params' => [
                    'grant_type' => '',
                    'username' => '',
                    'password' => '',
                ],
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($this->apikey . ':' . $this->apiSecret),
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ]
            ];
            $client = new ClientTrustpilot($this->configuration);
            $service = new AuthenticationService($client);
            $result = $service->getAccessToken($accessTokenParam);
            $this->assertIsString($result);
            $this->assertStringContainsString('access_token', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }


}