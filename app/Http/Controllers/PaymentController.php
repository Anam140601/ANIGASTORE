<?php

namespace App\Http\Controllers;

use App\Model\Admin\Setting;
use App\Model\Order;
use App\Model\Orders_detail;
use App\Model\Shipping;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function payment(Request $req){
        $data=array();
        $data['name']=$req->name;
        $data['phone']=$req->phone;
        $data['email']=$req->email;
        $data['city']=$req->city;
        $data['address']=$req->address;
        $data['payment']=$req->payment;

        $cart = Cart::Content();
        $setting = Setting::first();
        $charge = $setting->shipping_charge;
        $ppn = $setting->vat/100;
        $vat = $setting->vat;

        if ($req->payment == 'stripe') {
            return view('pages.payment.stripe',compact('data','cart','charge','vat','ppn'));
        }elseif($req->payment == 'paypal'){
            //
        }elseif ($req->payment == 'ideal') {
            # code...
        }else{
            echo "COD";
        }
    }

    public function paymenPage(){
        $cart = Cart::Content();
        $setting = Setting::first();
        $charge = $setting->shipping_charge;
        $ppn = $setting->vat/100;
        $vat = $setting->vat;
        return view('pages.payment',compact('cart','charge','vat','ppn'));
    }

    public function stripeCharge(Request $req){
        $total = $req->total;
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51HVdBaHq9i7NsMLEGJ2WKQC9PJXJQGOZwnuyH0eDsQ3nkHNAtqUbkEYpZG9ZezfvkC4bHJuMgi3mUeXDlHik6Ezb00cOgyv8OA');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'idr',
            'description' => 'Pembayaran ANIGASTORE',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        
        //data order table
        $data = array();
        $data['user_id']=Auth::id();
        $data['payment_id']=$charge->payment_method;
        $data['payment_type']=$req->payment_type;
        $data['paying_amount']=$charge->amount;
        $data['blnc_transaction']=$charge->balance_transaction;
        $data['stripe_order_id']=$charge->metadata->order_id;
        $data['shipping']=$req->shipping;
        $data['vat']=$req->vat;
        $data['subtotal']=Cart::Subtotal();
        $data['total']=$req->total;
        $data['status']=0;
        $data['date']=date('d-m-y');
        $data['month']=date('F');
        $data['year']=date('Y');
        $data['status_code']=mt_rand(100000,999999);
        $order_id = Order::insertGetId($data);

        // dat shippings table
        $shipping = array();
        $shipping['order_id']=$order_id;
        $shipping['ship_name']=$req->ship_name;
        $shipping['ship_phone']=$req->ship_phone;
        $shipping['ship_email']=$req->ship_email;
        $shipping['ship_city']=$req->ship_city;
        $shipping['ship_address']=$req->ship_address;
        Shipping::insert($shipping);

        //data order detail
        $content = Cart::Content();
        $details=array();
        foreach ($content as $row) {
            $details['order_id']=$order_id;
            $details['product_id']=$row->id;
            $details['product_name']=$row->name;
            $details['color']=$row->options->color;
            $details['size']=$row->options->color;
            $details['qty']=$row->qty ;
            $details['singleprice']=$row->price;
            $details['totalprice']=$row->price*$row->qty;
            Orders_detail::insert($details);
        }

        // hapus cart & kupon
        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $notification=array(
            'messege'=>'Yay... Pembayaran Berhasil',
            'alert-type'=>'success'
        );
        return Redirect()->to('/')->with($notification);

    }
}
