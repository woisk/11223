<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
class CartController extends Controller
{
    public function add(Request $request)
    {
        // dd($request->all());
        // 检测商品是否已经存在购物车中
        $res = $this->checkCartGoodsExists($request->input('id'));
        if(!$res){
            // 如果商品不存在购物车中的话,
            // 将信息写入session
            Session::push('cart',$request->except(['_token']));
         }else{
            // 如果已经存在的话,num数量+1
             $nums = $request->session()->get('cart');
             foreach ($nums as $k => $v) {
                if($v['id'] == $request->id) {
                  $nums[$k]['num'] += 1;
                }
             }
             $request->session()->forget('cart');
             $request->session()->put('cart', $nums);
        }
        return redirect('/cart')->with('info','加购成功');
    }

    /**
     * 购物车列表显示
     */
    public function index()
    {
      //  Session::forget('cart.1');
        // $this->flush();
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

        // dd($carts);
        return view('home.cart',['carts'=>$carts]);
    }

    /**
     * 商品删除
     */
     public function del(Request $request)
     {
        $carts = Session::get('cart');
        // dd($carts);
        foreach ($carts as $k => $v) {
          if($v['id']==$request->input('goodsid')){
              Session::forget('cart.'.$k);
              return back()->with('success','操作成功');
          }else{
            echo "不存在的商品";
          }
        }
        // dd($request->all());
     }

     /**
      * 清空购物车
      */
      public function delModel()
      {
        // 清空全部session
        Session::forget('cart');
        return back()->with('success','操作成功');
      }


    /**
     * 检测商品是否在该用户的购物车中
     */
    public function checkCartGoodsExists($goods_id)
    {
        // 获取所有购物车信息
        $carts = Session::get('cart');
        // 检测
        if(!empty($carts)){
          foreach ($carts as $key => $value) {
              if($value['id'] == $goods_id){
                  return true;
              }
          }
          return false;
        }
        return false;
    }

    /**
     * 清除session  使用后请删除调用$this->flush();
     */
    public function flush()
    {
        Session::flush();
    }
}
