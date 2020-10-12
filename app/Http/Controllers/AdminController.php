<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Model\Admin\Brand;
use App\Model\Admin\Product;
use App\Model\Order;
use App\User;

class AdminController extends Controller
{
      /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // dashboard
    //today
    $today = Order::where('date',date('d-m-y'))->sum('total');
    $todayqty = Order::where('date',date('d-m-y'))->count('id');
    //month
    $month = Order::where('month',date('F'))->sum('total');
    $monthqty = Order::where('month',date('F'))->count('id');
    //year
    $year = Order::where('year',date('Y'))->sum('total');
    $yearqty = Order::where('year',date('Y'))->count('id');
    //today delivered
    $todayDelivered = Order::where('date',date('d-m-y'))->where('status',3)->sum('total');
    $todayDeliveredQty = Order::where('date',date('d-m-y'))->where('status',3)->count('id');
    //total return
    $return = Order::where('return_order',2)->sum('total');
    $returnQty = Order::where('return_order',2)->count('id');
    //total product
    $productQty = Product::count('id');
    //total brand
    $brandQty = Brand::count('id');
    //total user
    $userQty = User::count('id');
    return view('admin.home',compact('today','todayqty','month','monthqty','year','yearqty','todayDelivered','todayDeliveredQty','return','returnQty','productQty','brandQty','userQty'));
  }

  public function ChangePassword()
  {
      return view('admin.auth.passwordchange');
  }

  public function Update_pass(Request $request)
  {
    $password=Auth::user()->password;
    $oldpass=$request->oldpass;
    $newpass=$request->password;
    $confirm=$request->password_confirmation;
    if (Hash::check($oldpass,$password)) {
          if ($newpass === $confirm) {
                    $user=Admin::find(Auth::id());
                    $user->password=Hash::make($request->password);
                    $user->save();
                    Auth::logout();  
                    $notification=array(
                      'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                      'alert-type'=>'success'
                        );
                      return Redirect()->route('admin.login')->with($notification); 
                }else{
                    $notification=array(
                      'messege'=>'New password and Confirm Password not matched!',
                      'alert-type'=>'error'
                        );
                      return Redirect()->back()->with($notification);
                }     
    }else{
      $notification=array(
              'messege'=>'Old Password not matched!',
              'alert-type'=>'error'
                );
              return Redirect()->back()->with($notification);
    }
  }

  public function logout()
  {
      Auth::logout();
          $notification=array(
              'messege'=>'Successfully Logout',
              'alert-type'=>'success'
                );
            return Redirect()->route('admin.login')->with($notification);
  }

}
