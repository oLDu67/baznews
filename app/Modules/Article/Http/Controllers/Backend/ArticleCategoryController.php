<?php

namespace App\Modules\Article\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Repositories\ArticleCategoryRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ArticleCategoryController extends Controller
{
    private $repo;
    private $view = 'article_category.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        $recordsTree = ArticleCategory::get()->toTree();

        return Theme::view('article::' . $this->getViewName(__FUNCTION__),compact(['records','recordsTree']));
    }


    public function create()
    {
        $articleCategoryList = ArticleCategory::articleCategoryList();
        $record = $this->repo->createModel();
        return Theme::view('article::' . $this->getViewName(__FUNCTION__),compact(['record', 'articleCategoryList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(ArticleCategory $record)
    {
        return Theme::view('article::' . $this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(ArticleCategory $record)
    {
        $articleCategoryList = ArticleCategory::articleCategoryList();
        return Theme::view('article::' . $this->getViewName(__FUNCTION__),compact(['record', 'articleCategoryList']));
    }


    public function update(Request $request, ArticleCategory $record)
    {
        return $this->save($record);
    }


    public function destroy(ArticleCategory $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = ArticleCategory::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
                if (!empty($result)) {
                    $result = true;
                }
            }
            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}