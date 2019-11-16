<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{

    public function tags()
    {
        //connect model name
        //belongsToMany(Model_name_to_connect,table_name)
        return $this->belongsToMany('App\Model\user\tag', 'post_tags')->withTimestamps();
    }

    public function category()
    {

        return $this->belongsToMany('App\Model\user\category', 'category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
