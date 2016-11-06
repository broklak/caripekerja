<?php

namespace App\Libraries;

use App\Libraries\Exceptions\WarmingUpCacheException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class WarmUpCache
{

    const CACHE_KEY_CATEGORIES = 'categories';
    const CACHE_KEY_CATEGORIES_ROUTE_MAPPING = 'categoryRouteMapping';
    const CACHE_KEY_LOCATION = 'locations';
    const CACHE_KEY_REGION = 'regions';
    const CACHE_KEY_CITY= 'cities';
    const CACHE_KEY_SEO_CATEGORIES = 'seo:categories';
    const CACHE_KEY_CHAT_TEMPLATE = 'chat:template';

    /**
     * @var OnewebCacheKey $onewebCacheKey
     */
    private $cacheKey;

    /**
     * @var Collection
     */
    private $items;

    public function __construct(CacheKey $cacheKey)
    {
        $this->cacheKey = $cacheKey;
        $this->items = collect([]);
    }

    private function checkCacheIsWarmed($cacheKeyname)
    {
        if (!is_null($this->items->get($cacheKeyname))) {
            return $this->items->get($cacheKeyname);
        }

//        if (!$data = Cache::get($this->cacheKey->generateCacheKey($cacheKeyname))) {
//            throw new WarmingUpCacheException('Please warming up the cache : `php artisan warmup all --reset=0 --keepoldcache=0`');
//        }

        // CACHE STILL NOT READY
        $data = null;

        $this->items->put($cacheKeyname, $data);
        return $data;
    }

    public function getAllCategories()
    {
        return $this->checkCacheIsWarmed(self::CACHE_KEY_CATEGORIES);
    }

    public function getCategoryRouteMapping()
    {
        return $this->checkCacheIsWarmed(self::CACHE_KEY_CATEGORIES_ROUTE_MAPPING);
    }

    public function getAllLocations()
    {
        return $this->checkCacheIsWarmed(self::CACHE_KEY_LOCATION);
    }

    public function getAllRegions()
    {
        return $this->checkCacheIsWarmed(self::CACHE_KEY_REGION);
    }

    public function getAllCities()
    {
        return $this->checkCacheIsWarmed(self::CACHE_KEY_CITY);
    }

    public function getSeoCategories()
    {
        return $this->checkCacheIsWarmed(self::CACHE_KEY_SEO_CATEGORIES);
    }

    public function getChatTemplates()
    {
        return $this->checkCacheIsWarmed(self::CACHE_KEY_CHAT_TEMPLATE);
    }

    public function getBuildNumber()
    {
        return $this->cacheKey->getBuildNumber();
    }
}
