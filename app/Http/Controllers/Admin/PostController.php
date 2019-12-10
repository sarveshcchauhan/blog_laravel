<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\tag;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin/posts/showposts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('posts.create')){
            $categories = category::all();
            $tags = tag::all();
            return view('admin/posts/post', compact('categories', 'tags'));
        }else{
            return redirect(route('home.index'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $imageName =  $request->image->store('public/images');
        }

        $post = new post;
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->status = $request->publish;
        $post->body = $request->body;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->category()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(Auth::user()->can('posts.update')){
        $post = post::with('tags', 'category')->where('id', $id)->first();
        $categories = category::all();
        $tags = tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }
    return redirect(route('admin.home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/images');
        }

        $post = post::find($id);
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->status = $request->publish;
        $post->body = $request->body;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->category()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        post::where('id', $id)->delete();
        return redirect(route('post.index'));
    }
}
