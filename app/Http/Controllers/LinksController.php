<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class LinksController extends Controller
{
    //添加友情链接
    public function getAdd()
    {
        return view('admin.links.add');
    }

    // 插入友情链接
    public function postInsert(Request $request)
    {
      // 表单验证

      // 处理数据
      // $data = $request->all();
      $data = $request->except('_token');
      // 插入
      $res = DB::table('friendlink')->insert($data);
      if($res){
          return redirect('/admin/links/list')->with('info','添加成功');
      }else{
          return back()->with('info','添加失败');
      }
    }

    // 友情链接列表显示
    public function getList()
    {
      $links = DB::table('friendlink')->get();
      // dd($links);
      return view('admin.links.list',['links'=>$links]);
    }

    // 编辑友情链接
    public function getEdit(Request $rqeust)
    {
        $id=$rqeust->input('id');
        $links = DB::table('friendlink')->where('id',$id)->first();
        // dd($links);
        return view('admin.links.edit',['links'=>$links]);
    }

    // 更新友情链接
    public function postUpdate(Request $request)
    {
        $data = $request->except(['_token','id']);
        // 更新
        $res = DB::table('friendlink')->where('id',$request->input('id'))->update($data);
        // 检测
        if($res) {
            return redirect('/admin/links/list')->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }
    }

    // 删除友情链接
    public function getDelete(Request $request)
    {
        $id=$request->input('id');
        $res = DB::table('friendlink')->where('id',$id)->delete();
        if($res) {
            return redirect('/admin/links/list')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }

}
