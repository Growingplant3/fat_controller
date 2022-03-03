<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Lib\LinkPreview\LinkPreviewInterface::class, \App\Lib\LinkPreview\LinkPreview::class);
        // $this->app->bind(\App\Lib\LinkPreview\LinkPreviewInterface::class, \App\Lib\LinkPreview\MockLinkPreview::class);
        // モックへの差し替えも超簡単
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
