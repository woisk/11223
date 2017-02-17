<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class CourseController extends Controller
{
      //
      public function detail($id)
      {
          // 读取当前浏览历史信息
          $his = $this->getHistory();
          $arr = [];
          foreach ($his as $key => $value) {
            $tmp = DB::table('goods')->where('id',$value)->first();
            $tmp->img = DB::table('images')->where('goods_id',$value)->value('path');
            $arr[] = $tmp;
          }
          // dd($arr);

          // 将当前商品的ID写入到session中
          $this->writeHistory($id);

          // 读取商品详情
          $goods = DB::table('goods')->where('id',$id)->first();
          // 读取商品图片
          $images = DB::table('images')->where('goods_id',$id)->first();
          // dd($images);

          /**
           * 评论开始
           */
          //获取当前商品评论条数
         $count = DB::table('comment')->where('good_id',$id)->count();
         // 获取评论的信息
         $pinglun = DB::table('comment')
            ->join('users', 'users.id', '=', 'comment.user_id')
            ->where('good_id',$id)
            ->select('users.username', 'comment.*')
            ->get();
          return view('home.course.detail',['goods'=>$goods,'images'=>$images,'history'=>$arr,'count'=>$count,'pinglun'=>$pinglun]);
      }

      /**
       * 写入浏览历史
       */
      public function writeHistory($goods_id)
      {
          // 将浏览过的商品ID压入session
          \Session::push('history',$goods_id);
      }

    /**
     * 读取浏览历史
     */
     public function getHistory()
     {
        $history = \Session::get('history');
        if(!empty($history)){
          // array_slice 从数组从取出一段,下标为0开始  array_unique 数组去重复
          return array_slice(array_reverse(array_unique($history)),0,4);
        }else{
          return [];
        }

     }
}
