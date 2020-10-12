<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $product = Product::join('categories','products.category_id','categories.id')->join('brands','products.brand_id','brands.id')->select('products.*','categories.category_name','brands.brand_name')->get();
        return view('admin.product.index',compact('product'));
    }

    public function create(){
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.create',compact('category','brand'));
    }

    public function getSubCat($category_id){
        $subcategory = Subcategory::where('category_id',$category_id)->get();
        return json_encode($subcategory);
    }

    public function store(Request $req){
        $data= array();
        $data['name'] = $req->name;
        $data['code'] = $req->code;
        $data['qty'] = $req->qty;
        $data['category_id'] = $req->category_id;
        $data['subcategory_id'] = $req->subcategory_id;
        $data['brand_id'] = $req->brand_id;
        $data['size'] = $req->size;
        $data['color'] = $req->color;
        $data['selling_price'] = $req->selling_price;
        $data['discount_price'] = $req->discount_price;
        $data['detail'] = $req->detail;
        $data['video_link'] = $req->video_link;
        $data['main_slider'] = $req->main_slider;
        $data['hot_deal'] = $req->hot_deal;
        $data['best_rated'] = $req->best_rated;
        $data['trend'] = $req->trend;
        $data['mid_slider'] = $req->mid_slider;
        $data['hot_new'] = $req->hot_new;
        $data['buyone_getone'] = $req->buyone_getone;
        $data['status'] = 1;

        $image_1 = $req->image_1;
        $image_2 = $req->image_2;
        $image_3 = $req->image_3;

        if ($image_1 && $image_2 && $image_3) {
            $image_1_name = hexdec(uniqid()).'.'.$image_1->getClientOriginalExtension();
            Image::make($image_1)->fit(2000, null, function ($constraint) {$constraint->upsize();})->save('public/media/product/'.$image_1_name);
            $data['image_1'] = 'public/media/product/'.$image_1_name;

            $image_2_name = hexdec(uniqid()).'.'.$image_2->getClientOriginalExtension();
            Image::make($image_2)->resize(null, 500, function ($constraint) {$constraint->aspectRatio();})->save('public/media/product/'.$image_2_name);
            $data['image_2'] = 'public/media/product/'.$image_2_name;
            
            $image_3_name = hexdec(uniqid()).'.'.$image_3->getClientOriginalExtension();
            Image::make($image_3)->resize(null, 500, function ($constraint) {$constraint->aspectRatio();})->save('public/media/product/'.$image_3_name);
            $data['image_3'] = 'public/media/product/'.$image_3_name;

            Product::insert($data);
            return redirect()->back();
        }
    }

    public function inactive($id){
        Product::where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function active($id){
        Product::where('id',$id)->update(['status'=>1]);
        return redirect()->back();
    }

    public function destroy($id){
        $data = Product::where('id',$id)->first();
        $image_1 = $data->image_1;
        $image_2 = $data->image_2;
        $image_3 = $data->image_3;
        unlink($image_1);
        unlink($image_2);
        unlink($image_3);
        Product::where('id',$id)->delete();
        return redirect()->back();
    }

    public function show($id){
        $product = Product::join('categories','products.category_id','categories.id')->join('subcategories','products.subcategory_id','subcategories.id')->join('brands','products.brand_id','brands.id')->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')->where('products.id',$id)->first();
        return view('admin.product.show',compact('product'));
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        $brand = Brand::all();
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.product.edit',compact('product','brand','category','subcategory'));
    }

    public function updateWithoutImg(Request $req, $id){
        $data= array();
        $data['name'] = $req->name;
        $data['code'] = $req->code;
        $data['qty'] = $req->qty;
        $data['category_id'] = $req->category_id;
        $data['subcategory_id'] = $req->subcategory_id;
        $data['brand_id'] = $req->brand_id;
        $data['size'] = $req->size;
        $data['color'] = $req->color;
        $data['selling_price'] = $req->selling_price;
        $data['discount_price'] = $req->discount_price;
        $data['detail'] = $req->detail;
        $data['video_link'] = $req->video_link;
        $data['main_slider'] = $req->main_slider;
        $data['hot_deal'] = $req->hot_deal;
        $data['best_rated'] = $req->best_rated;
        $data['trend'] = $req->trend;
        $data['mid_slider'] = $req->mid_slider;
        $data['hot_new'] = $req->hot_new;
        $data['buyone_getone'] = $req->buyone_getone;
        $data['status'] = 1;

        Product::where('id',$id)->update($data);

        return redirect()->route('products');
    }

    public function updateImg(Request $req, $id){
        $old_img_1 = $req->old_img_1;
        $old_img_2 = $req->old_img_2;
        $old_img_3 = $req->old_img_3;

        $data = array();
        $image_1 = $req->file('image_1');
        $image_2 = $req->file('image_2');
        $image_3 = $req->file('image_3');

        if ($image_1) {
            unlink($old_img_1);
            $image_1_name = hexdec(uniqid()).'.'.$image_1->getClientOriginalExtension();
            Image::make($image_1)->fit(2000, null, function ($constraint) {$constraint->upsize();})->save('public/media/product/'.$image_1_name);
            $data['image_1'] = 'public/media/product/'.$image_1_name;
            
            Product::where('id',$id)->update($data);
            return Redirect()->route('products');
        }
        if ($image_2) {
            unlink($old_img_2);
            $image_2_name = hexdec(uniqid()).'.'.$image_2->getClientOriginalExtension();
            Image::make($image_2)->resize(null, 500, function ($constraint) {$constraint->aspectRatio();})->save('public/media/product/'.$image_2_name);
            $data['image_2'] = 'public/media/product/'.$image_2_name;
            Product::where('id',$id)->update($data);
            return Redirect()->route('products');
        }
        if ($image_3) {
            unlink($old_img_3);
            $image_3_name = hexdec(uniqid()).'.'.$image_3->getClientOriginalExtension();
            Image::make($image_3)->resize(null, 500, function ($constraint) {$constraint->aspectRatio();})->save('public/media/product/'.$image_3_name);
            $data['image_3'] = 'public/media/product/'.$image_3_name;
            Product::where('id',$id)->update($data);
            return Redirect()->route('products');
        }
    }

    public function stock(){
        $product = Product::join('categories','products.category_id','categories.id')->join('brands','products.brand_id','brands.id')->select('products.*','categories.category_name','brands.brand_name')->get();
        return view('admin.product.stock',compact('product'));
    }
}
