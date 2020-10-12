<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $category = Category::all();
        $subcategory = Subcategory::join('categories','subcategories.category_id','categories.id')->select('subcategories.*','categories.category_name')->get();
        return view('admin.subcategory.index', compact('category','subcategory'));
    }

    public function store(Request $req){
        $validateData = $req->validate([
            'subcategory_name' => 'required|max:100|min:2',
            'category_id' => 'required',
        ]);
        $data = array();
        $data['category_id'] = $req->category_id;
        $data['subcategory_name'] = $req->subcategory_name;
        Subcategory::insert($data);

        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return Redirect()->back();
    }

    public function edit($id){
        $category = Category::all();
        $subcategory = Subcategory::where('id',$id)->first();
        return view('admin.subcategory.edit', compact('category','subcategory'));
    }

    public function update(Request $req, $id){
        $data = array();
        $data['category_id'] = $req->category_id;
        $data['subcategory_name'] = $req->subcategory_name;
        Subcategory::where('id',$id)->update($data);

        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return Redirect()->route('subcategories');
    }

    public function destroy($id){
        Subcategory::where('id',$id)->delete();
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return Redirect()->back();
    }
}