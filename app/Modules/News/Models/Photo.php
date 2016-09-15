<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Photo extends Model
{
    /*
     * Alt yazı
     * Alternatif metin
     *
     *
     * */
    protected $fillable = ['photo_gallery_id', 'name', 'slug', 'file', 'link','description', 'keywords', 'order', 'is_active'];

    public function news()
    {
        return $this->belongsToMany('App\Modules\News\Models\News', 'news_photos', 'photo_id', 'news_id');
    }

    public function photo_gallery()
    {
        return $this->belongsTo('App\Modules\News\Models\PhotoGallery');
    }
    public static function validate($input) {
        $rules = array(
            'name' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function photoList()
    {
        return PhotoGallery::where('is_active',1)->pluck('name', 'id');
    }
}