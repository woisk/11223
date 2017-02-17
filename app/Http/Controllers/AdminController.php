<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminController extends Controller
{
    //
    public function index()
    {

        // dd($gnum);
        return view('admin.index');
    }

    // 登录页面
    public function login()
    {
        return view('admin.login');
    }

    /**
     * 登录操作
     */
    public function dologin(Request $request)
    {
        // 提取参数
        $data = $request->only(['username','password']);

        // 检索数据库
        $info = DB::table('users')->where('username',$data['username'])->first();
        // dd($info);

        // 检测用户名是为空
        if(empty($info)){
            return back()->with('info','用户名不存在!!!');
        }
        // 提取权限信息
        $auth = $info->auth;

        // 判断是否有权限
        if($auth==1){
            // 检测密码是否正确
            if(Hash::check($data['password'], $info->password)){
                // 提醒
                session(['uid'=>$info->id]);
                return redirect('/admin');
            }else{
                return back()->with('info','密码错误');
            }
        }else{
            return back()->with('info','您没有权限登录');
        }
        // if(empty($info) || $info['status']==1){
        //     return back()->with('info','用户名不存在!!!');
        // }


    }

    /**
     * 退出登陆
     */
    public function logout(Request $request)
    {
    	//移出session
    	$request->session()->forget('uid');
    	//跳转页面
    	return redirect('/admin');
    }
}
