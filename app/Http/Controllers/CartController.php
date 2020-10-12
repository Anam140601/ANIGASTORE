<?php

namespace App\Http\Controllers;

use App\Model\Admin\Coupon;
use App\Model\Admin\Product;
use App\Model\Admin\Setting;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add($id){
        $product = Product::where('id',$id)->first();
        $data = array();
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            $data['options']['image'] = $product->image_1;
            Cart::add($data);
            return \Response::json(['success' => 'Berhasil Menambahkan Ke Keranjang']);
        }else{
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            $data['options']['image'] = $product->image_1;
            Cart::add($data);
            return \Response::json(['success' => 'Berhasil Menambahkan Ke Keranjang']);
        }
    }

    public function check(){
        $content = Cart::content();
        return  response()->json($content);
    }
    public function show(){
        $cart = Cart::content();
        return view('pages.cart',compact('cart'));
    }

    public function remove($rowId){
        Cart::remove($rowId);
        $notification=array(
            'messege'=>'Berhasil Menghapus Produk',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $req){
        $rowId = $req->productId;
        $qty = $req->qty;
        Cart::update($rowId,$qty );
        Session::forget('coupon');
        $notification=array(
            'messege'=>'Berhasil Mengubah Jumlah Produk',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function view($id){
        $product = Product::join('categories','categories.id','products.category_id')->join('subcategories','subcategories.id','products.subcategory_id')->join('brands','brands.id','products.brand_id')->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')->where('products.id',$id)->first();
        $col = $product->color;
        $color = explode(',', $col);
        $siz = $product->size;
        $size = explode(',', $siz);
        return response::json(array(
            'product'=>$product,
            'color'=>$color,
            'size'=>$size,
        ));
    }

    public function insert(Request $req){
        $id = $req->product_id;
        $product = Product::where('id',$id)->first();
        $qty = $req->qty;
        $color = $req->color;
        $size = $req->size;
        $data = array();
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['color'] = $color;
            $data['options']['size'] = $size;
            $data['options']['image'] = $product->image_1;
            Cart::add($data);
            $notification=array(
                'messege'=>'Berhasil Menambahkan Ke Keranjang',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['color'] = $color;
            $data['options']['size'] = $size;
            $data['options']['image'] = $product->image_1;
            Cart::add($data);
            $notification=array(
                'messege'=>'Berhasil Menambahkan Ke Keranjang',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function checkout(){
        if (Auth::check()) {
            $cart = Cart::content();
            $setting = Setting::first();
            $charge = $setting->shipping_charge;
            $ppn = $setting->vat/100;
            $vat = $setting->vat;
            return view('pages.checkout',compact('cart','charge','vat','ppn'));
        }else{
            $notification=array(
                'messege'=>'Maaf Anda Harus Login Dulu',
                'alert-type'=>'warning'
            );
            return Redirect()->route('login')->with($notification);
        }
    }

    public function applyCoupon(Request $req){
        $coupon = $req->coupon;
        $check = Coupon::where('coupon',$coupon)->first();
        if ($check) {
            Session::put('coupon',[
                'name'=>$check->coupon,
                'discount'=>$check->discount,
                'balance'=>Cart::Subtotal()*$check->discount/100,
            ]);
            $notification=array(
                'messege'=>'Yeay, Kupon Berhasil Dipakai',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Yaah, Kupon Tidak Tersedia',
                'alert-type'=>'warning'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function removeCoupon(){
        Session::forget('coupon');
        $notification=array(
            'messege'=>'Yaah, Kupon Tidak Dipakai',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
