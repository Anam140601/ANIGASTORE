<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function todayOrder(){
        $today = date('d-m-y');
        $order = Order::where('date',$today)->where('status',0)->get();
        $title = 'todayorder';
        $total = null;
        $subtitle = null;
        return view('admin.report.index',compact('order','title','total','subtitle'));
    }
    public function todaydelivered(){
        $today = date('d-m-y');
        $order = Order::where('date',$today)->where('status',3)->get();
        $title = 'todaydeliv';
        $total = null;
        $subtitle = null;
        return view('admin.report.index',compact('order','title','total','subtitle'));
    }
    public function thismounth(){
        $month = date('F');
        $order = Order::where('month',$month)->where('status',3)->get();
        $title = 'mountdeliv';
        $total = null;
        $subtitle = null;
        return view('admin.report.index',compact('order','title','total','subtitle'));
    }
    public function searchreport(){
        $month = date('F');
        $order = Order::where('month',$month)->where('status',3)->get();
        return view('admin.report.search',compact('order'));
    }
    public function searchByYear(Request $req){
        $year = $req->year;
        $order = Order::where('year',$year)->where('status',3)->get();
        $total = Order::where('year',$year)->where('status',3)->sum('total');
        $title = 'searchbyyear';
        $subtitle = $req->year;
        return view('admin.report.index',compact('order','title','total','subtitle'));
    }
    public function searchByMonth(Request $req){
        $month = $req->month;
        $order = Order::where('month',$month)->where('status',3)->get();
        $total = Order::where('month',$month)->where('status',3)->sum('total');
        $title = 'searchbymonth';
        $subtitle = $req->month;
        return view('admin.report.index',compact('order','title','total','subtitle'));
    }
    public function searchByDate(Request $req){
        $date = $req->date;
        $newDate = date('d-m-y',strtotime($date));
        $order = Order::where('date',$newDate)->where('status',3)->get();
        $total = Order::where('date',$newDate)->where('status',3)->sum('total');
        $title = 'searchbydate';
        $subtitle = $newDate;
        return view('admin.report.index',compact('order','title','total','subtitle'));
        
    }
}
