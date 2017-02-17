<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;

class AccountLogController extends Controller
{
    /**
     * 余额总页
     */
    public function index()
    {
      $id = Session('hid');
      $money = DB::table('online_recharge')->where('user_id',$id)->orderby('id','desc')->get();
      // dd($money);
       return view('home.user.account_log',['money'=>$money]);
    }

}
