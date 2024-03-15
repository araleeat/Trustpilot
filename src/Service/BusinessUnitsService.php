<?php

namespace Araleeat\Trustpilot\Service;


class BusinessUnitsService extends AbstractService
{
    /**
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getBusinessUnitsAll(array $query = [], array $options = []): string
    {
        $endPoint = 'business-units/all';
        return $this->get($endPoint, [], $query, $options)->getBody()->getContents();
    }

    /**
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getBusinessUnitsFind(array $query = [], array $options = []): string
    {
        $endPoint = 'business-units/find';
        return $this->get($endPoint, [], $query, $options)->getBody()->getContents();
    }

    /**
     *
     * @param string $businessUnitId
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getPublicBusinessUnit(string $businessUnitId, array $query = [], array $options = []): string
    {
        $endPoint = 'business-units/{businessUnitId}';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->get($endPoint, $routeParts, $query, $options)->getBody()->getContents();
    }

    /**
     *
     * @param string $businessUnitId
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getBusinessUnitReviews(string $businessUnitId, array $query = [], array $options = []): string
    {
        $endPoint = 'business-units/{businessUnitId}/reviews';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->get($endPoint, $routeParts, $query, $options)->getBody()->getContents();
    }

    /**
     *
     * @param string $businessUnitId
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getBusinessUnitAllReviews(string $businessUnitId, array $query = [], array $options = []): string
    {
        $endPoint = 'business-units/{businessUnitId}/all-reviews';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->get($endPoint, $routeParts, $query, $options)->getBody()->getContents();
    }


    /**
     *
     * @param string $businessUnitId
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getBusinessUnitCategories(string $businessUnitId, array $query = [], array $options = []): string
    {
        $endPoint = 'business-units/{businessUnitId}/categories';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->get($endPoint, $routeParts, $query, $options)->getBody()->getContents();
    }

    /**
     *
     * @param string $businessUnitId
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getBusinessUnitWebLinks(string $businessUnitId, array $query = [], array $options = []): string
    {
        $endPoint = 'business-units/{businessUnitId}/web-links';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->get($endPoint, $routeParts, $query, $options)->getBody()->getContents();
    }

    /**
     * @param string $businessUnitId
     * @param array $query
     * @param array $options
     * @return string
     */
    public function getBusinessUnitPrivateReviews(string $businessUnitId, array $query = [], array $options = []): string
    {
        $endPoint = 'private/business-units/{businessUnitId}/reviews';
        $routeParts = ['businessUnitId' => $businessUnitId];
        return $this->get($endPoint, $routeParts, $query, $options)->getBody()->getContents();
    }
}