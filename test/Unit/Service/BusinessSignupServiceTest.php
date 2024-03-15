<?php

namespace Araleeat\Trustpilot\Tests\Unit\Service;

use Araleeat\Trustpilot\ClientTrustpilot;
use Araleeat\Trustpilot\Service\BusinessSignupService;

class BusinessSignupServiceTest extends BaseServiceTest
{

    /**
     * @return void
     */
    public function testGetDomainAvailability()
    {
        try {
            $query = ['domain' => 'uhomes'];
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessSignupService($client);
            $result = $service->getDomainAvailability($query);
            $this->assertIsString($result);
            $this->assertStringContainsString('domainIsAvailable', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }


}