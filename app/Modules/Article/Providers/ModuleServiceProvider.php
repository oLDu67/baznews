<?php

namespace App\Modules\Article\Providers;

use App\Modules\Article\Models\Article;
use App\Modules\Article\Observers\ArticleObserver;
use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'article');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'article');

        Article::observe(ArticleObserver::class);
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
