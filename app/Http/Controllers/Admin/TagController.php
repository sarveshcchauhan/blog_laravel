<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//For ORM using Eloquent 
use App\Model\user\tag;

class TagController extends Controller
{

    //disallowing user to enter the page without login
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
        //Display data from database using ORM
        $tags = tag::all();
        //compact is use to return data to view
        return view('admin/tag/showtags', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tag/tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //For validation
        $validator_tag = $request->validate([
            'tagtitle' => 'required',
            'tagslug' => 'required'
        ]);

        //For inserting
        $tag = new tag;
        $tag->name = $request->tagtitle;
        $tag->slug = $request->tagslug;
        $tag->save();
        //for redirection
        return redirect(route('tag.index'));
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
        $tag = tag::where('id', $id)->first();
        return view('admin.tag.edit', compact('tag'));
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
        $validator_tag = $request->validate([
            'tagtitle' => 'required',
            'tagslug' => 'required'
        ]);

        //For inserting
        $tag = tag::find($id);
        $tag->name = $request->tagtitle;
        $tag->slug = $request->tagslug;
        $tag->save();
        //for redirection
        return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tag::where("id", $id)->delete();
        return redirect(route('tag.index'));
    }
}
