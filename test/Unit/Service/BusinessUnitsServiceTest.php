<?php

namespace Araleeat\Trustpilot\Tests\Unit\Service;

use Araleeat\Trustpilot\ClientTrustpilot;
use Araleeat\Trustpilot\Service\BusinessUnitsService;

class BusinessUnitsServiceTest extends BaseServiceTest
{
    /**
     * @return void
     */
    public function testGetBusinessUnitsAll()
    {
        try {
            $query = [
                'country' => 'us',
                'perPage' => 10,
                'cursor' => 'VTyZLpgwQW9JRlFBSkNRcWV6eTBvNE5EZ3hOek0xTmpBd01EQXdOalF3TURBMU1ESTJaalEwCg'
            ];
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessUnitsService($client);
            $result = $service->getBusinessUnitsAll($query);
            $this->assertIsString($result);
            $this->assertStringContainsString('businessUnits', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }


    /**
     * @return void
     */
    public function testGetBusinessUnitsFind()
    {
        try {
            $name = 'trustpilot.com';
            $query = [
                'name' => $name
            ];
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessUnitsService($client);
            $result = $service->getBusinessUnitsFind($query);
            $this->assertIsString($result);
            $this->assertStringContainsString($name, $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testGetPublicBusinessUnit()
    {
        try {
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessUnitsService($client);
            $result = $service->getPublicBusinessUnit($this->businessUnitId);
            $this->assertIsString($result);
            $this->assertStringContainsString($this->businessUnitId, $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testGetBusinessUnitReviews()
    {
        try {
            $query = [
                'stars' => 5,
                'language' => 'en-us'
            ];
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessUnitsService($client);
            $result = $service->getBusinessUnitReviews($this->businessUnitId, $query);
            $this->assertIsString($result);
            $this->assertStringContainsString($this->businessUnitId, $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testGetBusinessUnitAllReviews()
    {
        try {
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessUnitsService($client);
            $result = $service->getPublicBusinessUnit($this->businessUnitId);
            $this->assertIsString($result);
            $this->assertStringContainsString($this->businessUnitId, $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testGetBusinessUnitCategories()
    {
        try {
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessUnitsService($client);
            $result = $service->getBusinessUnitCategories($this->businessUnitId);
            $this->assertIsString($result);
            $this->assertStringContainsString('categoryId', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }


    /**
     * @return void
     */
    public function testGetBusinessUnitWebLinks()
    {
        try {
            $query = [
                'locale' => 'en',
            ];
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessUnitsService($client);
            $result = $service->getBusinessUnitWebLinks($this->businessUnitId, $query);
            $this->assertIsString($result);
            $this->assertStringContainsString('profileUrl', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testGetBusinessUnitPrivateReviews()
    {
        try {
            $query = [
                'referralEmail' => 'junyi.han@uhomes.com',
//                'language' => 'en-us',
//                'referenceId'=>'customer1014982'
            ];
            $options = [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ]
            ];
            $client = new ClientTrustpilot($this->configuration);
            $service = new BusinessUnitsService($client);
            $result = $service->getBusinessUnitPrivateReviews($this->businessUnitId, $query, $options);
            echo $result;die;
            $this->assertIsString($result);
            $this->assertStringContainsString($this->businessUnitId, $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }


}
