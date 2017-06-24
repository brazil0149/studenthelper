<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    function __construct()
    {
        return $this->middleware('auth')->except('index');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }
    
    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        return view('posts.show', ['post' => $post]);
    }
    
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }


}
