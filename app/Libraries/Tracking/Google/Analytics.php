<?php

namespace PluginTracking\Google;

use PluginTracking\ViewLoader;

Class Analytics{
    CONST ID = 'UA-5908313-20';

    /**
     * @var Analytics
     */
    private static $instance;

    private $basePath;

    public function __construct()
    {
        $this->basePath = dirname(__FILE__);
    }

    public static function getInstance()
    {
        if(is_null(self::$instance)) {
            self::$instance = new Analytics();
        }

        return self::$instance;
    }

    public function getPath()
    {
        return implode(DIRECTORY_SEPARATOR, [$this->basePath, 'script_google_analytics.php']);
    }

    public function getData()
    {
        return [
            'google_id' => self::ID
        ];
    }

    public function getScript()
    {
        return ViewLoader::getInstance()->load($this->getPath(), $this->getData());
    }
}