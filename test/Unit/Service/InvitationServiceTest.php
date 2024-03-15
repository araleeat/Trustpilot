<?php

namespace Araleeat\Trustpilot\Tests\Unit\Service;

use Araleeat\Trustpilot\ClientTrustpilot;
use Araleeat\Trustpilot\Service\InvitationService;

class InvitationServiceTest extends BaseServiceTest
{
    /**
     * @return void
     */
    public function testCreateEmailInvitations()
    {
        try {
            $accessTokenParam = [
                'form_params' => [
                    'replyTo' => 'xx@explain.com',
                    'locale' => 'en-us',
                    'senderName' => 'xx@explain.com',
                    'senderEmail' => 'xx@explain.com',
                    'locationId' => 'test1',
                    'referenceNumber' => 'test-RO-1',
                    'consumerName' => 'test',
                    'consumerEmail' => 'xx@explain.com',
                    'type' => 'email',
                    'serviceReviewInvitation' => [
                        'templateId' => '65452ca4de3b35f491aa436d',
                        'preferredSendTime' => '',
                        'redirectUri' => '',
                        'tags' => []
                    ],
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'x-business-user-id' => $this->businessUnitId,
                ]
            ];
            $client = new ClientTrustpilot($this->getInvitationConfiguration());
            $service = new InvitationService($client);
            $result = $service->createEmailInvitations($this->businessUnitId, $accessTokenParam);
            $this->assertIsString($result);
            $this->assertStringContainsString('id', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }

    /**
     * @return void
     */
    public function testCreateInvitationsLinks()
    {
        try {
            $accessTokenParam = [
                'form_params' => [
                    'locationId' => 'test1',
                    'referenceId' => 'test1',
                    'email' => 'test@explam.com',
                    'name' => 'test',
                    'locale' => 'en-us',
                    'tags' => [],
                    'redirectUri' => ''
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ]
            ];
            $client = new ClientTrustpilot($this->getInvitationConfiguration());
            $service = new InvitationService($client);
            $result = $service->createInvitationsLinks($this->businessUnitId, $accessTokenParam);
            $this->assertIsString($result);
            $this->assertStringContainsString('id', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }


    public function testGetTemplates()
    {
        try {
            $accessTokenParam = [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ]
            ];
            $client = new ClientTrustpilot($this->getInvitationConfiguration());
            $service = new InvitationService($client);
            $result = $service->getTemplates($this->businessUnitId, $accessTokenParam);
            $this->assertIsString($result);
            $this->assertStringContainsString('id', $result);
        } catch (\Exception $e) {
            $this->fail("An exception was thrown: " . $e->getMessage());
        }
    }
}