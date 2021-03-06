<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;

class RevisionController extends BackendController
{

    private $repo;
    private $view = 'recommendation_news.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function index()
    {
        //$records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }
}
