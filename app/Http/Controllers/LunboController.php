<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class LunboController extends Controller
{
    /**
     *
     */
    public function getAdd()
    {
      // 显示表单
        return view('admin.lunbo.add');
    }

    /**
     * 添加轮播
     */
    public function postInsert(Request $request)
    {
          // $data = $request->all();
          $data = $request->except('_token');//获取其余参数
          // 文件上传
          if($request->hasFile('image')){
              $data['image'] = $this->upload($request);
          }

          $res = DB::table('lunbo')->insert($data);
          if($res){
              return redirect('/admin/lunbo/list')->with('info','添加成功');
          }else{
              return back()->with('info','添加失败');
          }
    }

    /**
     * 轮播列表
     */
     /**
      * 用户列表显示
      */
     public function getList()
     {
      $lunbo = DB::table('lunbo')->get();
      // dd($lunbo);
       return view('admin.lunbo.list',['lunbo'=>$lunbo]);
     }


    /**
     * 文件上传操作
     */
    public function upload($request)
    {
        if($request->hasFile('image')){
            // 拼接文件名称
            $fileName = time().rand(1000000,9999999);
            // 获取文件后缀名
            $suffix = $request->file('image')->getClientOriginalExtension();
            // 文件夹的规则
            $dir = './uploads/'.date('Ymd');
            $request->file('image')->move($dir,$fileName.'.'.$suffix);
            // 拼接路径
            $data['image'] = trim($dir.'/'.$fileName.'.'.$suffix,'.');
            return $data['image'];
        }
        return null;
    }

    /**
     * 轮播修改操作
     */
    public function getEdit(Request $request)
    {
        // 读取数据
        $id = $request->input('id');
        // 读取数据库
        $lunbo = DB::table('lunbo')->where('id','=',$id)->first();

        // 返回数据
        return view('admin.lunbo.edit',['lunbo'=>$lunbo]);
        // dd($user);
    }

    /**
     * 轮播更新动作
     */
    public function postUpdate(Request $request)
    {
        // 验证
        // 提取数据
        $data = $request->except(['_token']);
        // dd($data);
        //处理图片
        if($request->hasFile('image')) {
            $data['image'] = $this->upload($request);
        }
        // 更新
        $res = DB::table('lunbo')->where('id',$request->input('id'))->update($data);
        // 检测
        if($res) {
            return redirect('/admin/lunbo/list')->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }

    }

    /**
     * 轮播删除
     */
     public function getDelete(Request $request)
     {
        // 获取id
        $id = $request->input('id');
        // dd($id);
        // 读取
        $info = DB::table('lunbo')->where('id',$id)->first();
        // dd($info);
        // 删除头像
        @unlink('.'.$info->image);

        // 删除信息
        $res = DB::table('lunbo')->where('id',$id)->delete();
        // 检测
        if($res) {
            return redirect('/admin/lunbo/list')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
     }


}
