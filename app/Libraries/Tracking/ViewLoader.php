<?php

namespace PluginTracking;

Class ViewLoader{

    /**
     * @var ViewLoader
     */
    private static $instance;

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new ViewLoader();
        }

        return self::$instance;
    }

    public function load($path, $variables = [])
    {
        if(!is_array($variables))
        {
            throw new \Exception('variables parameter must be an array');
        }

        # extract array variable
        extract($variables);

        #Buffer the output
        ob_start();

        include($path);

        $buffer = ob_get_contents();
        @ob_end_clean();

        return $buffer;
    }
}