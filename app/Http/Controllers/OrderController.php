<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;

class OrderController extends Controller
{
    /**
     * 订单创建
     */
    public function add(Request $request)
    {
        // dd($request->all());
        // 插入数据库
        $data = [];
        // 订单编号
        $data['orders'] = time().rand(10000,99999);
        // 创建订单时间
        $data['create_at'] = time();
        $data['status'] = 0;
        $data['user_id'] = session('hid');
        // 获取订单ID
        $order_id = DB::table('orders')->insertGetId($data);
        // 检测
        if($order_id){
            $res = [];
            foreach ($request->input('data') as $k => $v) {
              $tmp = [];
              $tmp['goods_id'] = $v['id'];
              $tmp['num'] = $v['num'];
              $tmp['order_id'] = $order_id;
              $res[] = $tmp;
            }
            $result = DB::table('order_goods')->insert($res);
            if($result){
              // 创建订单成功后跳转订单确认页
                return redirect('/order/confirm?id='.$order_id);
            }else{
                return back()->with('info','创建订单失败!!');
            }
        }
    }

    /**
     * 订单确认
     */
    public function confirm(Request $request)
    {
        // 读取购物车信息
        $carts = Session::get('cart');
        // dd($carts);
        // 遍历购物车信息获取商品信息
        if($carts){
            foreach ($carts as $key => $value) {
                $carts[$key]['goods'] = DB::table('goods')->where('id',$value['id'])->first();
                $carts[$key]['pic'] = DB::table('images')->where('goods_id',$value['id'])->value('path');
            }
        }else{
            $carts = [];
        }

        $id = $request->input('id');
        // 读取订单信息
        $res = DB::table('orders')->where('id',$id)->first();
        // 收货地址获取
        $address = AddressController::getAddressByHid(session('hid'));

        // dd($address);
        // dd($address);
        return view('home.order.confirm',['address'=>$address,'request'=>$request,'carts'=>$carts]);
    }

    /**
     * 提交付款
     */
    public function doconfirm(Request $request)
    {
      // 表单验证
      // dd($request->all());
      $data = $request->only(['pay_type','address_id','price']);
      // dd($data);
      // dd($data);
      $res = DB::table('orders')->where('id',$request->input('order_id'))->update($data);
      // 获取订单总价
      $zongjia = $request->input('price');
      // 获取订单编号
      $orders = DB::table('orders')->where('id',$request->input('order_id'))->value('orders');
      // dd($orders);
      if($res){
          // 清空购物车信息
           Session::forget('cart');
          // 跳转第三方支付平台进行支付
          return redirect('http://pay.xiaohigh.com/api/deal?to=432006@qq.com&money='.$zongjia.'&order_id='.$orders.'&info=腾讯课堂商品购买&return_url=http://www.160.com/success');
      }else{
          return back()->with('info','订单有误!!!');
      }
    }

    public function success(Request $request)
    {
        // dd($request->all());
        // 验证
        $data['status'] = $request->input('status');
        $res = DB::table('orders')->where('orders',$request->input('order_id'))->first();

        if($data['status'] ==00 && $res){
            $data['status'] = 1;
            $result = DB::table('orders')->where('orders',$request->input('order_id'))->update($data);
            if($result){
                return view('home.order.success');
            }else{
                echo "订单已经处理成功!请勿重复提交!";
            }
        }else{
            echo "失败!";
        }

        // dd($res);
    }
}
