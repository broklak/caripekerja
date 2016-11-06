<?php
namespace App\Libraries;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use PluginHttpClient\HttpClient;
use Illuminate\Http\Request;

class LayoutManager
{
    const ALL_RESULTS_PATHNAME = 'all-results';

    /**
     * @var Collection
     */
    private $data;

    /**
     * @var Request $request
     */
    private $request;

    /**
     * @var WarmUpCache $warmUpCache
     */
    private $warmUpCache;

    /**
     * @var OnewebCacheKey
     */
    private $cacheKey;

    /**
     * @var Seo
     */
    private $seo;

    public function __construct(
        Request $request,
        CacheKey $cacheKey,
        WarmUpCache $warmUpCache
    ) {
        $this->cacheKey = $cacheKey;
        $this->seo = new Seo($cacheKey, $warmUpCache);
        $this->request = $request;
        $this->warmUpCache = $warmUpCache;
        $this->initialize();
    }

    private function initialize()
    {
        if (!\App::runningInConsole()) {
            $this->data = collect([]);
            $this->setData('build_number', $this->warmUpCache->getBuildNumber());
            $this->setData('url_segments', $this->request->segments());
            $this->setData('route_name', Route::getCurrentRoute()->getName());
            $this->setData('request_path', $this->request->path());
            $this->setData('all_results_path', self::ALL_RESULTS_PATHNAME);
            $this->setData('base_url', $this->request->path());
            $this->setData('request_current_url', $this->request->fullUrl());
            $this->setData('request_query_string', $this->getQueryString($this->request));
            $this->setData('root_path_assets', sprintf('%sassets/', config('app.cdn_url')));
//            $this->setData('locations', $this->warmUpCache->getAllLocations());
//            $this->setData("categoryRouteMapping", $this->warmUpCache->getCategoryRouteMapping());
//            $this->setData('categories', $this->warmUpCache->getAllCategories());
//            $this->setData('categoriesAll', $this->getData('categories')['all']);
//            $this->setData('categoriesTree', $this->getData('categories')['tree']);
//            $this->setData('root_path_assets', sprintf('%sassets/', config('app.cdn_url')));
            $this->setData('show_sidebar', true);
            $this->setAssetsFiles();
            $this->setSeo();
        }
    }

    public function getData($key = null)
    {
        if (!is_null($key) && !is_null($this->data->get($key))) {
            return $this->data->get($key);
        }

        return $this->data->all();
    }

    public function setData($key, $value)
    {
        $this->data->put($key, $value);
        return $this;
    }

    public function setDynamicSeo(HttpClient $httpClient, $categoryId = null, $regionId = null)
    {
        $data = $this->seo->getDynamicSeo($httpClient, $categoryId, $regionId);
        $this->setData('title', $data['page_title']);
        $this->setData('meta_description', $data['page_description']);
        return $this;
    }

    private function getQueryString(Request $request)
    {
        parse_str($request->getQueryString(), $queryString);
        return $queryString;
    }

    private function setSeo()
    {
        $data = $this->seo->getStaticSeo($this->getData('route_name'));
        $this->setData('title', $data['page_title']);
        $this->setData('meta_description', $data['page_description']);
        return $this;
    }

    private function setAssetsFiles()
    {
        var_dump($this->getData('route_name')); die;
        $this->setData('cssmin', sprintf(
            '%sdist/css/%caripekerja-%s.min.css',
            $this->getData('root_path_assets'),
            $this->getData('build_number'),
            $this->getData('route_name')
        ));
        $this->setData('jsmin', sprintf(
            '%sdist/js/caripekerja-%s.min.js',
            $this->getData('root_path_assets'),
            $this->getData('build_number'),
            $this->getData('route_name')
        ));
        return $this;
    }
}
