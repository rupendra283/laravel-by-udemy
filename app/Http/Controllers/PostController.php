<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

use Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withCount('user','comments')->get();
        // dd($posts);
       return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('post.create');
        return view ('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $request->validate([
        'title' => 'required',
       ]);

        //For Image
       if ($request->hasFile('image')) {
        $img = $request->image;
        $filename = $img->getClientOriginalName();
        $imageurl = Storage::putFileAs('/public/image', $request->file('image'), $filename);
    }
       $posts = new Post();
       $posts->title  = $request->title;
       $posts->content  = $request->content;
       $posts->image  =  $imageurl;
       $posts->slug = Str::slug($request->title);
       $posts->created_by   = Auth::user()->id;
       $posts->updated_by = null;
       $posts->save();
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->with(['user','comments']);
        // dd($post);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post->slug);
        // if(Gate::denies('update-post',$post)){
        //     abort(403,'You can Not Edit Blog post ');
        // }
        $this->authorize('post.update',$post);

        return view('post.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request->all());



       $request->validate([
        'title' => 'required',
       ]);
       $this->authorize('post.update',$post);
        //For Image
            // if(Gate::denies('update-post',$post)){
            //     abort(403,'You can Not Update Blog post');
            // }
       $post->title  = $request->title;
       $post->content  = $request->content;
       $post->slug = Str::slug($request->title);
       $post->created_by   = Auth::user()->id;
       $post->updated_by = null;
       $post->save();
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('post.delete',$post);
        // if(Gate::denies('delete-post',$post)){
        //     abort(403,'You can Not Delete Blog post');
        // }
    }
}
