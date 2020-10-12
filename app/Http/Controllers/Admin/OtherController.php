<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Newslater;
use App\Model\Admin\Seo;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newslater(){
        $sub = Newslater::all();
        return view('admin.other.newslater',compact('sub'));
    }

    public function destroySub($id){
        Newslater::where('id',$id)->delete();
        return redirect()->back();
    }

    public function seo(){
        $seo = Seo::first();
        return view('admin.other.seo',compact('seo'));
    }

    public function seoUpdate(Request $req){
        $data=array();
        $data['meta_title']=$req->meta_title;
        $data['meta_author']=$req->meta_author;
        $data['meta_tag']=$req->meta_tag;
        $data['meta_description']=$req->meta_description;
        $data['google_analytics']=$req->google_analytics;
        $data['bing_analytics']=$req->bing_analytics;
        Seo::where('id',$req->id)->update($data);
        $notification=array(
            'messege'=>'Succesfully Update Seo Setting',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
