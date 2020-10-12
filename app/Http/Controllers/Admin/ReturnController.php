<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $order = Order::where('return_order',1)->orwhere('return_order',2)->orderby('return_order','asc')->get();
        $title = 'Return Order List';
        return view('admin.return.index',compact('order','title'));
    }

    public function approve($id){
        Order::where('id',$id)->update(['return_order'=>2]);
        $notification=array(
            'messege'=>'Return Order Has Been Approve',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
