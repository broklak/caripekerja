<?php

namespace App\Libraries;

class CacheKey
{
    private $build_number;

    const KEY_BUILDNUMBER = 'buildNumber';

    const OLD_BUILD_NUMBER_KEEPED = 5;

    public function __construct()
    {
        $this->build_number = 4;
        $this->setBuildNumber();
    }

    public function setBuildNumber($reset = false)
    {
        if ($reset === false) {
            $this->build_number = $this->getBuildNumber();
            return $this->build_number;
        }

        return $this->writeBuildNumberToFile();
    }

    private function writeBuildNumberToFile()
    {
        $this->build_number = json_decode(file_get_contents(config('app.build_number_path')), true)['number'];
        $path = implode(DIRECTORY_SEPARATOR, [dirname(__FILE__), '..', 'Helper', 'build.php']);
        file_put_contents( $path, "<?php \nnamespace App\Helper\BuildNumber;\n\nfunction get_build_number(){\n\treturn " . var_export( $this->build_number, true ) . ";\n}\n", LOCK_EX );
        return $this->build_number;
    }

    public function getBuildNumber()
    {
        return $this->build_number;
    }

    public function generateCacheKey($cacheKey, $useBuildNumber = true)
    {
        return $useBuildNumber === true ? sprintf('%s:%s', $this->build_number, $cacheKey) : sprintf('%s', $cacheKey);
    }

    public function generateOldCacheKey($cacheKey, $useBuildNumber = true)
    {
        if ($useBuildNumber === true) {
            if (intval($this->build_number) - self::OLD_BUILD_NUMBER_KEEPED <= 0) {
                return false;
            }

            return sprintf('%s:%s', intval($this->build_number) - self::OLD_BUILD_NUMBER_KEEPED, $cacheKey);
        }

        return sprintf('%s', $cacheKey);
    }

    public function generateHashedCacheKey($cacheKey, $useBuildNumber = true)
    {
        $cacheKey = $this->hashCacheKey($cacheKey);
        return $useBuildNumber === true ? sprintf('%s:%s', $this->build_number, $cacheKey) : sprintf('%s', $cacheKey);
    }

    private function hashCacheKey($cacheKey)
    {
        return md5($cacheKey);
    }
}