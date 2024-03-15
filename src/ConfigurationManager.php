<?php

namespace Araleeat\Trustpilot;

use Araleeat\Trustpilot\Exception\InvalidConfigurationException;

class ConfigurationManager
{
    /**
     * @var array
     */
    private array $configuration;

    /**
     * ConfigurationManager constructor.
     *
     * @param array $configuration
     * @throws InvalidConfigurationException
     */
    public function __construct(array $configuration)
    {
        $this->validateAndLoadConfiguration($configuration);
    }

    /**
     * Validates the configuration array and loads it if valid.
     *
     * @param array $configuration
     * @throws InvalidConfigurationException
     */
    private function validateAndLoadConfiguration(array $configuration): void
    {
        // Validate configuration keys and values
        $requiredKeys = ['base_uri', 'apikey'];
        foreach ($requiredKeys as $key) {
            if (!isset($configuration[$key])) {
                throw new InvalidConfigurationException("Missing required configuration key: '$key'");
            }
            // Add additional validation for each key if needed
        }

        // Configuration is valid, load it
        $this->configuration = $configuration;
    }

    /**
     * Gets the loaded configuration.
     *
     * @return array
     */
    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    /**
     * Gets a specific configuration value.
     *
     * @param string $key
     * @return mixed|null
     */
    public function getConfigurationValue(string $key)
    {
        return $this->configuration[$key] ?? null;
    }
}