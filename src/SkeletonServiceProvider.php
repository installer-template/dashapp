<?php

namespace Vendorname\Skeleton;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class SkeletonServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../stubs' => App::basePath(),
        ], 'vendorname-packagename-stubs');

        Artisan::command('vendorname-packagename:install', function () {
            /** @var \Illuminate\Console\Command $this */
            $this->call('vendor:publish', [
                '--tag' => 'vendorname-packagename-stubs',
                '--force' => true,
            ]);
        });
    }
}