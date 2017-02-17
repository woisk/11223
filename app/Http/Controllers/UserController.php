<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * 用户添加
     */
    public function getAdd()
    {
      // 显示表单
        return view('admin.user.add');
    }

    /**
     * 数据插入
     */
    public function postInsert(Request $request)
    {
      // 表单验证
      $this->validate($request,[
        'username' => 'required|regex:/^\w{6,20}$/|unique:users,username',
        'password' => 'required|same:repassword',
      ],[
        'username.required'=>'用户名不能为空!',
        'username.regex'=>'用户名格式不正确!',
        'username.unique'=>'用户名已存在!',
        'password.required'=>'密码字段不能为空!',
        'password.same'=>'两次密码不一致!',
      ]);

      // 处理数据
      // $data = $request->all();//获取全部参数
      $data = $request->except('_token','repassword');//获取其余参数

      // 加密密码
      $data['password'] = Hash::make($data['password']);
      // dd($data);
      $data['status'] = 1;
      // 文件上传
      if($request->hasFile('profile')){
          $data['profile'] = $this->upload($request);
      }

      // dd($data);
      // 写入数据库
      $datas['user_id'] = DB::table('users')->insertGetId($data);
      // dd($id);
      $res = DB::table('userdetail')->insert($datas);
      $res1 = DB::table('money')->insert($datas);
      if($res && $res1){
          return redirect('/admin/user/list')->with('info','添加成功');
      }else{
          return back()->with('info','添加失败');
      }

    }

      /**
       * 用户列表显示
       */
      public function getList(Request $request)
      {
        $keyword = $request->input('keyword');
        if(empty($keyword)){
          // 获取数据
          $users = DB::table('users')->orderBy('id', 'desc')->paginate($request->input('num',10));
        }else{
           $users = DB::table('users')
            ->where('username','like','%'.$keyword.'%')
            ->paginate($request->input('num',10));
        }
        // var_dump($users);

        return view('admin.user.list',['users'=>$users,'request'=>$request]);
      }

    /**
     * 文件上传操作
     */
    public function upload($request)
    {
        if($request->hasFile('profile')){
            // 拼接文件名称
            $fileName = time().rand(1000000,9999999);
            // 获取文件后缀名
            $suffix = $request->file('profile')->getClientOriginalExtension();
            // 文件夹的规则
            $dir = './uploads/'.date('Ymd');
            $request->file('profile')->move($dir,$fileName.'.'.$suffix);
            // 拼接路径
            $data['profile'] = trim($dir.'/'.$fileName.'.'.$suffix,'.');
            return $data['profile'];
        }
        return null;
    }

    /**
     * 用户修改操作
     */
    public function getEdit(Request $request)
    {
        // 读取数据
        $id = $request->input('id');
        // 读取数据库
        $user = DB::table('users')->where('id','=',$id)->first();
        // 返回数据
        return view('admin.user.edit',['user'=>$user]);
        // dd($user);
    }

    /**
     * 用户更新动作
     */
    public function postUpdate(Request $request)
    {
        // 验证
        // 提取数据
        $data = $request->except(['_token', 'profile','id']);
        //处理图片
        if($request->hasFile('profile')) {
            $data['profile'] = $this->upload($request);
        }
        // 更新
        $res = DB::table('users')->where('id',$request->input('id'))->update($data);
        // 检测
        if($res) {
            return redirect('/admin/user/list')->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }

    }

    /**
     * 用户删除
     */
     public function getDelete(Request $request)
     {
        // 获取id
        $id = $request->input('id');
        // 读取
        $info = DB::table('users')->where('id',$id)->first();
        // 删除头像
        @unlink('.'.$info->profile);
        // 删除信息
        $res = DB::table('users')->where('id',$id)->delete();
        // 检测
        if($res) {
            return redirect('/admin/user/list')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
     }
}
