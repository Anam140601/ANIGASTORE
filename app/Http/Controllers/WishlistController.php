<?php

namespace App\Http\Controllers;

use App\Model\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add($id){
        $user_id = Auth::id();
        $check = Wishlist::where('user_id',$user_id)->where('product_id',$id)->first();
        $data = array(
            'user_id' => $user_id,
            'product_id' => $id,
        );
        if (Auth::check()) {
            if ($check) {
                return \Response::json(['error' => 'Produk Ini Sudah Ada Dalam Wishlist']);
            }else{
                Wishlist::insert($data);
                return \Response::json(['success' => 'Yeay! Produk Berhasil DImasukan ke Wishlist']);
            }
        } else {
            return \Response::json(['error' => 'Opps! Maaf Harus Masuk Dulu']);
        }
    }

    public function show(){
        $userId = Auth::id();
        $product = Wishlist::join('products','products.id','wishlists.product_id')->select('products.*','wishlists.user_id')->where('wishlists.user_id',$userId)->get();
        return view('pages.wishlist',compact('product'));
    }
}
