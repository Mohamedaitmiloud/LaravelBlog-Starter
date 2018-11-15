<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category,App\Tag,App\Post;
use Session,Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.posts.published',['posts'=>$posts]);
    }

    //Trashed posts
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('dashboard.posts.trashed',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.posts.create',[
            'categories'=>$categories,
            'tags'=>$tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validation incoming requests

       $validator = Validator::make($request->all(),[
           'title'=>'Required|unique:posts|min:5|max:100',
           'category'=>'Required',
           'tags'=>'Required',
           'featured'=>'Required|image',
           'content'=>'Required|min:100'
       ]);

       //check validation

       if ($validator->fails()) {
           Session::flash('error',$validator->messages()->all());
           return redirect()->back()->withInput();
       }

       //storing featured img and giving it a unique name
       $featured = $request->featured;
       $featured_new_name = time().$featured->getClientOriginalName();
       $featured->move('img/uploads/posts',$featured_new_name);

       //storing post with featured new name

       $post = Post::create([
           'title'=>$request->title,
           'content'=>$request->content,
           'featured'=>'img/uploads/posts/'.$featured_new_name,
           'category_id'=>$request->category,
           'slug'=>str_slug($request->title),
           'user_id'=> Auth::id()
       ]);

       //attaching tags to post

       $post->tags()->attach($request->tags);

       Session::flash('success','Post published successfully');

       return redirect()->back();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        $post = Post::withTrashed()->where('id',$id)->first();
        return view('dashboard.posts.edit',['post'=>$post,'categories'=>$categories,'tags'=>$tags]);
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
          //Validation incoming requests

       $validator = Validator::make($request->all(),[
        'title'=>'Required|min:5|max:100',
        'category'=>'Required',
        'tags'=>'Required',
        'content'=>'Required|min:100'
    ]);

    //check validation

    if ($validator->fails()) {
        Session::flash('error',$validator->messages()->all());
        return redirect()->back()->withInput();
    }
    //storing new featured img and giving it a unique name
    $post = Post::find($id);
    if ($request->hasFile('featured')) {
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('img/uploads/posts',$featured_new_name);
    }

    //updating post with  new data
    $post->title = $request->title;
    $post->content = $request->content;
    $post->category_id = $request->category;
    $post->slug = str_slug($request->title);
    $post->featured = 'img/uploads/posts/'.$featured_new_name;
    $post->save();
    $post->tags()->detach();
    $post->tags()->attach($request->tags);
    Session::flash('success','Post has been updated successfully');
    return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Post has been trashed successfully');
        return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post has been restored successfully');
        return redirect()->back();

    }

    public function delete($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post has been permanently delete');
        return redirect()->back();
    }



}
