<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 9.05.2017
 * Time: 22:14
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        //Veri cachelenmiş ise diğer işlemlere girmeden veriyi gönderiyoruz.
        if ($this->isDataCached()) {
            $collection = $this->isDataCached();
            return $this->successResponse($collection, $code);
        }

        if ($collection->isEmpty()) {
            return $this->successResponse(['data' => $collection], $code);
        }

        $transformer = $collection->first()->transformer;
        $collection = $this->filterData($collection, $transformer);
        $collection = $this->sortData($collection, $transformer);
        $collection = $this->paginate($collection);
        $collection = $this->transformData($collection, $transformer);
        $collection = $this->cacheResponse($collection);
        return $this->successResponse($collection, $code);
    }

    protected function showOne(Model $instance, $code = 200)
    {
        //Veri cachelenmiş ise diğer işlemlere girmeden veriyi gönderiyoruz.
        if ($this->isDataCached()) {
            $collection = $this->isDataCached();
            return $this->successResponse($collection, $code);
        }

        $transformer = $instance->transformer;
        $instance = $this->transformData($instance, $transformer);
        $instance = $this->cacheResponse($instance);
        return $this->successResponse($instance, $code);
    }

    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }

    protected function filterData(Collection $collection, $transformer)
    {
        foreach (request()->query() as $query => $value) {
            $attribute = $transformer::originalAttribute($query);
            if (isset($attribute, $value)) {
                $collection = $collection->where($attribute, $value);
            }
        }
        return $collection;
    }

    protected function sortData(Collection $collection, $transformer)
    {
        if (request()->has('sort_by')) {
            $attribute = $transformer::originalAttribute(request()->sort_by);
            $collection = $collection->sortBy->{$attribute};
        }
        return $collection;
    }

    protected function paginate(Collection $collection)
    {
        $rules = [
            'per_page' => 'integer|min:2|max:50',
        ];
        Validator::validate(request()->all(), $rules);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 15;
        if (request()->has('per_page')) {
            $perPage = (int)request()->per_page;
        }
        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }

    protected function transformData($data, $transformer)
    {
        $transformation = fractal($data, new $transformer);
        return $transformation->toArray();
    }

    protected function cacheResponse($data)
    {
        return Cache::tags('Api')->rememberForever(request()->fullUrl(), function () use ($data) {
            return $data;
        });
    }

    protected function isDataCached()
    {
        if (Cache::tags(['Api'])->has(request()->fullUrl())) {
            return Cache::tags(['Api'])->get(request()->fullUrl());
        }

        return false;
    }


}