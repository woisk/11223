<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class KajuanController extends Controller
{
    /**
     * 卡劵添加
     */
    public function getAdd()
    {
       return view('admin.kajuan.add');
    }

    /**
     *执行卡劵添加
     */
    public function postDoadd(Request $request)
    {
        // 生成数量
        $num = $request->input('num');
        // 过期时间
        $data['guoqitime'] = $request->input('time');
        // dd($data['guoqitime']);
        // 判断过期时间
        if($data['guoqitime']==0){
            $data['guoqitime'] = time()+9999999999;
        }else if($data['guoqitime']==7){
            $data['guoqitime'] = time()+(7*24*3600);
        }else if($data['guoqitime']==30){
            $data['guoqitime'] = time()+(30*24*3600);
        }else if($data['guoqitime']==90){
            $data['guoqitime'] = time()+(90*24*3600);
        }else if($data['guoqitime']==180){
          $data['guoqitime'] = time()+(180*24*3600);
        }else{
            echo "操作异常!";
        }
        // 面值
        $data['mianzhi'] = $request->input('mianzhi');
        // 备注信息
        $data['beizhu'] = $request->input('beizhu');
        //生成卡号
        for($i=0;$i<$num;$i++){
          $count[] = '1'.getRandChar(29);
        }
        // dd($count);
        $tmp = [];
        foreach ($count as $k => $v) {
          // echo $v."<br>";
          $tmp[$k]['kajuanhao'] = $v;
          $tmp[$k]['shengchengtime'] = time();
          $tmp[$k]['mianzhi'] = $data['mianzhi'];
          $tmp[$k]['beizhu'] = $data['beizhu'];
          $tmp[$k]['guoqitime'] = time()+31536000;

        }
        $res = DB::table('kajuan')->insert($tmp);
        dd($res);
    }

    /**
     * 卡劵列表
     */
    public function getList()
    {
        $kajuan = DB::table('kajuan')->get();
        return view('admin.kajuan.list',['kajuan'=>$kajuan]);
    }

    /**
     * 删除操作
     */
     public function getDelete(Request $request)
     {
        // dd($request->all());
        $id = $request->input('id');
        $res = DB::table('kajuan')->where('id',$id)->delete();
        if($res){
          return redirect('/admin/kajuan/list')->with('info','销毁成功');
        }else{
          return redirect('/admin/kajuan/list')->with('info','销毁失败');
        }
     }

     /**
      * 修改操作
      */
      public function getUpdate(Request $request)
      {
          $kajuan = DB::table('kajuan')->where('id',$request->id)->first();
          // dd($kajuan);
          return view('admin.kajuan.edit',['kajuan'=>$kajuan]);
      }
    /**
     * 执行修改
     */
     public function postUpdate(Request $request)
     {
        // dd($request->all());
        // 发放给哪个用户
        $username = $request->input('username');
        // 发放哪张卡劵
        $kajuanid = $request->input('kajuanid');
        // dd($kajuanid);
        // 判断用户是否存在
        $res = DB::table('users')->where('username',$username)->first();
        // dd($res);
        if($res){
            $data['user_id'] = $res->id;
            $res = DB::table('kajuan')->where('id',$kajuanid)->update($data);
            if($res){
              return redirect('/admin/kajuan/list')->with('info','发放成功!可通知用户查收!');
            }else{
              return redirect('/admin/kajuan/list')->with('info','发放失败!');
            }

        }else{
            return redirect('/admin/kajuan/list')->with('info','操作失败!您输入的用户不存在!');
        }
     }
}
