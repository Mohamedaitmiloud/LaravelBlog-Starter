<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category,App\Post,App\Tag,App\Setting;

class FrontEndController extends Controller
{
    public function index(){
        $posts = Post::all();
        $categories = Category::all();

        $tags = Tag::all();
        $settings = Setting::first();
        return view('frontend.index',[
            'posts'=>$posts,
            'settings' =>$settings,
            'categories'=>$categories
        ]);
    }
    public function getPost($slug){
        $post = Post::where('slug','=',$slug)->first();
        $nextPost = Post::where('id','>',$post->id)->min('id');
        $prevPost = Post::where('id','<',$post->id)->max('id');
        $categories = Category::all();
        $tags = Tag::all();
        $settings = Setting::first();
        return view('frontend.single',[
            'post'=>$post,
            'nextPost'=>Post::find($nextPost),
            'prevPost'=>Post::find($prevPost),
            'settings' =>$settings,
            'categories'=>$categories
        ]);
    }



}
