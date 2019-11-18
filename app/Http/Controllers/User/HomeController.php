<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = post::where('status', 1)->paginate(4);
        return view('user/home', compact('posts'));
    }
}
