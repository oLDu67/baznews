<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Repositories\ArticleRepository as Repo;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function sitemap()
    {
        $articles = Cache::tags(['ArticleController', 'Article', 'sitemap'])->rememberForever('sitemap:article', function () {
            return $this->repo->getLastArticles();
        });

        return response()
            ->view('article::frontend.sitemap.sitemap', compact('articles'), 200)
            ->header('Content-Type', 'text/xml');
    }
}
