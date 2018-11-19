<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post,App\Category,App\Tag;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $publishedPosts = Post::all()->count();
        $TrashedPosts = Post::onlyTrashed()->count();
        $tags = Tag::all()->count();
        $categories = Category::all()->count();
        $lastPosts = Post::orderBy('created_at','desc')->skip(0)->take(4)->get();
        return view('dashboard.index',[
            'publishedPosts'=> $publishedPosts,
            'trashedPosts' => $TrashedPosts,
            'tags' => $tags,
            'categories' => $categories,
            'lastPosts' => $lastPosts
        ]);
    }
}
