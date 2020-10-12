<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('pages.contact.index');
    }

    public function store(Request $req){
        $data = array();
        $data['name']=$req->name;
        $data['email']=$req->email;
        $data['phone']=$req->phone;
        $data['message']=$req->message;
        Contact::insert($data);
        $notification=array(
            'messege'=>'Pesanmu Berhasil Disampaikan',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function allMessage(){
        $contact = Contact::all();
        return view('admin.contact.index',compact('contact'));
    }
}
