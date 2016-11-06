<?php

namespace PluginTracking\Google;

use PluginTracking\ViewLoader;

Class TagManager{
    CONST ID = 'GTM-M7J8CB';

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
        if(is_null(self::$instance))
        {
            self::$instance = new TagManager();
        }

        return self::$instance;
    }

    public function getPath()
    {
        return implode(DIRECTORY_SEPARATOR, [$this->basePath, 'script_google_tag_manager.php']);
    }

    public function getData()
    {
        return [
            'gtm_id' => self::ID
        ];
    }

    public function getScript()
    {
        return ViewLoader::getInstance()->load($this->getPath(), $this->getData());
    }
}