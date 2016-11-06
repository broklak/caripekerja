<?php

namespace App\Libraries;

use App\Libraries\Cache\Seo as CacheSeo;
use PluginHttpClient\HttpClient;
use PluginHttpClient\Method\Get as MethodGet;
use PluginApiClient\Endpoints\Seo\CategoryLocation as SeoCategoryLocation;

class Seo
{
    /**
     * @var OnewebCacheKey $cacheKey
     */
    private $cacheKey;

    /**
     * @var WarmUpCache $warmUpCache
     */
    private $warmUpCache;

    private $dataSeoCategories;

    const CACHE_PREFIX_KEY_SEO_CATEGORY_LOCATION = 'seo:categories';

    public function __construct(CacheKey $cacheKey, WarmUpCache $warmUpCache)
    {
        $this->cacheKey = $cacheKey;
        $this->warmUpCache = $warmUpCache;
        $this->dataSeoCategories = $this->warmUpCache->getSeoCategories();
    }

    public function getStaticSeo($routeName)
    {
        switch ($routeName) {
            case 'adding':
                return [
                    'page_title' => 'Pasang Iklan - OLX.co.id',
                    'page_description' => 'Pasang iklan gratis di OLX.co.id. Situs Jual &amp; Beli terbesar di Indonesia.'
                ];
            default:
                return $this->dataSeoCategories['default'];
        }
    }

    public function getDynamicSeo(HttpClient $httpClient, $categoryId = null, $regionId = null)
    {
        if (!is_null($categoryId) && !is_null($regionId)) {
            $data = $this->getSeoCategoryLocation($httpClient, $categoryId, $regionId);
        } elseif ($categoryId && !$regionId) {
            $data = isset($this->dataSeoCategories['categories'][$categoryId])
                ? $this->dataSeoCategories['categories'][$categoryId] : $this->dataSeoCategories['default'];
        } else {
            $data = $this->dataSeoCategories['default'];
        }

        return $data;
    }

    private function getSeoCategoryLocation(HttpClient $httpClient, $categoryId, $regionId)
    {
        $cacheSeo = new CacheSeo($this->cacheKey, $categoryId, $regionId);
        if ($data = $cacheSeo->get()) {
            return $data;
        } else {
            $seoCategoryLocation = new SeoCategoryLocation($httpClient, new MethodGet(), $categoryId, $regionId);

            $data = $seoCategoryLocation->getSeoCategoryLocation();

            if (isset($data['data'][$categoryId . '-' . $regionId])) {
                $seoData = $data['data'][$categoryId . '-' . $regionId];
                $cacheSeo->put($seoData);
                return $seoData;
            } else {
                return $this->dataSeoCategories['default'];
            }
        }
    }
}
