<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ArticlesController extends Controller
{
      //详情页
      public function detail($id)
      {
        // 获取公告信息
        $article = DB::table('article')->where('id',$id)->first();
        // dd($article);
          return view('home.article.detail',['article'=>$article]);
      }

      // 列表页
      public function list()
      {
          $article = DB::table('article')->get();
          // dd($article);
          return view('home.article.list',['article'=>$article]);
      }
}
