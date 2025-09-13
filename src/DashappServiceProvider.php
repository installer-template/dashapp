<?php

namespace Inmanturbo\Dashapp;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class DashappServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../stubs' => App::basePath(),
        ], 'dashapp-stubs');

        Artisan::command('dashapp:install', function () {
            /** @var \Illuminate\Console\Command $this */
            $this->call('vendor:publish', [
                '--tag' => 'dashapp-stubs',
                '--force' => true,
            ]);
        });
    }
}