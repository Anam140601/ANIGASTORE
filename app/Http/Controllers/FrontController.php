<?php

namespace App\Http\Controllers;

use App\Model\Admin\Category;
use App\Model\Admin\Newslater;
use App\Model\Admin\Product;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){

        $featured = Product::where('status',1)->orderBy('id','DESC')->limit(8)->get();
        $trend = Product::where('status',1)->where('trend',1)->orderBy('id','DESC')->limit(8)->get();
        $best = Product::where('status',1)->where('best_rated',1)->orderBy('id','DESC')->limit(8)->get();
        $hot = Product::join('brands','brands.id','products.brand_id')->select('products.*','brands.brand_name')->where('products.status',1)->where('products.hot_deal',1)->orderBy('id','DESC')->limit(3)->get();
        $category = Category::all();
        $mid = Product::join('categories','categories.id','products.category_id')->join('brands','brands.id','products.brand_id')->select('products.*','categories.category_name','brands.brand_name')->where('products.status',1)->where('products.mid_slider',1)->orderBy('id','desc')->limit(3)->get();
        $cats = Category::skip(1)->first();
        $catid = $cats->id;
        $product = Product::where('category_id',$catid)->where('status',1)->limit(10)->orderBy('id','desc')->get();
        $buyget = Product::join('brands','brands.id','products.brand_id')->where('products.status',1)->where('products.buyone_getone',1)->select('products.*','brands.brand_name')->orderBy('id','desc')->limit(6)->get();
        return view('pages.index',compact('featured','trend','best','hot','category','mid','product','cats','buyget'));
    }
    public function storeNewslater(Request $req){
        $validateData = $req->validate([
            'email' => 'required|unique:newslaters',
        ]);
        $data = array();
        $data['email'] = $req->email;
        Newslater::insert($data);
        $notification=array(
            'messege'=>'Terimakasih Telah SUbscribe',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);
    }

    public function tracking(Request $req){
        $track = Order::where('status_code',$req->code)->first();
        
        if ($track) {
            $notification=array(
                'messege'=>'Yeay! Transaksi Ditemukan',
                'alert-type'=>'success'
            );
            return view('pages.tracking',compact('track'))->with($notification);
        }else{
            $notification=array(
                'messege'=>'Opps! Kode Status Salah!',
                'alert-type'=>'error'
            );
            return Redirect()->to('/')->with($notification);
        }
    }

    public function returnView(){
        $order = Order::where('status',3)->where('user_id',Auth::id())->orderBy('id','desc')->limit(5)->get();
        return view('pages.return.index',compact('order'));
    }

    public function returnRequest($id){
        Order::where('id',$id)->update(['return_order'=>1]);
        $notification=array(
            'messege'=>'Permintaan Pengembalian Selesai',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
