<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Coupon;
use App\Model\Admin\Newslater;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $coupon = Coupon::all();
        return view('admin.coupon.coupon', compact('coupon'));
    }

    public function store(Request $req){
        $validateData = $req->validate([
            'coupon' => 'required|unique:coupons|max:100|min:2',
        ]);
        $data = array();
        $data['coupon']=$req->coupon;
        $data['discount']=$req->discount;
        Coupon::insert($data);
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return Redirect()->back();
    }

    public function edit($id){
        $coupon = Coupon::where('id',$id)->first();
        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function update(Request $req, $id){
        $validateData = $req->validate([
            'coupon' => 'required|max:100|min:2',
            'discount' => 'required|max:2|min:1',
        ]);
        $data = array();
        $data['coupon']=$req->coupon;
        $data['discount']=$req->discount;
        $update = Coupon::where('id',$id)->update($data);
        if ($update) {
            Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
            return redirect()->route('admin.coupon');
        } else {
            Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
            return redirect()->route('admin.coupon');
        }
    }

    public function destroy($id){
        Coupon::where('id',$id)->delete();
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return Redirect()->back();
    }
}
