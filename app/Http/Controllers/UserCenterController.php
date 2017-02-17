<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;

class UserCenterController extends Controller
{
    //
    public function index(Request $request)
    {
        // 个人中心主页
        // $data = $request->session()->all();
        // 获取当前登录的用户的ID
        $id = session('hid');
        // dd($data);
        $users = DB::table('users')->where('id',$id)->first();
        // dd($users);
        return view('home.user.index',['users'=>$users]);
    }

    /**
     * 修改头像
     */
     public function profile(Request $request)
     {
        return view('home.user.profile');
     }

     public function doprofile(Request $request)
    {
        //获取session的值
        $id = session('hid');
        // dd($id);
         //文件上传
        if($request->hasFile('profile')) {
            $pic['profile'] = $this->upload($request);
        }
        // dd($data1);
        //写入数据库
        $res = DB::table('users')->where('id',$id)->update($pic);

        if($res) {
            // return redirect('/user')->with('info','添加成功');
            echo '修改成功';
        }else{
            // return back()->with('info','添加失败');
            echo '修改失败';
        }
    }
     /**
     * 文件上传操作
     */
    public function upload($request)
    {
        if($request->hasFile('profile')) {
            //拼接文件名称
            $fileName = time().rand(1000000,9999999);
            //获取文件的后缀名
            $suffix = $request->file('profile')->getClientOriginalExtension();
            //文件夹的规则
            $dir = './uploads/'.date('Ymd');
            $request->file('profile')->move($dir, $fileName.'.'.$suffix);
            //拼接路径
            $data['profile'] = trim($dir.'/'.$fileName.'.'.$suffix,'.');
            return $data['profile'];
        }
        return null;
    }
}
