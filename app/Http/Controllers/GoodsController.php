<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class GoodsController extends Controller
{
    /**
     * 商品添加
     */
    public function getAdd()
    {

      // // 读取分类信息
      // $cates = DB::table('cates')->get();
      // 读取静态变量中的列表显示方法
      $cates = CateController::getAllCates();
      // 显示表单
        return view('admin.goods.add',['cates'=>$cates]);
    }

    /**
     * 数据插入
     */
    public function postInsert(Request $request)
    {
      // 表单验证

      // 处理数据
      // $data = $request->all();//获取全部参数
      $data = $request->except('_token','path');//获取其余参数
      $id = DB::table('goods')->insertGetId($data);

      // 文件上传
      $result = [];
      if($request->hasFile('path')){
          $files = $request->file('path');
          foreach ($files as $key => $value) {
            $tmp = [];
            // 拼接文件名称
            $fileName = time().rand(1000000,9999999);
            // 获取文件后缀名
            $suffix = $value->getClientOriginalExtension();
            // 文件夹的规则
            $dir = './uploads/'.date('Ymd');
            $value->move($dir,$fileName.'.'.$suffix);
            // 拼接路径
            $tmp['path'] = trim($dir.'/'.$fileName.'.'.$suffix,'.');
            $tmp['goods_id'] = $id;
            $result[] = $tmp;
          }
          $res = DB::table('images')->insert($result);
          if($res && $id){
              return redirect('/admin/goods/list')->with('info','添加成功');
          }else{
              return back()->with('info','添加失败');
          }
      }

      // 如果没有图片的话
      if($id){
          return redirect('/admin/goods/list')->with('info','添加成功');
      }else{
          return back()->with('info','添加失败');
      }

    }

    /**
     * 商品列表显示
     */
    public function getList(Request $request)
    {
      $keyword = $request->input('keyword');
      // dd($keyword);
      if(empty($keyword)){
        // 获取数据
        $goods = DB::table('goods')->where('recycle',0)->orderBy('id', 'desc')->paginate($request->input('num',10));
      }else{
         $goods = DB::table('goods')
          ->where('title','like','%'.$keyword.'%')
          ->orWhere('recycle',0)
          ->paginate($request->input('num',10));
      }
      // var_dump($goods);

      return view('admin.goods.list',['goods'=>$goods,'request'=>$request]);
    }

    /**
     * 文件上传操作
     */
    public function upload($request)
    {
        if($request->hasFile('profile')){
            // 拼接文件名称
            $fileName = time().rand(1000000,9999999);
            // 获取文件后缀名
            $suffix = $request->file('profile')->getClientOriginalExtension();
            // 文件夹的规则
            $dir = './uploads/'.date('Ymd');
            $request->file('profile')->move($dir,$fileName.'.'.$suffix);
            // 拼接路径
            $data['profile'] = trim($dir.'/'.$fileName.'.'.$suffix,'.');
            return $data['profile'];
        }
        return null;
    }

    /**
     * 商品修改操作
     */
    public function getEdit(Request $request)
    {
        // 读取数据
        $id = $request->input('id');
        // 读取数据库
        $goods = DB::table('goods')->where('id','=',$id)->first();
        // 返回数据
        return view('admin.goods.edit',['goods'=>$goods]);
        // dd($user);
    }

    /**
     * 商品更新动作
     */
    public function postUpdate(Request $request)
    {
        // 验证
        // 提取数据
        $data = $request->except(['_token', 'profile','id']);
        // dd($request->input('id'));
        //处理图片
        // if($request->hasFile('profile')) {
        //     $data['profile'] = $this->upload($request);
        // }
        // 更新
        $res = DB::table('goods')->where('id',$request->input('id'))->update($data);
        // 检测
        if($res) {
            return redirect('/admin/goods/list')->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }

    }

    /**
     * 商品删除
     */
     public function getDelete(Request $request)
     {
        // 获取id
        $id = $request->input('id');
        // 读取
        $info = DB::table('goods')->where('id',$id)->first();
        // dd($info);

        // 删除头像
        @unlink('.'.$info->profile);
        // 删除信息
        $res = DB::table('goods')->where('id',$id)->delete();
        // 检测
        if($res) {
            return redirect('/admin/goods/list')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
     }

     /**
      * 移入回收站
      */
    public function getRecycle(Request $request)
    {
        $id = $request->input('id');
        $res = DB::update('update goods set recycle = 1 where id = ?', [$id]);
        if($res){
            return redirect('/admin/goods/recyclelist')->with('info','移入回收站成功');
        }else{
            return back()->with('info','移除失败');
        }
    }

    /**
     * 回收站列表
     */
    public function getRecyclelist(Request $request)
    {
      $keyword = $request->input('keyword');
      // dd($keyword);
      if(empty($keyword)){
        // 获取数据
        $goods = DB::table('goods')->where('recycle',1)->paginate($request->input('num',10));
      }else{
         $goods = DB::table('goods')
          ->where('title','like','%'.$keyword.'%')
          ->orWhere('recycle',1)
          ->paginate($request->input('num',10));
      }

        return view('admin.goods.Recyclelist',['goods'=>$goods,'request'=>$request]);
    }

    /**
     * 移出回收站
     */
    public function getRecycleupdate(Request $request)
    {
        $id = $request->input('id');
        $res = DB::update('update goods set recycle = 0 where id = ?', [$id]);
        if($res){
            return redirect('/admin/goods/list')->with('info','移出回收站成功');
        }else{
            return back()->with('info','移出失败');
        }
    }

    public function favorite(Request $request)
    {
        // dd($request->all());
        // 获取收藏的当前时间
        $data['date'] = date("Y-m-d H:i:s",time());
        // 修改收藏的状态
        $data['favorite'] = 1;
        // 执行修改动作
        $res = DB::table('goods')->where('id',$request->input('id'))->update($data);
        // 判断是否修改(收藏)成功
        if($res){
             return redirect('/user/favorite')->with('info','收藏成功');
        }else{
             return back()->with('info','收藏失败');
        }
    }


     //收藏显示列表
    public function list(Request $request)
    {
        // $favorite = DB::table('goods')->where('favorite',1)->orderBy('id','desc')->get();
        $favorite = DB::table('goods')->where('favorite',1)->orderBy('id','desc')->get();
        // dd($res);
        return view('home.user.favorite',['favorite'=>$favorite]);
    }
    //取消收藏
    public function nofavorite(Request $request)
    {

         $res = DB::update('update goods set favorite = 0 where id = ?',[$request->input('id')]);
         // dd($res);
         if($res){
                return redirect('/user/favorite/list')->with('info','取消收藏成功');
           }else{
                return back()->with('info','取消收藏失败');
           }
    }


}
