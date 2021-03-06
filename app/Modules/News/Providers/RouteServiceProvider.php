<?php

namespace App\Modules\News\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Modules\News\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('news_category', 'App\Modules\News\Models\NewsCategory');
        Route::model('news', 'App\Modules\News\Models\News');
        Route::model('news_source', 'App\Modules\News\Models\NewsSource');
        Route::model('future_news', 'App\Modules\News\Models\FutureNews');
        Route::model('photo_gallery', 'App\Modules\News\Models\PhotoGallery');
        Route::model('photo', 'App\Modules\News\Models\Photo');
        Route::model('photo_category', 'App\Modules\News\Models\PhotoCategory');
        Route::model('video_category', 'App\Modules\News\Models\VideoCategory');
        Route::model('video_gallery', 'App\Modules\News\Models\VideoGallery');
        Route::model('video', 'App\Modules\News\Models\Video');
        Route::model('recommendation_news', 'App\Modules\News\Models\RecommendationNews');

        parent::boot();
    }

    /**
     * Define the routes for the module.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the module.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require module_path('news', 'Routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the module.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require module_path('news', 'Routes/api.php');
        });
    }
}
