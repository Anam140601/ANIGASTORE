<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function store(Request $req){
        $validateData = $req->validate([
            'category_name' => 'required|unique:categories|max:100|min:2',
        ]);
        $category = new Category();
        $category->category_name = $req->category_name;
        $category->save();
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return Redirect()->back();
    }

    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $req, $id){
        $validateData = $req->validate([
            'category_name' => 'required|max:100|min:2',
        ]);
        $data = array();
        $data['category_name']=$req->category_name;
        $update = Category::where('id',$id)->update($data);
        if ($update) {
            Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
            return redirect()->route('categories');
        } else {
            Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
            return redirect()->route('categories');
        }
    }

    public function destroy($id){
        Category::where('id',$id)->delete();
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return Redirect()->back();
    }
}