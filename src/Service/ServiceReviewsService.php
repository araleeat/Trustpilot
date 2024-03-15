<?php

namespace Araleeat\Trustpilot\Service;


class ServiceReviewsService extends AbstractService
{
    /**
     * @param string $reviewId
     * @param array $queryParts
     * @param array $options
     * @return string
     */
    public function getReviews(string $reviewId, array $queryParts = [], array $options = []): string
    {
        $endPoint = 'reviews/{reviewId}';
        $routeParts = ['reviewId' => $reviewId];
        return $this->get($endPoint, $routeParts, $queryParts, $options)->getBody()->getContents();
    }

    /**
     * @param string $reviewId
     * @param array $queryParts
     * @param array $options
     * @return string
     */
    public function getReviewWebLinks(string $reviewId, array $queryParts = [], array $options = []): string
    {
        $endPoint = 'reviews/{reviewId}/web-links';
        $routeParts = ['reviewId' => $reviewId];
        return $this->get($endPoint, $routeParts, $queryParts, $options)->getBody()->getContents();
    }
}