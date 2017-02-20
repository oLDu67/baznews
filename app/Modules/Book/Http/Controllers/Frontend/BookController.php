<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Models\Book;
use App\Modules\Book\Repositories\BookRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;

class BookController extends Controller
{

    private $repo;
    private $view = 'book.';
    private $redirectViewName = 'frontend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }

    public function show($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );

        return Cache::remember('book:'.$id, 100, function() use($id) {

            $record = $this->repo
                ->with([
                    'book_categories',
                    'user',
                ])
                ->where('is_active', 1)
                ->findBy('id',$id);

            return Theme::view('book::frontend.book.show', compact([
                'record',
            ]))->render();
        });
    }

}
