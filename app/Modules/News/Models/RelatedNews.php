<?php

namespace App\Modules\News\Models;

use App\Modules\News\Transformers\RelatedNewsTransformer;
use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class RelatedNews extends Model
{
    use Eventable;

    protected $table = 'related_news';
    public $transformer = RelatedNewsTransformer::class;
    public $timestamps = false;
    protected $fillable = ['news_id', 'related_news_id'];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    public static function validate($input)
    {
        $rules = array(
            'news_id' => 'required',
            'related_news_id' => 'required',
        );
        return Validator::make($input, $rules);
    }
}
