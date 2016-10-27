<?php

namespace App\Modules\Book\Widgets;

use App\Modules\Article\Repositories\ArticleRepository;
use App\Modules\Book\Repositories\BookRepository;
use Arrilot\Widgets\AbstractWidget;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RecentBooks extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $recentBooks = Cache::remember('recentBooks', 10, function()  {

            $bookRepository = new BookRepository();
            return  $bookRepository
                ->where('is_active', 1)
                ->where('is_cuff', 1)
                ->take(Redis::get('book_count'))
                ->orderBy('updated_at','desc')
                ->get();
        });
        return Theme::view('frontend.widgets.recent_books', compact(['recentBooks']));
    }
}