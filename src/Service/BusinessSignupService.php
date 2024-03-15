<?php

namespace Araleeat\Trustpilot\Service;


class BusinessSignupService extends AbstractService
{
    /**
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getDomainAvailability(array $query = [], array $options = []): string
    {
        return $this->get('business-signup/domain-availability', [], $query, $options)->getBody()->getContents();
    }

}