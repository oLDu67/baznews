<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Group extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public static function validate($input) {
        $rules = array(
            'name'                    => 'required|max:255',
            'description'             => 'max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function groupList()
    {
        return Group::where('is_active',1)->get();
    }

}
