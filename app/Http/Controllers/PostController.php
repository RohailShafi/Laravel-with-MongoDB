<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\SinglePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
//    public function update(Request $request, Post $post)
//    {
//        //
//    }

    public function updateP(UpdatePostRequest $request)
    {
        try {

            $post = Post::updatePost($request);

            return Response::json($post,201);

        }catch (\Exception $exception){

            return Response::json($exception->getMessage());
        }

    }

    public function createP(CreatePostRequest $request){

        try {

            $post = Post::createPost($request);

            return Response::json($post,201);

        }catch (\Exception $exception){

            return Response::json($exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeletePostRequest $request)
    {
        try {
            Post::deletePost($request);

            return Response::json('Post Deleted Successfully',200);

        }catch (\Exception $exception){

            return Response::json($exception->getMessage());
        }

    }

    public function post(SinglePostRequest $request){

        try {
            $post = Post::post($request);

            return Response::json($post,200);

        }catch (\Exception $exception){

            return Response::json($exception->getMessage());
        }

    }

    public function posts(){

        try {
            $posts = Post::posts();

            return Response::json($posts,200);

        }catch (\Exception $exception){

            return Response::json($exception->getMessage());
        }

    }
}
