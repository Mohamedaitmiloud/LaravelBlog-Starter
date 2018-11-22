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
}
