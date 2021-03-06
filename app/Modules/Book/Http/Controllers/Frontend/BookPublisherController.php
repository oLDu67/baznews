<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Book\Repositories\BookPublisherRepository as Repo;
use Cache;

class BookPublisherController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function show($slug)
    {
        return Cache::tags(['BookPublisherController', 'Book', 'bookPublisher'])->rememberForever(request()->fullUrl(), function () use ($slug) {

            try
            {

                $slug = removeHtmlTagsOfField($slug);
                $bookPublisher = $this->repo
                    ->with(['books'])
                    ->where('is_active', 1)
                    ->findBy('slug', $slug);

                $records = $bookPublisher->books()->paginate();

            }catch(\Exception $e){
                abort(404);
            }

            return view('book::frontend.book_publisher.show', compact([
                'bookPublisher',
                'records',
            ]))->render();
        });
    }
}
