<?php

namespace Araleeat\Trustpilot;

use GuzzleHttp\Client as GuzzleClient;
use Araleeat\Trustpilot\Exception\InvalidConfigurationException;

class ClientTrustpilot
{
    /**
     * @var ConfigurationManager
     */
    private ConfigurationManager $configurationManager;


    /**
     * @var GuzzleClient
     */
    private GuzzleClient $httpClient;

    /**
     *
     * Client constructor.
     *
     * @param array $configuration
     * @throws InvalidConfigurationException
     */
    public function __construct(array $configuration)
    {
        $this->configurationManager = new ConfigurationManager($configuration);
        $this->httpClient = new GuzzleClient([
            'base_uri' => $this->configurationManager->getConfigurationValue('base_uri'),
            'headers' => [
                'apikey' => $this->configurationManager->getConfigurationValue('apikey'),
            ],
        ]);
    }

    /**
     * @return GuzzleClient
     */
    public function getHttpClient(): GuzzleClient
    {
        return $this->httpClient;
    }

}
