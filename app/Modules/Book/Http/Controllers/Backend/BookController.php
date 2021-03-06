<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Library\Link\LinkShortener;
use App\Library\Uploader;
use App\Models\Setting;
use App\Modules\Book\Http\Requests\BookRequest;
use App\Modules\Book\Models\Book;
use App\Modules\Book\Models\BookAuthor;
use App\Modules\Book\Models\BookCategory;
use App\Modules\Book\Models\BookPublisher;
use App\Modules\Book\Repositories\BookRepository as Repo;
use Mremi\UrlShortener\Model\Link;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class BookController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'book.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $records = $this->repo->orderBy('created_at', 'desc')->paginate();
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function create()
    {
        $bookCategoryIDs = [];
        $record = $this->repo->createModel();
        $bookCategoryList = BookCategory::bookCategoryList();
        $bookPublisherList = BookPublisher::bookPublisherList();
        $bookAuthorList = BookAuthor::bookAuthorList();

        return view('book::' . $this->getViewName(__FUNCTION__),
            compact([
                'bookCategoryIDs',
                'record',
                'bookCategoryList',
                'bookPublisherList',
                'bookAuthorList'
            ]));
    }


    public function store(BookRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Book $record)
    {
        return view('book::' . $this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function edit(Book $record)
    {
        $bookCategoryIDs = [];

        $bookCategoryList = BookCategory::bookCategoryList();
        $bookPublisherList = BookPublisher::bookPublisherList();
        $bookAuthorList = BookAuthor::bookAuthorList();

        foreach ($record->book_categories as $index => $book_category) {
            $bookCategoryIDs[$index] = $book_category->id;
        }

        return view('book::' . $this->getViewName(__FUNCTION__),
            compact([
                'record',
                'bookCategoryList',
                'bookPublisherList',
                'bookCategoryIDs',
                'bookAuthorList'
            ]));
    }

    public function update(BookRequest $request, Book $record)
    {
        return $this->save($record);
    }


    public function destroy(Book $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['Book']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }

    public function save($record)
    {
        $input = Input::all();

        $input['is_comment'] = Input::get('is_comment') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {
            if (!empty($input['thumbnail'])) {

                $destination = '/images/books/' . $result->id . '/original';
                Uploader::removeDirectory($destination);

                $document_name = $input['thumbnail']->getClientOriginalName();
                Uploader::fileUpload($result, 'thumbnail', $input['thumbnail'], $destination, $document_name);
            }

            if (!empty($input['photo'])) {

                $destination = '/images/books/' . $result->id . '/photo';
                Uploader::removeDirectory($destination);

                $document_name = $input['photo']->getClientOriginalName();
                Uploader::fileUpload($result, 'photo', $input['photo'], $destination, $document_name);
            }

            $this->bookBookCategoriesStore($result, $input);


            /*
             * slug değişmiş ise ve link kısaltmaya izin verilmişse google link kısaltma servisi ile 'short_link' alanına ekliyoruz.
             *
             * */
            if (($record->slug != $result->slug) && Setting::isUrlShortener()) {

                $linkShortener = new LinkShortener(new Link);
                $result->short_url = $linkShortener->linkShortener($result->slug);
                $result->save();
            }

            /*
             * Delete related caches
             * */
            $this->removeCacheTags(['Book']);
            $this->removeHomePageCache();


            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }

    }

    public function bookBookCategoriesStore(Book $record, $input)
    {
        if (isset($input['book_category_ids'])) {
            $record->book_categories()->sync($input['book_category_ids']);
        }
    }
}
