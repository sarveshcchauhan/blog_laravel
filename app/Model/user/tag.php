<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts()
    {
        //To paginate relationship tables you need to add paginate in realtion model
        return $this->belongsToMany('App\Model\user\post', 'post_tags')->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
