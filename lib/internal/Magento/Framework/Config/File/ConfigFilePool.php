<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Framework\Config\File;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * Stores file key to file name config
 */
class ConfigFilePool
{
    const APP_CONFIG = 'app_config';

    /**
     * Default application config
     *
     * @var array
     */
    private $applicationConfigFiles = [
        self::APP_CONFIG => 'config.php'
    ];

    /**
     * Constructor
     *
     * @param array $additionalConfigFiles
     */
    public function __construct($additionalConfigFiles = [])
    {
        $this->applicationConfigFiles = array_merge($this->applicationConfigFiles, $additionalConfigFiles);
        foreach ($this->applicationConfigFiles as $fileKey => $filePath) {
            $this->applicationConfigFiles[$fileKey] = $filePath;
        }

    }

    /**
     * Returns application config files
     *
     * @return array
     */
    public function getPaths()
    {
        return $this->applicationConfigFiles;
    }

    /**
     * Returns file path by config key
     *
     * @param string $fileKey
     * @return string
     * @throws \Exception
     */
    public function getPath($fileKey)
    {
        if (!isset($this->applicationConfigFiles[$fileKey])) {
            throw new \Exception('File config key does not exist.');
        }
        return $this->applicationConfigFiles[$fileKey];
    }
}
