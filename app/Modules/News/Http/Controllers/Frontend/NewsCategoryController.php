<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsCategoryRepository as Repo;
use Illuminate\Support\Facades\Cache;

class NewsCategoryController extends Controller
{
    private $repo;
    private $view = 'news_category.';
    private $redirectViewName = 'frontend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }

    public function index()
    {
        $records = $this->repo->getAllNewsCategories();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }

    public function getNewsByNewsCategorySlug($newsCategorySlug)
    {
        return Cache::tags(['NewsCategoryController', 'News', 'NewsCategory'])->rememberForever(request()->fullUrl(), function () use ($newsCategorySlug) {

            try {

                $newsCategorySlug = removeHtmlTagsOfField($newsCategorySlug);
                $newsCategory = $this->repo
                    ->with(['news'])
                    ->where('is_active', 1)
                    ->orderBy('updated_at', 'desc')
                    ->findBy('slug', $newsCategorySlug);

                $records = $newsCategory->news()
                    ->orderBy('updated_at', 'desc')
                    ->paginate();


            }catch (\Exception $e){
                abort(404,'The specified News Category cannot be found');
            }

            return view('news::frontend.news_category.category_news', compact([
                'newsCategory',
                'records'
            ]))->render();
        });
    }
}
