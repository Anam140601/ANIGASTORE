<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Sitesetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $site = Sitesetting::first();
        return view('admin.site.index',compact('site'));
    }
    public function update(Request $req){
        $data = array();
        $data['name']=$req->name;
        $data['address']=$req->address;
        $data['email']=$req->email;
        $data['phone_1']=$req->phone_1;
        $data['phone_2']=$req->phone_2;
        $data['facebook']=$req->facebook;
        $data['youtube']=$req->youtube;
        $data['instagram']=$req->instagram;
        $data['twitter']=$req->twitter;
        Sitesetting::where('id',$req->id)->update($data);
        $notification=array(
            'messege'=>'Website Setting Has Been Updated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
