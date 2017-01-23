<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('pages.about', 'App\Http\ViewComposers\AboutComposer');
    }

    /**AboutComposer
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
