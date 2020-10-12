<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Post;
use App\Model\Admin\PostCategory;
use Illuminate\Http\Request;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function categoryList(){
        $blogcat = PostCategory::all();
        return view('admin.blog.category.index',compact('blogcat'));
    }

    public function storeCategory(Request $req){
        $validateData = $req->validate([
            'category_name_ina' => 'required|max:50|min:2|unique:post_category',
            'category_name_en' => 'required|max:50|min:2|unique:post_category',
        ]);
        $data = array();
        $data['category_name_ina']=$req->category_name_ina;
        $data['category_name_en']=$req->category_name_en;
        PostCategory::insert($data);
        return redirect()->back();
    }

    public function destroyCategory($id){
        PostCategory::where('id',$id)->delete();
        return redirect()->back();
    }

    public function editCategory($id){
        $cat = PostCategory::where('id',$id)->first();
        return view('admin.blog.category.edit',compact('cat'));
    }

    public function updateCategory(Request $req, $id){
        $data = array();
        $data['category_name_ina'] = $req->category_name_ina;
        $data['category_name_en'] = $req->category_name_en;
        PostCategory::where('id',$id)->update($data);
        return redirect()->route('add.blog.categorylist');
    }

    public function index(){
        $post = Post::join('post_category','post_category.id','posts.category_id')->select('posts.*','post_category.category_name_ina')->get();
        return view('admin.blog.post.index',compact('post'));
    }

    public function create(){
        $category = PostCategory::all();
        return view('admin.blog.post.create',compact('category'));
    }

    public function store(Request $req){
        $validateData = $req->validate([
            'title_ina'=>'required|max:100|unique:posts',
            'title_en'=>'required|max:100|unique:posts',
        ]);
        $data=array();
        $data['title_ina']=$req->title_ina;
        $data['title_en']=$req->title_en;
        $data['category_id']=$req->category_id;
        $data['details_ina']=$req->details_ina;
        $data['details_en']=$req->details_en;
        $image = $req->file('image');
        if ($image) {
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, null, function ($constraint) {$constraint->aspectRatio();})->save('public/media/blog/'.$image_name);
            $data['image'] = 'public/media/blog/'.$image_name;
            Post::insert($data);
            return redirect()->route('blog.posts');
        }else{
            $data['image']='';
            Post::insert($data);
            return redirect()->route('blog.posts');
        }
    }

    public function destroy($id){
        $post = Post::where('id',$id)->first();
        $img = $post->image;
        unlink($img);
        Post::where('id',$id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        $post = Post::where('id',$id)->first();
        $category = PostCategory::all();
        return view('admin.blog.post.edit',compact('post','category'));
    }

    public function update(Request $req, $id){
        $oldImage = $req->old_image;
        $data=array();
        $data['title_ina']=$req->title_ina;
        $data['title_en']=$req->title_en;
        $data['category_id']=$req->category_id;
        $data['details_ina']=$req->details_ina;
        $data['details_en']=$req->details_en;
        $image = $req->file('image');
        if ($image) {
            unlink($oldImage);
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, null, function ($constraint) {$constraint->aspectRatio();})->save('public/media/blog/'.$image_name);
            $data['image'] = 'public/media/blog/'.$image_name;
            Post::where('id',$id)->update($data);
            return redirect()->route('blog.posts');
        }else{
            $data['image']=$oldImage;
            Post::where('id',$id)->update($data);
            return redirect()->route('blog.posts');
        }
    }


}
