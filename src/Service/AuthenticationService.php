<?php

namespace Araleeat\Trustpilot\Service;


class AuthenticationService extends AbstractService
{
    /**
     * @param array $options
     * @return string
     */
    public function getAccessToken(array $options = []): string
    {
        $endPoint = 'oauth/oauth-business-users-for-applications/accesstoken';
        return $this->post($endPoint, [], $options)->getBody()->getContents();
    }

}


