<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;
class PasswordController extends Controller
{
    //修改密码显示
    public function edit(Request $request)
    {

      return view('home.user.editpassword');
    }

    //修改
      public function update(Request $request)
      {
        // dd($request->all());
        //获取用户输入的username
        $username=$request->input('username');
        //从session中读取id
        $id = session('hid');
        //获取数据库里的username
        $name=DB::table('users')->where('id',$id)->value('username');
        //判断俩次输入的用户名是否一致
        if($username != $name){
            echo '用户名输入不正确,请重新输入!!!';
        }else{
          //提取数据
          $data=$request->except(['act','username','repassword']);
          $date=[];
          $data['password']=Hash::make($request->input('password'));
          //更新
          $res=DB::table('users')->where('id',$id)->update($data);
          // dd($res);
            if($res){
              Session::flush();
              return redirect('/user/info')->with('info','更新成功');
              // echo 'ok';
            }else{
              return back()->with('info','更新失败');
              // echo 'no';
            }
          }
      }

}
?>
