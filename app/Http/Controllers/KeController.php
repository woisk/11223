<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class KeController extends Controller
{
    //
    public function index()
    {
        set_time_limit(0);
        // $this->detail('http://www.8sk.cn/tpl/txkt/site/products/id/59');

        for($i=1;$i<=6;$i++){
          $url = 'http://www.8sk.cn/tpl/txkt/site/pro_list/cat/'.$i;
          $this->list($url);
        }
    }

    /**
     * 采集列表  获取详情页的链接
     */
    public function list($url)
    {
        // 列表页
        // $url = 'http://www.8sk.cn/tpl/txkt/site/pro_list/cat/1';
        $code = $this->getCode($url);
        preg_match_all('/<a href="(.*?)" target\=\"\_blank" class=\"item\-img-link\">/',$code,$lists);
        $urls = [];
        foreach ($lists[1] as $key => $value) {
          $urls =  "http://www.8sk.cn".$value;
          $this->detail($urls);
        }
    }

    /**
     * 采集详情页
     */
    public function detail($url)
    {
      $path = [];
      $result = [];
      // 使用CURL来获取代码
       $code = $this->getCode($url);
      // dd($code);

      //  课程标题
       preg_match('/<h1 class="mod-course-banner__title" title="(.*)">(.*)<\/h1>/isU',$code,$title);

      //  图
      preg_match('/<img src="(.*)"/isU',$code,$pics);

      $path['title'] = $title[1];
      $path['kucun'] = rand(1,100);
      $path['price'] = rand(100,10000);
      $path['detail'] = '这里是课程内容介绍';
      $path['cate_id'] = 26;
      $id = DB::table('goods')->insertGetId($path);
      $result['goods_id'] = $id;
      $result['path'] = "http://www.8sk.cn".$pics[1];
      $res = DB::table('images')->insert($result);
      if($res){
        echo "插入成功!";
      }else{
        echo "插入失败!";
      }

    }

    /**
     * 用CURL获取目标源码
     */
    public function getCode($url)
    {
      // CURL扩展
      // 1.初始化
      $ch = curl_init($url);
      // 2.对结果设置,设置请求详情
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);// 只要服务器返回结果
      // 3.模拟请求头信息
      // curl_setopt($ch,CURLOPT_HTTPHEADER,[
      //   'referer: https://ke.qq.com/',
      //   'upgrade-insecure-requests: 1',
      //   'user-agent:Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2547.0 Safari/537.36',
      // ]);
      // curl_setopt($ch,CURLOPT_SSL_VERIFYPEER ,false);
      //  4. 请求超时时间设置
      curl_setopt($ch,CURLOPT_TIMEOUT,10);
      // 5.发送请求
      $res = curl_exec($ch);
      return $res;
    }
}
