<?php

namespace App\Modules\News\Models;

use App\Models\Link;
use App\Modules\News\Transformers\PhotoCategoryTransformer;
use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;

class PhotoCategory extends Model
{
    use Eventable;
    use RevisionableTrait;
    use Sluggable;
    //https://github.com/Zizaco/entrust/issues/379
    use NodeTrait {
        NodeTrait::replicate insteadof Sluggable;
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($record) {
            if ($record->is_active) {
                $link = new Link();
                $link->url = $record->slug;
                $record->links()->save($link);
            }
        });

        static::updated(function ($record) {
            if ($record->is_active) {
                $link = Link::where('linkable_id', $record->id)->where('linkable_type', PhotoCategory::class)->first();
                $link->url = $record->slug;
                $record->links()->save($link);
            }
        });

        static::deleted(function ($record) {
            $link = Link::where('linkable_id', $record->id)->where('linkable_type', PhotoCategory::class)->first();
            $record->links()->delete($link);
        });
    }

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

    protected $table = 'photo_categories';
    public $transformer = PhotoCategoryTransformer::class;
    protected $fillable = ['parent_id', '_lft', '_rgt', 'name', 'slug', 'description', 'keywords', 'icon', 'is_cuff', 'is_active'];

    public function photo_galleries()
    {
        return $this->hasMany(PhotoGallery::class);
    }

    public function links()
    {
        return $this->morphMany(Link::class, 'linkable');
    }

    public static function photoCategoryList()
    {
        return PhotoCategory::where('is_active', 1)->pluck('name', 'id');
    }
}
