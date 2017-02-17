<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class OnlineRechargeController extends Controller
{
     /**
      * 充值主页
      */
    public function index()
    {
      return view('home.user.online_recharge');
    }

    /**
     * 执行充值
     */
    public function chongzhi(Request $request)
    {
        // $data = $request->only(['payment_id','recharge']);//充值方式  充值金额
        $data['nums'] = $request->input('recharge');
        $data['pay_type'] = $request->input('payment_id');
        $data['time'] = time(); //  充值时间
        $data['orders'] = time().rand(10000,99999); // 充值订单号
        $data['user_id'] = session('hid');

        $res = DB::table('online_recharge')->insert($data);
        // dd($res);
        if($res){
            // 跳转第三方支付平台进行支付
            return redirect('http://pay.xiaohigh.com/api/deal?to=432006@qq.com&money='.$data['nums'].'&order_id='.$data['orders'].'&info=腾讯课堂现金充值&return_url=http://www.160.com/user/online_recharge/success');
        }else{
            return back()->with('info','订单有误!!!');
        }

    }

    public function success(Request $request)
    {
        $data['status'] = $request->input('status');
        $res = DB::table('online_recharge')->where('orders',$request->input('order_id'))->first();
        // 判断返回的状态
        if($data['status'] ==00 && $res){
            $data['status'] = 1;

          $result = DB::table('online_recharge')->where('orders',$request->input('order_id'))->update($data);

          if($result){
              // 查看充值了多少钱
              $data['money'] = DB::table('online_recharge')->where('orders',$request->input('order_id'))->value('nums');
              // dd($data);
              // 取出充值用户的ID
              $userid = DB::table('online_recharge')->where('orders',$request->input('order_id'))->value('user_id');
              // 取出用户原来的金额
              $yuanmoney = DB::table('money')->where('user_id',$userid)->value('money');
              // 取出原来用户的积分
              $yuanjifen = DB::table('money')->where('user_id',$userid)->value('jifen');

              $money['money'] = $data['money']+$yuanmoney;
              $money['jifen'] = $data['money']+$yuanjifen;
              // dd($money);
              // $data['money']
              // 修改充值人的余额和积分
            $res =  DB::table('money')->where('user_id',$userid)->update($money);
            if($res){
                echo "OK";
            }else{
                echo "no";
            }
          }
            /**
             *   这里写充值代码  修改默认的金额
             */
            if($result){
                return view('home.order.success');
            }else{
                echo "订单已经处理成功!请勿重复提交!";
            }
        }else{
            echo "失败!";
        }
    }
}
