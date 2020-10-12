<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $user = Admin::where('type',2)->get();
        return view('admin.role.index',compact('user'));
    }
    public function store(Request $req){
        $data = array();
        $data['name']=$req->name;
        $data['phone']=$req->phone;
        $data['email']=$req->email;
        $data['password']=Hash::make($req->password);
        $data['category']=$req->category;
        $data['coupon']=$req->coupon;
        $data['product']=$req->product;
        $data['blog']=$req->blog;
        $data['order']=$req->order;
        $data['report']=$req->report;
        $data['role']=$req->role;
        $data['return']=$req->return;
        $data['contact']=$req->contact;
        $data['comment']=$req->comment;
        $data['other']=$req->other;
        $data['setting']=$req->setting;
        $data['stock']=$req->stock;
        $data['type']=2;
        Admin::insert($data);
        $notification=array(
            'messege'=>'Child Admin Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $user = Admin::where('id',$id)->first();
        return view('admin.role.edit',compact('user'));
    }
    public function destroy($id){
        Admin::where('id',$id)->delete();
        $notification=array(
            'messege'=>'Child Admin Has Been Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function update(Request $req){
        $data = array();
        $data['name']=$req->name;
        $data['phone']=$req->phone;
        $data['email']=$req->email;
        $data['category']=$req->category;
        $data['coupon']=$req->coupon;
        $data['product']=$req->product;
        $data['blog']=$req->blog;
        $data['order']=$req->order;
        $data['report']=$req->report;
        $data['role']=$req->role;
        $data['return']=$req->return;
        $data['contact']=$req->contact;
        $data['comment']=$req->comment;
        $data['other']=$req->other;
        $data['setting']=$req->setting;
        $data['stock']=$req->stock;
        $data['type']=2;
        Admin::where('id',$req->id)->update($data);
        $notification=array(
            'messege'=>'Child Admin Succesfully Updated',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.all.user')->with($notification);
    }
}
