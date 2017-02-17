<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
class CommentController extends Controller
{
    //后台评论列表
    public function lists(Request $request)
    {
       $keyword = $request->input('keyword');
          if(empty($keyword)){
        // 获取数据
        $comment = DB::table('comment')->paginate($request->input('num',10));
      }else{
         $comment = DB::table('comment')
          ->where('title','like','%'.$keyword.'%')
          ->paginate($request->input('num',10));
      }
        return view('admin.comment.list',['comment'=>$comment,'request'=>$request]);
    }

    //后台的删除评论
    public function deletes(Request $request)
    {
        $id = $request->input('id');
        // 读取
        $info = DB::table('comment')->where('id',$id)->first();
        // 删除信息
        $res = DB::table('comment')->where('id',$id)->delete();
        // 检测
        if($res) {
            return redirect('/admin/comment/lists')->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }

    public function comment(Request $request)
    {
      	//获取商品名称/评论的内容
          $data = $request->all();
      	//获取评论时间
      	$data['time'] = date("Y-m-d H:i:s",time());
      	//获取评论的人
      	$user_id=session('hid');
      	$data['user_id']=$user_id;
   		//插入数据库
   		$demo=DB::table('comment')->insert($data);
          //获取以评论
          $res=DB::table('comment')->get();
   		if($res){
   			 return back()->with('info','评论成功');
   		}
    }

    public function list(Request $request)
    {
        //获取我的评论
        $comment=DB::table('comment')->where('user_id',session('hid'))->get();
        return view('home.user.comment',['comment'=>$comment]);
    }

    public function delete(Request $request)
    {
        //获取评论id
        $id=$request->all();
       //删除该评论
        $res=DB::table('comment')->where('id',$id)->delete();
        if($res){
            return redirect('/user/comment/list')->with('info','删除成功');
        }
    }


}


?>
