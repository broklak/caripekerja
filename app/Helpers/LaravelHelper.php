<?php
/**
 * Created by PhpStorm.
 * User: satrya
 * Date: 12/7/16
 * Time: 1:57 PM
 */

if (! function_exists('asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function asset($path, $secure = null)
    {
        return app('url')->asset(config('app.template').'/'.$path, $secure);
    }
}