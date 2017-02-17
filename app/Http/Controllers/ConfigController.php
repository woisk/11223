<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class ConfigController extends Controller
{

    public function getList(Request $request)
    {
        $config = DB::table('config')->first();
        // dd($config);
        return view('admin.config.list',['config'=>$config]);
    }

    public function postInsert(Request $request)
    {
        $data = $request->except(['_token']);

        $res = DB::table('config')->update($data);
        if($res){
          return redirect('/admin/config/list')->with('info','更新成功!');
        }else{
          return redirect('/admin/config/list')->with('info','更新失败!');
        }
    }
    /**
     * seo
     */
    public function getSeo()
    {

      // dd($count);
      return view('admin.config.seo');
    }

}
