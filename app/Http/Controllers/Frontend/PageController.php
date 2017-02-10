<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function show($slug)
    {
        return Cache::remember('page:'.$slug, 100, function() use($slug) {

            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');
            $record = $this->repo
                ->where('is_active', 1)
                ->findBy('slug',$slug);

            return Theme::view('frontend.page.show', compact([
                'record'
            ]))->render();
        });
    }

}