<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Validator;
use Session;

class SettingsController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }


    public function index(){
        return view('dashboard.settings.index',['settings'=>Setting::first()]);
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'title'=>'Required|min:2',
            'about'=>'Required|min:10',
            'contact_email'=>'Required|email',
            'contact_number'=>'Required'
        ]);

        if($validator->fails()){
            Session::flash('error',$validator->messages->all());
            return redirect()->back()->withInput();
        }

        $settings = Setting::find($id);
        $settings->title = $request->title;
        $settings->about = $request->about;
        $settings->contact_email = $request->contact_email;
        $settings->contact_number = $request->contact_number;
        $settings->save();
        Session::flash('success','Blog settings updated successfully');
        return redirect()->back();

    }

}
