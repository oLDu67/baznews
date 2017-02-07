<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Library\Uploader;
use App\Models\Tag;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\PhotoCategory;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Repositories\PhotoGalleryRepository as Repo;
use App\Modules\News\Repositories\PhotoRepository;
use Caffeinated\Themes\Facades\Theme;
use League\Flysystem\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class PhotoGalleryController extends Controller
{
    private $repo;
    private $view = 'photo_gallery.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->middleware(function ($request, $next) {

            $this->permisson_check();

            return $next($request);
        });

        $this->repo= $repo;
    }
    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact(['records']));
    }


    public function create()
    {
        $tagIDs = [];
        $photoCategories = PhotoCategory::photoCategoryList();
        $record = $this->repo->createModel();
        $tagList = Tag::tagList();

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact([
            'record',
            'photoCategories',
            'tagList',
            'tagIDs',
        ]));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(PhotoGallery $record)
    {
        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(PhotoGallery $record)
    {
        $tagIDs = [];
        $photoCategories = PhotoCategory::photoCategoryList();

        $tagList = Tag::tagList();

        foreach ($record->tags as $index => $tag){
            $tagIDs[$index] = $tag->id;
        }

        return Theme::view('news::' . $this->getViewName(__FUNCTION__),compact([
            'record',
            'photoCategories',
            'tagList',
            'tagIDs',
        ]));
    }


    public function update(Request $request, PhotoGallery $record)
    {
        return $this->save($record);
    }


    public function destroy(PhotoGallery $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_cuff'] = Input::get('is_cuff') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['user_id'] = Auth::user()->id;

        $v = PhotoGallery::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
            }
            if ($result[0]) {

                //todo form tarafında foto yüklemesini kaldırdım
                //çünkü galeri resimlerini gösterirken "gallery/gallery_slug/thumbnail" olduğu için
                //tekrar kontrol etmemiz gerekiyor.Bundan foto eklemeyi kaldırdım.
                if(!empty($input['thumbnail'])) {
                    $oldPath = $record->thumbnail;
                    $document_name = $input['thumbnail']->getClientOriginalName();
                    $destination = '/gallery/'. $result[1]->id .'/photos';
                    Uploader::fileUpload($result[1] , 'thumbnail', $input['thumbnail'] , $destination , $document_name);
                    Uploader::removeFile($oldPath);


                    Image::make(public_path('gallery/'. $result[1]->id .'/photos/'. $result[1]->thumbnail))
                        ->resize(58,58)
                        ->save(public_path('gallery/'. $result[1]->id .'/photos/58x58_' . $document_name));

                    Image::make(public_path('gallery/'. $result[1]->id .'/photos/'. $result[1]->thumbnail))
                        ->resize(497,358)
                        ->save(public_path('gallery/'. $result[1]->id .'/photos/497x358_' . $document_name));
                }


                $this->tags_photo_gallery_store($result[1],$input);

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function addMultiPhotosView($photo_gallery_id)
    {
        $photo_gallery = PhotoGallery::find($photo_gallery_id);

        return Theme::view('news::' . $this->redirectViewName . $this->view . 'add_multi_photos_view', compact(['photo_gallery']));
    }

    //TODO YOUTUBE CLONE EĞİTİMİNDE Kİ GİBİ YAPILACAK JOB,QUEUE VS..
    public function addMultiPhotos(Request $request)
    {
        $gallery = PhotoGallery::find($request->input('photo_gallery_id'));
        $file = $request->file('file');
        $basePath = 'gallery/' . $gallery->id . '/photos/';
        $fileName = uniqid() . $file->getClientOriginalName();


        /*dosya isminden extension kısmını çıkartıyoruz.*/
        //dosyanın orjinal ismini alıyoruz(uzantılı).
        $originalFileName =  explode('.', $file->getClientOriginalName());

        //uzantısını kayıt etmek için uzantısını değişkene atıyoruz.
        $extention = array_last($originalFileName);

        //"." işaretine göre parçaladığımız ve diziye attığımız elemanların
        //sonuncu olan uzantıyı diziden siliyoruz.
        unset($originalFileName[count($originalFileName) - 1]);

        //Dizi içerisinden silinmiş olan uzantıdan sonra tüm dizi elemanlarının
        // aralarında boşluk veya işaret olmayacak şekilde değişkene atıyoruz.
        //Böylelikle dosya ismini uzantısız şekilde elde etmiş oluyoruz.
        $name = implode('', $originalFileName);




        $file->move($basePath, $fileName);


        //TODO  Storage facede ile cloud işlemleri de yapılabilecek.
//        Storage::put($basePath , $file);
//        $path = Storage::put($basePath , \File::get($file));
//        Storage::disk('public')->put($fileName,\File::get($file));


        $photo = $gallery->photos()->create([
            'photo_gallery_id'  => $gallery->id,
            'name'              => $name,
            'slug'              => str_slug($name),
            'file'              => $fileName,
            'is_active'         => 1
        ]);

        /*
         * Dosya eklendiğinde isminin sonuna "- + id" şeklinde ekleme yapmıyor.
         * Sluggable plugin ni için model içerisinde "name + id" yapmamıza rağmen
         * update işlemi yapmamızı zorunlu kılıyor.
         *
         * Bu sorundan dolayı gelen kayıdı slug id si için güncellemememiz gerekiyor.
         *
         * */
        $photoRepo = new PhotoRepository();
        list($status, $instance) = $photoRepo->update($photo->id,[
            'name' => $name
        ]);

        return $photo;
    }



    public function updateGalleryPhotos(Request $request)
    {
        $subtitle = $content = null;

        $inputs = Input::all();

        $photoGalleryId = $inputs['photo_gallery_id'];

        if(!empty($inputs['is_cuff_thumbnail'])){

            $photoGallery = PhotoGallery::find($photoGalleryId);
            $photo = Photo::find($inputs['is_cuff_thumbnail']);


            $result = PhotoGallery::where('id',$photoGalleryId)
                        ->update(['thumbnail' => $photo->file]);


            //todo güncelleme repository tarafında yapılmalı.
//            $photoGallery = $this->repo->update($photoGalleryId, [
//                    'thumbnail' => 'yeni resim'
//                ]);

//            Image::make(public_path('gallery/'. $photoGallery->slug .'/photos/'. $photo->file))
//                ->resize(58,58)
//                ->save(public_path('gallery/'. $photoGallery->slug .'/photos/58x58_' . $photo->file));
//
//            Image::make(public_path('gallery/'. $photoGallery->slug .'/photos/'. $photo->file))
//                ->resize(497,358)
//                ->save(public_path('gallery/'. $photoGallery->slug .'/photos/497x358_' . $photo->file));



            //todo yapılacak.

            $img = Image::make(public_path('gallery/'. $photoGallery->id .'/photos/'. $photo->file));

            Image::make(public_path('gallery/'. $photoGallery->id .'/photos/'. $photo->file))
                ->fit(58,58)
                ->save(public_path('gallery/'. $photoGallery->id .'/photos/58x58_' . $photo->file));

            Image::make(public_path('gallery/'. $photoGallery->id .'/photos/'. $photo->file))
                ->fit(497,358)
                ->save(public_path('gallery/'. $photoGallery->id .'/photos/497x358_' . $photo->file));
        }



        unset($inputs['_token']);
        unset($inputs['photo_gallery_id']);
        unset($inputs['is_cuff_thumbnail']);

        //form name alanından gönderdiğimiz  photo id lerini alıyoruz
        //value alanlarını subtitle ve content ile değiştiriyoruz.
        foreach (array_keys($inputs) as $key)
        {
            if(!empty($inputs[$key]))
            {
                /*
                 * $fields[0] değeri content veya subtitle olabiliyor
                 * $fields[1] değeri ise formdan verdiğimiz id oluyor.
                 * */

                $fields = explode('/',$key);

                $field = $fields[0];
                $id = $fields[1];

                if($field == 'delete'){

                    try{

                        Photo::find($id)->delete();
                        //TODO video nun dosyaları da silinecek.
                        continue;
                    }catch (Exception $e)
                    {
                        //todo log yazılacak
                    }

                }else if($field == 'subtitle'){

                    $subtitle = $inputs[$key];

                }else if($field == 'content'){

                    $content = $inputs[$key];
                }


                if(is_numeric($id)){

                    $photo = Photo::find($id);
                    if(isset($photo->id)){

                        //ikisinden biri boş ise önceki değerini veriyoruz.
                        $photo->subtitle =  $subtitle ? $subtitle : $photo->subtitle;
                        $photo->content =  $content ? $content : $photo->content;
                        $photo->save();
                    }
                }

                //değişkenleri temizliyoruz.
                $subtitle = null;
                $content = null;
            }

        }

        return Redirect::back();
    }


    public function tags_photo_gallery_store(PhotoGallery $record, $input)
    {
        if(isset($input['tags_ids'])) {
            $record->tags()->sync($input['tags_ids']);
        }
    }


    public function forgetCache()
    {
        $this->repo->forgetCache();
        return Redirect::back();
    }


}
