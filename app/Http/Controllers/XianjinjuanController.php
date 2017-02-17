<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
class XianjinjuanController extends Controller
{
      public function index()
      {
        $id = session('hid');
        $kajuan = DB::table('kajuan')->where('user_id',$id)->get();
        return view('home.xianjinjuan',['kajuan'=>$kajuan]);
      }

      public function duihuan(Request $request)
      {
        // dd($request->all());
        // 接收现金劵的ID
        $id = $request->input('id');
        // 获取当前操作人的ID
        $user_id = session('hid');
        // 改变代金券状态
        $data['status'] = 1;
        $res = DB::table('kajuan')->where('id',$id)->update($data);

        if($res){
          // 取出原来金额
          $money = DB::table('money')->where('user_id',$user_id)->value('money');
          // 取出面值
          $mianzhi = DB::table('kajuan')->where('id',$id)->value('mianzhi');
          // 求出新余额
          $money += $mianzhi;
          $datas['money'] = $money;
          // dd($user_id);

          // 修改
          $res = DB::table('money')->where('user_id',$user_id)->update($datas);

          // 如果余额修改成功的话创建交易记录
          if($res){
            // 准备插入
            $data['nums'] = $mianzhi;
            $data['time'] = time();
            $data['pay_type'] = '现金劵';
            $data['user_id'] = $user_id;
            $data['status'] = 1;
            $data['orders'] = time().rand(10000,99999);
            $res = DB::table('online_recharge')->insert($data);
            if($res){
              return redirect('/user/xianjinjuan')->with('info','兑换成功!');
            }else{
                echo "兑换失败";
            }



          }
        }else{
            return redirect('/user/xianjinjuan')->with('info','兑换失败!');
        }
      }


}
