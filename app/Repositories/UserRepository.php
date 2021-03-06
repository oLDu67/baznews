<?php namespace App\Repositories;


use Rinvex\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\User';

    public function getUserBySlug($slug)
    {
        $user = $this->where('status', 1)
            ->findBy('slug', $slug);

        return $user ? $user : null;
    }
}