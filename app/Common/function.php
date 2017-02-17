<?php
function getCateName($id)
{
  if($id == 0) {
    return '顶级分类';
  }

  //读取数据库
  $res = DB::table('cates')->where('id', $id)->first();

  return $res->name;

}

function getCates($pid)
{
    $cates = DB::table('cates')->where('pid',$pid)->get();
    // 遍历子分类
    $arr = [];
    foreach ($cates as $key => $value) {
        $value->subcates = getCates($value->id);
        $arr[] = $value;
    }
    return $arr;
}

// 获取城市名称
function getAreaName($id)
{
  return DB::table('areas')->where('areaid',$id)->value('areaname');
}
// 获取账户余额
function getMoney($id)
{
    return DB::table('money')->where('user_id',$id)->value('money');
}
// 获取个人积分
function getJifen($id)
{
    return DB::table('money')->where('user_id',$id)->value('jifen');
}

// 生成卡劵随机数
function getRandChar($length){
  $str = null;
  $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
  $max = strlen($strPol)-1;

  for($i=0;$i<$length;$i++){
   $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
  }

  return $str;
 }

 // 网站配置信息
 function getConfig()
 {
    return DB::table('config')->first();
 }

// 遍历分类下商品信息
function getFenlei($cateid)
{
      $goods =  DB::table('goods')
                ->where('goods.cate_id','=',$cateid)
                // ->join('images', 'goods.id', '=', 'images.goods_id')
                // ->select('goods.id', 'goods.title','goods.price','images.path')
                ->get();
              foreach($goods as $k=>$v){
                $data[$k]['goods_id'] = $v->id;
                $data[$k]['title'] = $v->title;
                $data[$k]['price'] = $v->price;
                $data[$k]['pic'] = DB::table('images')->where('goods_id',$v->id)->value('path');
              }
              return $data;
}

/**
 * 百度收录
 */
 function baidu($url){

   $baidu="http://www.baidu.com/s?wd=site:".$url;

   $site=file_get_contents($baidu);

   preg_match('/<b style="color:#333">(.*)<\/b>/',$site,$code);

   $count = $code[1];

   return $count;
 }

 //搜狗
	function sogou($url){

	$sogou="http://www.sogou.com/web?query=site:".$url;

	$site=file_get_contents($sogou);

	preg_match('/找到约 <em>(.*)<\/em> 条结果/',$site,$code);

	$count = $code[1];

	return $count;
	}

//360soso
	function a306($url){

		$a306 = "https://www.so.com/s?q=site:".$url;

		$site=file_get_contents($a306);

		preg_match('/<p class="ws-total">找到相关结果约(.*)个<\/p>/',$site,$code);

		$count = $code[1];

		return $count;
	}

  function yuming($url)
  {
      $yuming = "http://tool.chinaz.com/DomainDel/?wd=".$url;

      $site=file_get_contents($yuming);

      preg_match('/域名到期时间<\/div><div class="fr zTContrig"><span>(.*?)<\/span>/is',$site,$code);

      $count = $code[1];

  		return $count;
  }
 ?>
