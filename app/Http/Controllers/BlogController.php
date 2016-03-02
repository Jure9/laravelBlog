<?php

namespace App\Http\Controllers;

use App\Post;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts= Post::all();

        return view('pages.index', ['posts' => $posts]);
    }
    public function about()
    {

        return view('pages.about');
    }
    public function nuPost()
    {

        return view('pages.nuPost');
    }
    public function post()
    {

        return view('pages.post');
    }
    public function show($id)
    {
        $post= Post::find($id);

        return view('pages.post', ['posts' => $post]);
    }
    public function store()
    {
        // pridobimo parameter title
        $title = Request::get('title');

        // pridobimo parameter body
        $body = Request::get('body');

        // ustvarimo nov post objekt
        $post = new Post;
        $post->title = $title;
        $post->body = $body;

        // shranimo post
        $post->save();

        return view('pages.nuPost');
    }
}

?>