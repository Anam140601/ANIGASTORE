<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        $brand = Brand::all();
        return view('admin.brand.index', compact('brand'));
    }

    public function store(Request $req){
        $validateData = $req->validate([
            'brand_name' => 'required|unique:brands|max:100|min:2',
        ]);
        $data = array();
        $data['brand_name'] = $req->brand_name;
        $image = $req->file('brand_logo');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['brand_logo'] = $image_url;
            Brand::insert($data);
            return Redirect()->back();
        } else {
            Brand::insert($data);
            return Redirect()->back();
        }
    }

    public function edit($id){
        $brand = Brand::where('id',$id)->first();
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $req, $id){
        $oldlogo = $req->old_logo;

        $data = array();
        $data['brand_name'] = $req->brand_name;
        $image = $req->file('brand_logo');
        if ($image) {
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['brand_logo'] = $image_url;
            Brand::where('id',$id)->update($data);
            return Redirect()->route('brands');
        } else {
            Brand::where('id',$id)->update($data);
            return Redirect()->route('brands');
        }
    }

    public function destroy($id){
        $data = Brand::where('id',$id)->first();
        $image = $data->brand_logo;
        unlink($image);
        Brand::where('id',$id)->delete();
        return Redirect()->back();
    }
}
