<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CateController extends Controller
{

    /**
     * 分类添加
     */
    public function getAdd()
    {
        //读取分类信息
        $cates = self::getAllCates();
        //显示html表单
        return view('admin.cate.add', ['cates'=>$cates]);
    }

    /**
     * 数据插入(分类信息)
     */
    public function postInsert(Request $request)
    {
      // 表单验证
      // 获取数据
      $data = $request->except(['_token']);

      // 顶级分类
      if($data['pid'] == '0'){
          $data['path'] = '0';
      }else{
          // 读取父级分类信息
          $p = DB::table('cates')->where('id','=',$data['pid'])->first();
          $data['path'] = $p->path.','.$p->id;
      }
      // 写入数据库
      $res = DB::table('cates')->insert($data);
      if($res) {
          return redirect('/admin/cate/list')->with('info','添加成功');
      }else{
          return back()->with('info','添加失败');
      }
    }

    /**
     * 分类列表显示
     */
    public function getList(Request $request)
    {
      // 读取
      $cates = DB::table('cates')
          ->select(DB::raw('*, concat(path,",",id) as paths'))//raw 原生的意思
          ->orderBy('paths')
          ->get();
      //  遍历
      foreach($cates as $key => $value){
        // 检测当前的分类等级
        $data = explode(',',$value->path);
        // 统计
        $total = count($data)-1;
        // 添加路径分割 |-----
        $value->name = str_repeat('|-----',$total).$value->name;
      }
      return view('admin.cate.list', ['cates'=>$cates,'request'=>$request]);
    }

    /**
     * 分类编辑
     */
    public function getEdit(Request $request)
    {
        // 读取数据
        $id = $request->input('id');
        // 读取数据库
        $cate = DB::table('cates')->where('id','=',$id)->first();
        // 读取所有的分类信息
        $cates = DB::table('cates')->get();
        // 返回数据
        return view('admin.cate.edit',['cate'=>$cate,'cates'=>$cates]);
    }

    /**
     * 分类更新
     */
    public function postUpdate(Request $request)
    {
      //  验证
      // 提取数据
      $data = $request->except(['_token','id']);
      if($data['pid']=='0'){
          $data['path']='0';
      }else{
          // 读取父级分类信息
          $p = DB::table('cates')->where('id','=',$data['pid'])->first();
            $data['path'] = $p->path.','.$p->id;
      }

      // 更新
      $res = DB::table('cates')->where('id',$request->input('id'))->update($data);
      if($res) {
          return redirect('/admin/cate/list')->with('info','更新成功');
      }else{
          return back()->with('info','更新失败');
      }
    }

    /**
     * 删除
     */
    public function getDelete(Request $request)
    {
        // 获取id
        $id = $request->input('id');
        // 读取
        $info = DB::table('cates')->where('id',$id)->first();
        // 拼接path
        $path = $info->path.','.$info->id;
        // 删除
        $res = DB::table('cates')->where('id',$id)->orWhere('path','like',$path.'%')->delete();
        if($res) {
            return redirect('/admin/cate/list')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }

    /**
     * 按照格式获取分类信息|-----
     */
    public static function getAllCates()
    {
        // 读取
        $cates = DB::table('cates')
            ->select(DB::raw('*, concat(path,",",id) as paths'))//raw 原生的意思
            ->orderBy('paths')
            ->get();
        //  遍历
        foreach($cates as $key => $value){
          // 检测当前的分类等级
          $data = explode(',',$value->path);
          // 统计
          $total = count($data)-1;
          // 添加路径分割 |-----
          $value->name = str_repeat('|-----',$total).$value->name;
        }

      return $cates;
    }

    /**
     * 递归读取分类信息
     */
    // public static function getCates($pid)
    // {
    //     $cates = DB::table('cates')->where('pid',$pid)->get();
    //     // 遍历子分类
    //     $arr = [];
    //     foreach ($cates as $key => $value) {
    //         $value->subcates = self::getCates($value->id);
    //         $arr[] = $value;
    //     }
    //     return $arr;
    // }

}
