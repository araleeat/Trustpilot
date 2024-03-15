<?php

namespace Araleeat\Trustpilot\Tests\Unit\Service;

use Araleeat\Trustpilot\ClientTrustpilot;
use Araleeat\Trustpilot\Service\ServiceReviewsService;

class ServiceReviewServiceTest extends BaseServiceTest
{
    /**
     * @return void
     */
    public function testGetReviews()
    {
        try {
            $reviewId = '65e8710493b5faa5f3917830';
            $client = new ClientTrustpilot($this->configuration);
            $service = new ServiceReviewsService($client);
            $result = $service->getReviews($reviewId);
            $this->assertIsString($result);
            $this->assertStringContainsString('businessUnit', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testGetReviewWebLinks()
    {
        try {
            $reviewId = '65e8710493b5faa5f3917830';
            $queryParts = ['locale' => 'en-us'];
            $client = new ClientTrustpilot($this->configuration);
            $service = new ServiceReviewsService($client);
            $result = $service->getReviewWebLinks($reviewId, $queryParts);
            $this->assertIsString($result);
            $this->assertStringContainsString('links', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }

}