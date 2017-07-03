<?php

namespace App\Modules\Biography\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Biography\Repositories\BiographyRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function sitemap()
    {
        $biographies = Cache::tags(['BiographyController', 'Biography', 'sitemap'])->rememberForever('sitemap:biography', function () {
            return $this->repo->getLastBiographies();
        });

        return Theme::response('modules.biography.frontend.sitemap.sitemap', compact('biographies'), 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
