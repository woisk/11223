<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class InfoController extends Controller
{
    public function info()
    {
      // 获取当前登录的用户的ID
      $id = session('hid');
      // dd($id);
      $users = DB::table('users')->where('id',$id)->first();
      $userdetail=DB::table('userdetail')->where('user_id',$id)->first();
      // dd($userdetail);
      return view('home.user.info',['users'=>$users,'userdetail'=>$userdetail]);
    }

    public function doinfo(Request $request)
    {
      // 获取当前登录的用户的ID
      $id = session('hid');
      // 接收提交参数
      $data=$request->all();
    	// dd($data);
    	$data=DB::table('userdetail')->where('user_id',$id)->update($data);
    	return redirect('/user/info')->with('info','更新成功');
    }

}
