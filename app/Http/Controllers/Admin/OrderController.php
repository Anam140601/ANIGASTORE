<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Product;
use App\Model\Order;
use App\Model\Orders_detail;
use App\Model\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newOrder(){
        $order = Order::where('status',0)->get();
        $title = 'new';
        return view('admin.order.index',compact('order','title'));
    }
    public function acceptOrder(){
        $order = Order::where('status',1)->get();
        $title = 'accept';
        return view('admin.order.index',compact('order','title'));
    }
    public function progresOrder(){
        $order = Order::where('status',2)->get();
        $title = 'progres';
        return view('admin.order.index',compact('order','title'));
    }
    public function deliveredOrder(){
        $order = Order::where('status',3)->get();
        $title = 'deliv';
        return view('admin.order.index',compact('order','title'));
    }
    public function cancelOrder(){
        $order = Order::where('status',4)->get();
        $title = 'cancel';
        return view('admin.order.index',compact('order','title'));
    }
    public function viewOrder($id){
        $order = Order::join('users','users.id','orders.user_id')->select('orders.*','users.name','users.phone')->where('orders.id',$id)->first();
        $shipping = Shipping::where('order_id',$order->id)->first();
        $details = Orders_detail::join('products','products.id','orders_details.product_id')->select('orders_details.*','products.code','products.image_1')->where('orders_details.order_id',$id)->get();
        return view('admin.order.view',compact('order','shipping','details'));
    }
    public function accept($id){
        Order::where('id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'Order Accepted',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.new.order')->with($notification);
    }
    public function process($id){
        Order::where('id',$id)->update(['status'=>2]);
        $notification=array(
            'messege'=>'Send To Delivery',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.accept.order')->with($notification);
    }
    public function done($id){
        $product = Orders_detail::where('order_id',$id)->get();
        foreach ($product as $row) {
            Product::where('id',$row->product_id)->update(['qty'=>DB::raw('qty-'.$row->qty)]);
        }
        Order::where('id',$id)->update(['status'=>3]);
        $notification=array(
            'messege'=>'Delivery Done',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.progres.order')->with($notification);
    }
    public function cancel($id){
        Order::where('id',$id)->update(['status'=>4]);
        $notification=array(
            'messege'=>'Order Canceled',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.new.order')->with($notification);
    }
}
