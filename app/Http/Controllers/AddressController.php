<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class AddressController extends Controller
{
      /**
       * 地址添加
       */
      public function add()
      {
        // 遍历地址信息
        $address = AddressController::getAddressByHid(session('hid'));
        // dd($address);
        return view('home.user.address',['address'=>$address]);
      }

      /**
       * 编辑
       */
       public function edit(Request $request)
       {
        //  dd($request->all());
        $data = DB::table('address')->where('id',$request->input('id'))->first();
        // dd($data);
         $address = AddressController::getAddressByHid(session('hid'));

         return view('home.user.address',['address'=>$address,'data'=>$data]);
       }


       /**
        * 执行修改
        */
        public function update(Request $request)
        {
          $data = DB::table('address')->where('id',$request->input('id'))->first();
          $address = AddressController::getAddressByHid(session('hid'));

          $update = $request->except(['_token']);
          // dd($update);
          $res = DB::table('address')->where('id',$update['id'])->update($update);
          if($res){
            return redirect('/user/address');
          }else{
            echo "修改失败";
          }
        }

        /**
         * 删除地址
         */
        public function del(Request $request)
        {
            $id = $request->input('id');
            // dd($id);
            $res = DB::table('address')->where('id',$id)->delete();
            if($res){
              return redirect('/user/address');
            }else{
              echo "删除失败";
            }

        }



    /**
     *ajax获取地址信息
     */
     public function get(Request $request)
     {
        // echo $request->input('pid');
        return response()->json(DB::table('areas')->orderBy('areaid','asc')->where('parentid',$request->input('pid'))->get());
     }

     public function insert(Request $request)
     {
        // dd($request->all());
        // 获取数据
        $data = $request->except(['_token']);
        $data['user_id'] = session('hid');
        // 执行插入
        $res = DB::table('address')->insert($data);
        // dd($res);
        if($res){
          return redirect('/user/address');
        }else{
            echo "地址添加失败!";
        }
     }
    //  封装收货地址
     public static function getAddressByHid($hid)
     {
        return DB::table('address')->where('user_id',$hid)->get();
     }


}
