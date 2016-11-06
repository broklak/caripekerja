<?php

namespace App\Console\Commands;

use App\Libraries\OnewebCacheKey;
use Illuminate\Console\Command;
use PluginApiClient\Endpoints\Categories;
use PluginApiClient\Endpoints\Chat\Template as ChatTemplate;
use PluginApiClient\Endpoints\Locations\Cities;
use PluginApiClient\Endpoints\Locations\Regions;

class WarmUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oneweb:warmup {cachename=all} {--reset=0} {--keepoldcache=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Warmup the oneweb, 1st build the cache data';



    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Categories $categories
     * @param Cities $cities
     * @param Regions $regions
     * @param \PluginApiClient\Endpoints\Seo\Categories $categoriesSeo
     * @param ChatTemplate $chatTemplate
     * @param OnewebCacheKey $onewebCacheKey
     * @throws \Exception
     */
    public function handle(
        Categories $categories,
        Cities $cities,
        Regions $regions,
        \PluginApiClient\Endpoints\Seo\Categories $categoriesSeo,
        ChatTemplate $chatTemplate,
        OnewebCacheKey $onewebCacheKey
    ) {
        $librariesWarmUp = new \App\Libraries\WarmUp(
            $categories,
            $cities,
            $regions,
            $categoriesSeo,
            $chatTemplate,
            $onewebCacheKey
        );

        $this->info($librariesWarmUp->generateWarmUpCache(
            $this->argument('cachename'),
            boolval($this->option('reset')),
            boolval($this->option('keepoldcache'))
        ));
    }
}

