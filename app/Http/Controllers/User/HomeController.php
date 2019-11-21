<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;

class HomeController extends Controller
{
    public function index()
    {
        $posts = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(4);
        return view('user.home', compact('posts'));
    }


    public function category(category $category)
    {
        //passing the object as function
        $posts = $category->posts();
        return view('user.home', compact('posts'));
    }

    public function tag(tag $tag)
    {
        //passing the object as function
        $posts = $tag->posts();
        return view('user.home', compact('posts'));
    }
}
