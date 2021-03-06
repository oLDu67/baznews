<?php

namespace App\Models;

use App\Traits\Eventable;
use App\Transformers\PageTransformer;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use Eventable;
    use SoftDeletes;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }

    public $transformer = PageTransformer::class;
    protected $fillable = ['name', 'slug', 'content', 'description', 'keywords', 'is_comment', 'is_active'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public static function pageList()
    {
        return Page::where('is_active', 1)->pluck('name', 'id');
    }
}