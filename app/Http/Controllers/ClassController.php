<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class ClassController extends Controller
{
    //
    public function classed(Request $request)
    {
    	// $orders=DB::table('orders')->get();
    	//用户登陆的id
    	$id = session('hid');
    	$orders=DB::table('orders')->where('user_id',$id)->whereIn('status',[1])->get();
    	// dd($orders);
    	return view('home.user.class',['orders'=>$orders]);
    }
}
