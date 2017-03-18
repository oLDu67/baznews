<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\News;
use App\Modules\News\Repositories\NewsRepository as Repo;
use App\Repositories\TagRepository;
use Caffeinated\Themes\Facades\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class ArchiveController extends Controller
{

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }
    
    public function index(Request $request)
    {
        $records = [];
        $datetime = null;
        $year = $request->years;
        $month = $request->months;
        $day = $request->days;


        if(!empty($year) && !empty($month) && !empty($day)){

            $date = $year . '-' . $month . '-' . $day;
            $datetime = Carbon::createFromDate($year, $month, $day, config('app.timezone'));

            $records = News::where('is_active',1)
                            ->where('status',1)
                            ->whereBetween('created_at', [$date . ' 00:00:00', $date . ' 23:59:-59'])
                            ->get();
        }


        $tagRepo = new TagRepository();
        $tags = $tagRepo->orderBy('updated_at','desc')->simplePaginate(15);


        return Theme::view('news::frontend.archive',
            compact([
                'records',
                'tags',
                'datetime',
            ]));
    }
}
