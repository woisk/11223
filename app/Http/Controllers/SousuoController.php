<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class SousuoController extends Controller
{
    public function sousuo(Request $request)
    {
      // dd($request->all());
      //获取关键字
    	$word = $request->input('word');
        if(empty($word)) {
           return redirect('/')->with('info','未找到搜索条件');
        }else{
        	//获取商品的基本信息
            $goods = DB::table('goods')
                ->where('title','like','%'.$word.'%')
                ->orwhere('title',$word)
                ->paginate(10);
             //获取商品的图片
            //  dd($goods);
    		foreach($goods as $k=>$v){
    		    $goods[$k]->path=DB::table('images')->where('goods_id',$v->id)->value('path');
    		}
        // dd($goods);
    		//分类表
    		 $cate = DB::table('cates')
                ->where('pid',0)
                ->get();
        }

       return view('home.sousuo',['goods'=>$goods,'request'=>$request]);
    }
}
