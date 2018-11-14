<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Tag;
use Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('dashboard.tags.index',['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate incoming request

        $validator = Validator::make($request->all(),[
            'tag'=>'Required|unique:tags|min:2'
        ]);
        
        if ($validator->fails()) {
            Session::flash('error',$validator->messages()->all());
            return redirect()->back()->withInput();
        }

        //store tag after validation

        Tag::create([
            'tag'=>$request->tag
        ]);
        Session::flash('success',$request->tag.' has been added successfully');
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
        $tag = Tag::find($id);
        return view('dashboard.tags.edit',['tag'=>$tag]);
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
        //validate incoming request

        $validator = Validator::make($request->all(),[
            'tag'=>'Required|min:2'
        ]);
        
        if ($validator->fails()) {
            Session::flash('error',$validator->messages()->all());
            return redirect()->back()->withInput();
        }
        //update tag after validation
        $tag = Tag::find($id);
        $tag->tag = $request->tag;
        $tag->save();
        Session::flash('success',$request->tag.' has been updated');
        return redirect()->route('tags.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        Session::flash('success','Tag delete successfully!');
        return redirect()->back();
    }
}
