<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CeshiController extends Controller
{
    // 入口执行文件
    public function index()
    {
      // 不限制脚本的最大运行时间
      	set_time_limit(0);
        // $this->list();
        // echo `cd ../ && php artisan down`;
    }
    /**
     * 采集列表页
     */
    public function list()
    {
        // $this->detail('http://www.8sk.cn/tpl/txkt/site/products/id/49');
        $url = 'http://www.8sk.cn/tpl/txkt/site/pro_list/cat/1';
        $code = file_get_contents($url);
        preg_match_all('/<a href="(.*)" target\=\"\_blank" class=\"item\-img-link\">/',$code,$links);

        foreach ($links[1] as $key => $value) {
            $data = "http://www.8sk.cn".$value;
            $this->detail($data);
        }

        // dd($data);
    }

    /**
     * 采集详情页
     */
    public function detail($url)
    {
        $tmp = [];
        $result = [];
        //
        // $url = 'http://www.8sk.cn/tpl/txkt/site/products/id/49';
        $code = file_get_contents($url);
        // 获取标题
        preg_match('/<h1 class="mod-course-banner__title" title="(.*)">(.*)<\/h1>/isU',$code,$title); // preg_match 匹配单个  preg_match_all 匹配所有
        // 获取图片
        preg_match('/<img src="(.*)"/isU',$code,$pics);

        $tmp['title'] = $title[1];
        $tmp['price'] = rand(100,999);
        $tmp['kucun'] = rand(1,100);
        $tmp['detail'] = '这里是内容哦!';
        $tmp['cate_id'] = 26;
        $id = DB::table('goods')->insertGetId($tmp);

        // 商品的ID
        $result['goods_id'] = $id;
        // 商品下的图
        $result['path'] = 'http://www.8sk.cn'.$pics[1];

        $res = DB::table('images')->insert($result);
        if($res){
            echo "插入成功!";
        }else{
            echo "插入失败";
        }


    }
}
