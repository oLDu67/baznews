<?php

namespace App\Modules\News\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class NewsCategoryRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\NewsCategory';

    public function getAllNewsCategories()
    {
        return $this->where('is_active', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(20);
    }

    public function getAllNewsCategoriesWithNews()
    {
        return $this->with(['news' => function($query){

            $query->orderBy('updated_at', 'desc');

        }])->where('is_cuff', 1)
                        ->where('is_active', 1)
                        ->findAll();
    }

    public function getNames()
    {
        return $this->where('is_active', 1)
                    ->findAll();
    }
}