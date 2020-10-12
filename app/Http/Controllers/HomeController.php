<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(){
    $order = Order::where('user_id',Auth::id())->orderBy('id','desc')->limit(10)->get();
    return view('home',compact('order'));
  }

  public function changePassword(){
      return view('auth.changepassword');
  }

  public function updatePassword(Request $request)
  {
    $password=Auth::user()->password;
    $oldpass=$request->oldpass;
    $newpass=$request->password;
    $confirm=$request->password_confirmation;
    if (Hash::check($oldpass,$password)) {
          if ($newpass === $confirm) {
                    $user=User::find(Auth::id());
                    $user->password=Hash::make($request->password);
                    $user->save();
                    Auth::logout();  
                    $notification=array(
                      'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                      'alert-type'=>'success'
                        );
                      return Redirect()->route('login')->with($notification); 
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

  public function Logout()
  {
      // $logout= Auth::logout();
          Auth::logout();
          $notification=array(
              'messege'=>'Successfully Logout',
              'alert-type'=>'success'
                );
            return Redirect()->route('login')->with($notification);
      

  }
}
