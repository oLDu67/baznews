<?php

namespace App\Modules\News\Widgets;

use App\Modules\News\Repositories\NewsRepository;
use Arrilot\Widgets\AbstractWidget;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class BoxCuffNews extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];


    /**
     * The number of seconds before each reload.
     *
     * @var int|float
     */
    public $reloadTimeout = 10;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return Cache::remember('boxCuffNews', 10, function()  {
            $newsRepository = new NewsRepository();
            $boxCuffNewsItmes = $newsRepository
                ->where('is_active', 1)
                ->where('box_cuff', 1)
                ->where('status', 1)
                ->take(5)
                ->orderBy('updated_at','desc')
                ->get();

            return Theme::view('news::frontend.widgets.box_cuff_news',compact([
                'config',
                'boxCuffNewsItmes'
            ]))->render();
        });
    }
}