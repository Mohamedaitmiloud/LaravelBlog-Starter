<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //geting all Categories
        $categories = Category::all();
        return view('dashboard.categories.index',['categories'=>$categories]);
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
        // validate incoming request

        $validator = Validator::make($request->all(),[
                'name' => 'Required|String|unique:categories|min:2|max:20',
                'about'=> 'Required|String|min:5|max:100',
        ]);

        if ($validator->fails()) {
            Session::flash('error',$validator->messages()->all());
            return redirect()->back()->withInput();
        }

        //storing request
        Category::create([
            'name'=>$request->name,
            'about' => $request->about
        ]);
        Session::flash('success',$request->name.' has been successfully added');
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
        $category = Category::find($id);
        return view('dashboard.categories.edit',['category'=>$category]);
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
            // validate incoming request

             $validator = Validator::make($request->all(),[
                    'name' => 'Required|String||min:2|max:20',
                    'about'=> 'Required|String|min:5|max:100',
            ]);

            if ($validator->fails()) {
                Session::flash('error',$validator->messages()->all());
                return redirect()->back()->withInput();
            }

            //storing request
            $category = Category::find($id);
            $category->name = $request->name;
            $category->about = $request->about;
            $category->save();

            Session::flash('success',$request->name.' has been successfully updated');
            return redirect()->route('categories.index');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success','Category deleted successfully');
        return redirect()->back();
    }
}
