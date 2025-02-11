<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use function Monolog\toArray;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::get()->toArray();

//        dd($posts);
        return view('posts.show')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        dd('create');
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->isMethod('post')){

             $data = $request->all();

//            echo "<pre>";  print_r($data); die;
//            $post = $request->only((new Post)->getFillable());
//            $post = $data;
//            $this->create();
//
//            $this->save();

            $post = new Post();

            $post->title = $data['title'];
            $post->description = $data['description'];
            $post->status = 1;

            $post->save();

            return redirect()->back()->with('Success' , 'Post created successfully');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
