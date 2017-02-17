<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class ArticleController extends Controller
{
    /**
     * 添加公告
     */
    public function getAdd()
    {

      // 显示表单
        return view('admin.article.add');
    }

    /**
     * 数据插入
     */
    public function postInsert(Request $request)
    {
      // 表单验证

      // 处理数据
      // $data = $request->all();//获取全部参数
      $data = $request->except('_token');//获取其余参数
      $data['time'] = time();
      // dd($data);
      $res = DB::table('article')->insert($data);
      if($res){
          return redirect('/admin/article/list')->with('info','发布成功');
      }else{
          return back()->with('info','发布失败');
      }
    }

    /**
     * 公告列表显示
     */
    public function getList()
    {
      // 读取数据
      $article = DB::table('article')->get();

      return view('admin.article.list',['article'=>$article]);
    }

    /**
     * 公告编辑操作
     */
    public function getEdit(Request $request)
    {
        // 读取数据
        $id = $request->input('id');
        // 读取数据库
        $article = DB::table('article')->where('id','=',$id)->first();
        // dd($article);
        // 返回数据
        return view('admin.article.edit',['article'=>$article]);
        // dd($user);
    }

    /**
     * 公告更新
     */
    public function postUpdate(Request $request)
    {
        // 验证
        // 提取数据
        $data = $request->except(['_token']);
        $data['time'] = time();
        // 更新
        $res = DB::table('article')->where('id',$request->input('id'))->update($data);
        // 检测
        if($res) {
            return redirect('/admin/article/list')->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }

    }

    /**
     * 公告删除
     */
     public function getDelete(Request $request)
     {
        // 获取id
        $id = $request->input('id');
        // 读取
        $info = DB::table('article')->where('id',$id)->first();
        // dd($info);

        // 删除信息
        $res = DB::table('article')->where('id',$id)->delete();
        // 检测
        if($res) {
            return redirect('/admin/article/list')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
     }
}
