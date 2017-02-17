<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ListController extends Controller
{

    public function list(Request $request)
    {
      // dd($request->input('id'));
      // 接收分类ID
    	$id=$request->input('id');

    	//商品详情
    	$res=DB::table('goods')->where('cate_id',$id)->get();
      //
    	foreach($res as $k=>$v){
    		$res[$k]->path=DB::table('images')->where('goods_id',$v->id)->value('path');
    	}
    	// dd($res);
    	return view('home.list',['res'=>$res]);
    }

}
