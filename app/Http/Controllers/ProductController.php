<?php

namespace App\Http\Controllers;

use App\Model\Admin\Category;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use Cart;

class ProductController extends Controller
{
    public function viewProduct($id,$name){
        $product = Product::join('categories','categories.id','products.category_id')->join('subcategories','subcategories.id','products.subcategory_id')->join('brands','brands.id','products.brand_id')->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')->where('products.id',$id)->first();
        $col = $product->color;
        $color = explode(',', $col);
        $siz = $product->size;
        $size = explode(',', $siz);
        return view('pages.product_details',compact('product','color','size'));
    }

    public function addProductCart(Request $req,$id){
        $product = Product::where('id',$id)->first();
        $data = array();
        if ($product->discount_price == NULL) {
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $req->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['color'] = $req->color;
            $data['options']['size'] = $req->size;
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
            $data['qty'] = $req->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['color'] = $req->color;
            $data['options']['size'] = $req->size;
            $data['options']['image'] = $product->image_1;
            Cart::add($data);
            $notification=array(
                'messege'=>'Berhasil Menambahkan Ke Keranjang',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function productView($id){
        $product = Product::where('subcategory_id',$id)->paginate(2);
        $category = Category::all();
        $brands = Product::where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();
        return view('pages.all_products',compact('product','brands','category'));
    }

    public function categoryView($id){
        $product = Product::where('category_id',$id)->paginate(2);
        $category = Category::all();
        $brands = Product::where('category_id',$id)->select('brand_id')->groupBy('brand_id')->get();
        return view('pages.all_category',compact('product','category','brands'));
    }

    public function search(Request $req){
        $product = Product::where('name','like',"%$req->search%")->paginate(20);
        $category = Category::all();
        $brands = Product::where('name','like',"%$req->search%")->select('brand_id')->groupBy('brand_id')->get();
        return view('pages.product.search',compact('product','category','brands'));
    }

}
