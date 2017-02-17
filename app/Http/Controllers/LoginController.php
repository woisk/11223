<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Mail;

class LoginController extends Controller
{
    /**
     * 前台主页
     */
    public function index()
    {
      //网站公告
       $article = DB::table('article')->get();
      // 友情链接
       $links = DB::table('friendlink')->get();
      //  轮播图
       $lunbo = DB::table('lunbo')->get();
      // 导航信息
       $top = DB::table('top')->get();
      //  dd($article);
       // dd($lunbo);
       // dd($links);
       return view('home.index',['links'=>$links,'lunbo'=>$lunbo,'top'=>$top,'article'=>$article]);
    }

    /**
     * 前台用户注册
     */
    public function register()
    {
      if(session('hid')){
        // 如果已经登录直接跳转到用户个人中心
          return redirect('/user');
      }else{
        // 如果不存在跳转到注册页面
          return view('home.register');
      }
    }

    public function doregister(Request $request)
    {
        // dd($request->all());
        $data = $request->except(['repassword','_token']);
        // 加密密码
        $data['password'] = Hash::make($data['password']);
        $data['token'] = Hash::make($data['username']);
        // 插入数据
        // dd($data);
        $id = DB::table('users')->insertGetId($data);
        $userdetail['user_id'] = $id;
        $res1 = DB::table('userdetail')->insert($userdetail);
        $money['user_id'] = $id;
        $res2 = DB::table('money')->insert($money);
        // 用户地址
        $res3 = DB::table('address')->insert($userdetail);

        if($res1 && $res2 && $res3){
            /**
             * 邮件发送
             * 第一个参数:模板路径,第二个参数:变量分配,第三个参数:发送请求的细节:给谁发等等..
             */
            Mail::send('emails.active', ['data' => $data,'id'=>$id], function ($m) use ($data) {
                // 第一个:收件人邮箱地址  第二个:收件人名称 第三个:邮件标题
               $m->to($data['email'], $data['username'])->subject('账户激活邮件!');
           });

        }
    }

    /**
     * 账户邮箱激活
     */
    public function active(Request $request)
    {
        $id = $request->input('id');
        $result = DB::table('users')->where('id',$id)->first();
        // dd($result);
        if($result->token == $request->token){
            // 更新
            $data = [];
            $data['status'] = 1;
            $res = DB::table('users')->where('id',$request->input('id'))->update($data);
            if($res){
                return redirect('/')->with('info','激活成功!');
            }else{
                echo "您的账号已经激活!请勿重复提交";
            }
        }else{
            echo "无效的链接!";
        }

    }

    /**
     * 前台用户登录
     */
    public function login()
    {

        if(session('hid')){
          // 如果已经登录直接跳转到用户个人中心
            return redirect('/user');
        }else{
          // 如果不存在跳转到登录页面
            return view('home.login');
        }

    }

    /**
     *  登录操作
     */
    public function dologin(Request $request)
    {

        // dd($request->all());
        $data = $request->only(['username','password']);
        // dd($data['password']);
        // 检索数据库
        $info = DB::table('users')->where('username',$data['username'])->first();
        // dd($info);

        // 检测用户名是为空
        if(empty($info)){
            return back()->with('info','用户名不存在!!!');
        }
        // 提取权限信息
        // 权限
        $auth = $info->auth;
        // 激活状态
        $status = $info->status;

        // 判断是否有权限
        if($status==1){
            // 检测密码是否正确
            if(Hash::check($data['password'], $info->password)){
                // 提醒
                session(['hid'=>$info->id]);
                // 跳转到个人中心
                return redirect('/user');
            }else{
                // return back()->with('info','密码错误');
                echo "您的密码错误";
            }
        }else{
            // return back()->with('info','您的账户未激活');
            echo "您的账户未激活";
        }
    }

    /**
     *  退出登录
     */
    public function logout(Request $request)
    {
      //移出session
      $request->session()->forget('hid');
      //跳转页面
      return redirect('/user');
    }


    /**
     * 找回密码页面
     */
     public function forget()
     {
        return view('home.forget');
     }

     /**
      * 发送找回密码邮件
      */
     public function doforget(Request $request)
     {
        // dd($request->all());
        $user = DB::table('users')->where('username',$request->input('username'))->first();
        // 检测用户名是否正确
        if(empty($user)){
            echo "用户名不存在";
        }else{
          // 检测账号与邮箱是否匹配
          if($request->input('email')==$user->email){
                /**
                 * 邮件发送
                 * 第一个参数:模板路径,第二个参数:变量分配,第三个参数:发送请求的细节:给谁发等等..
                 */
                Mail::send('emails.forget', ['user' => $user], function ($m) use ($user) {
                    // 第一个:收件人邮箱地址  第二个:收件人名称 第三个:邮件标题
                   $m->to($user->email, $user->username)->subject('腾讯课堂密码找回邮件!');
               });
            }else{
                echo "账户与邮箱不匹配!";
            }
        }
     }

     /**
      * 显示重置密码页
      */
     public function reset(Request $request)
     {
        // dd($request->all());
        // 检测是否id和token是否有效
        $res = DB::table('users')->where('id',$request->input('id'))->first();
        // 检测用户是否存在
        if(empty($res)){
            echo "参数有误!";
        }else{
            if($res->token == $request->input('token')){
                // 参数正确就显示表单,修改密码
                  return view('home.reset',['user'=>$res]);
            }else{
                return redirect('/');
            }
        }

     }

     /**
      * 重置密码操作
      */
     public function doreset(Request $request)
     {
        // dd($request->all());
        $data = [];
        // 判断密码是否一致
        if($request->password == $request->repassword){
            $data['password'] = Hash::make($request->input('password'));
            // 更新密码
            $res = DB::table('users')->where('id',$request->input('id'))->update($data);
            if($res){
                return redirect('/')->with('info','密码重置成功!');
            }else{
                return redirect('/')->with('info','密码重置失败!');
            }
        }
     }


}
