<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class TopController extends Controller
{
    /**
     * 添加导航
     */
    public function getAdd()
    {
        return view('admin.top.add');
    }

    /**
     * 执行添加
     */
    public function postInsert(Request $request)
    {
      // 处理数据
      // $data = $request->all();
      $data = $request->except('_token');
      // dd($data);
      // 插入
      $res = DB::table('top')->insert($data);
      if($res){
          return redirect('/admin/top/list')->with('info','添加成功');
      }else{
          return back()->with('info','添加失败');
      }
    }

    /**
     * 导航列表显示
     */
   public function getList()
   {
     $top = DB::table('top')->get();
    //  dd($top);
     return view('admin.top.list',['top'=>$top]);
   }

   /**
    * 编辑导航
    */
    public function getEdit(Request $rqeust)
    {
        $id=$rqeust->input('id');
        // dd($id);
        $top = DB::table('top')->where('id',$id)->first();
        // dd($links);
        return view('admin.top.edit',['top'=>$top]);
    }

    /**
     * 更新导航
     */
   public function postUpdate(Request $request)
   {
       $data = $request->except(['_token']);
      //  dd($data);
       // 更新
       $res = DB::table('top')->where('id',$request->input('id'))->update($data);
       // 检测
       if($res) {
           return redirect('/admin/top/list')->with('info','更新成功');
       }else{
           return back()->with('info','更新失败');
       }
   }

   /**
    * 删除导航
    */
  public function getDelete(Request $request)
  {
      $id=$request->input('id');
      $res = DB::table('top')->where('id',$id)->delete();
      if($res) {
          return redirect('/admin/top/list')->with('info','删除成功');
      }else{
          return back()->with('info','删除失败');
      }
  }
}
