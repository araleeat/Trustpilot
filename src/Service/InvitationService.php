<?php

namespace Araleeat\Trustpilot\Service;


class InvitationService extends AbstractService
{
    /**
     * @param string $businessUnitId
     * @param array $options
     * @return string
     */
    public function createEmailInvitations(string $businessUnitId, array $options = []): string
    {
        $endPoint = 'private/business-units/{businessUnitId}/email-invitations';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->post($endPoint, $routeParts, $options)->getBody()->getContents();

    }

    /**
     * @param string $businessUnitId
     * @param array $options
     * @return string
     */
    public function createInvitationsLinks(string $businessUnitId, array $options = []): string
    {
        $endPoint = 'private/business-units/{businessUnitId}/invitation-links';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->post($endPoint, $routeParts, $options)->getBody()->getContents();
    }


    /**
     * @param string $businessUnitId
     * @param array $options
     * @return string
     */
    public function getTemplates(string $businessUnitId, array $options = []): string
    {
        $endPoint = 'private/business-units/{businessUnitId}/templates';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->get($endPoint, $routeParts, [], $options)->getBody()->getContents();
    }


}