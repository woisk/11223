<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>{{$goods->title}}_腾讯课堂</title>
  <link type="image/x-icon" href="favicon.ico" rel="icon">
  <link rel="stylesheet" href="/homes/css/index.css" />
  <link rel="stylesheet" href="/homes/css/common.css" />
  <link rel="stylesheet" href="/homes/css/shake.css" />

  <script type="text/javascript" charset="UTF-8" src="/homes/js/jquery-1.11.3.min.js"></script><script type="text/javascript" charset="UTF-8" src="/homes/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/homes/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" charset="UTF-8" src="/homes/js/form.js"></script>
  <script type="text/javascript" charset="UTF-8" src="/homes/js/validate.js"></script><link rel="stylesheet" type="text/css" href="/homes/css/style.css" />
  <script type="text/javascript" charset="UTF-8" src="/homes/js/artdialog.js"></script><script type="text/javascript" charset="UTF-8" src="/homes/js/iframetools.js"></script><link rel="stylesheet" type="text/css" href="/homes/css/default.css" />
  <script type="text/javascript" charset="UTF-8" src="/homes/js/arttemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/homes/js/arttemplate-plugin.js"></script>
  <script type='text/javascript' src="/homes/js/common.js"></script>
  <script type='text/javascript' src='/homes/js/site.js'></script>
    <link rel="stylesheet" href="/homes/css/red.css" />
  <script type="text/javascript" src="/homes/js/jquery.sonline.js"></script>
  <style media="screen">
      button.btn_cart {
      width: 138px;
      height: 50px;
      display: block;
      float: left;
      text-align: center;
      margin-right: 10px;
      border-radius: 2px;
      font-size: 16px;
      line-height: 50px;
      background-color: #188EEE;
      color: #fff;
    }

    .tijiao {
      width: 138px;
      height: 50px;
      display: block;
      float: right;
      text-align: center;
      margin-right: 10px;
      border-radius: 2px;
      font-size: 16px;
      line-height: 50px;
      background-color: #188EEE;
      color: #fff;
      margin-top:10px;
    }
  </style>
<meta name='keywords' content=''>
<meta name='description' content=''></head>
<body>
<div class="mod-header__wrap js-unknown-role" id="js_main_nav">
  <!-- 百度编辑器 -->
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/lang/zh-cn/zh-cn.js"></script>
  <div class="mod-header clearfix">
    <?php
        $sessionid = session('hid');
        $sessionid = DB::table('users')->where('id',$sessionid)->first();
        // dd($sessionid);
     ?>
     @if(!$sessionid)
 n   <div id="js-mod-header-login" class="mod-header__wrap-login">
    <a href="/login" class="mod-header__link-login js-login-op" id="js_login">登录</a>
    <a href="/register" class="mod-header__link-login js-login-op" id="js_login">注册</a>
    <a id="js-help" href="/" class="mod-header__link-help">帮助</a>
    </div>
    @else
    <div id="js-mod-header-login" class="mod-header__wrap-login mod-header__wrap-logined">
              <div class="mod-header_wrap-user" id="js_logout_outer">
    <i class="icon-red-circle" style="display:none;"></i>
                      <img src="{{$sessionid->profile}}" class="mod-header__user-img js-avatar" width="30" height="30" onerror="this.src='{{$sessionid->profile}}'">
            <p class="mod-header__user-name">
                <a href="/tpl/txkt/ucenter/index" class="mod-header__user-operation">个人中心<i class="icon-select-down"></i></a>
            </p>
            <ul class="mod-header__user-operations">
              <li><a href="/tpl/txkt/ucenter/info" class="mod-header__user-operation js-live-course">个人信息</a></li>
              <li><a href="/tpl/txkt/ucenter/order" class="mod-header__user-operation js-video">我的课程</a></li>
                <li><a href="/tpl/txkt/ucenter/redpacket" class="mod-header__user-operation js-coupon">优惠券</a></li>
                <li><a href="/tpl/txkt/ucenter/evaluation" class="mod-header__user-operation js-signup">我的评价</a></li>
                <li><a href="/tpl/txkt/ucenter/favorite" class="mod-header__user-operation js-fav">收藏</a></li>
                <li><a href="/tpl/txkt/simple/logout" class="js_logout mod-header__link-logout js-login-op">退出</a></li>
            </ul>
      </div>
                    <a id="js-help" href="/tpl/txkt/site/help_list" class="mod-header__link-help">帮助</a>
    </div>
    @endif
      <h1 class="mod-header-logo"><a href="/" title="腾讯课堂" class="mod-header__link-logo"></a></h1>
      <div class="mod-header__wrap-search" id="js-searchbox">
          <div class="mod-search">

                <!--自动完成div 开始-->
        <ul class="auto_list" style='display:none'></ul>
            </div>
          <div class="mod-search-word-list">
            <a href="/tpl/txkt/site/search_list/word/%E4%BC%9A%E8%AE%A1%E5%9F%BA%E7%A1%80%E5%AD%A6%E4%B9%A0" class="mod-search-word mod-search-word-hot" target="_blank">会计基础学习</a>
              <a href="/tpl/txkt/site/search_list/word/%E6%96%B0%E6%A6%82%E5%BF%B5%E8%AF%BE%E6%96%87" class="mod-search-word mod-search-word-hot" target="_blank">新概念课文</a>
          </div>
      </div>
  </div>
</div>


<script type="text/javascript" charset="UTF-8" src="/homes/js/arttemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/homes/js/arttemplate-plugin.js"></script>
<script type="text/javascript" charset="UTF-8" src="/homes/js/jquery.cookie.js"></script>

<link rel="stylesheet" type="text/css" href="/homes/css/jquery.jqzoom.css" />
<script type="text/javascript" src="/homes/js/jquery.jqzoom-core-pack.js"></script>
<link rel="stylesheet" type="text/css" href="/homes/css/jquery.bxslider.css" />
<script type="text/javascript" src="/homes/js/jquery.bxslider.min.js"></script>

<style type="text/css">
.position { width:960px; }
#js_main_nav,.wrap-banner { display:none; }
.mod-header__wrap { padding-top:0px; }
</style>
<div class="mod-header__wrap" data-mod="960">
    <div class="mod-header mod-header_inner mod-header_inner-1200 clearfix">
        <div id="js-mod-header-login" class="mod-header__wrap-login mod-header__wrap-logined">
                      <a href="/login" class="mod-header__link-help" id="js_login">登录</a>
            <a href="/register" class="mod-header__link-help" id="js_login">注册</a>
                        <a id="js-help" href="/" class="mod-header__link-help">帮助</a>
        </div>
        <h1 class="mod-header-logo">
            <a href="/" title="腾讯课堂" class="mod-header__link-logo"></a>
        </h1>
        <ul class="mod-header__nav" id="js-mod-header-nav">
          <!-- TOP导航 -->
            <?php $top = DB::table('top')->get();?>
             @foreach($top as $k=>$v)
             <li class="mod-header__nav-item"><a href="{{$v->link}}" class="wrap-activity-item">{{$v->name}}</a></li>
             @endforeach
        </ul>
        <div class="mod-header__wrap-search" id="js-searchbox">
          <div class="mod-search">
        <form method='get' action='/s'>
              <input type='hidden' name='controller' value='site' />
              <input type='hidden' name='action' value='search_list' />
              <input class="mod-search__input" maxlength="38" type="text" name='word' autocomplete="off" value="输入关键字..." />
              <input class="mod-search__btn-search x-search" type="submit" value="" onclick="checkInput('word','输入关键字...');" />
        </form>
                <!--自动完成div 开始-->
        <ul class="auto_list" style='display:none'></ul>
            </div>
        </div>
    </div>
</div>


<div class="course-banner-wrap">
    <div class="position"><span>您当前的位置：</span><a href="/">首页</a><span class="mod-breadcrumbs__arrow"> > </span><a href="/tpl/txkt/site/pro_list/cat/1">IT培训</a><span class="mod-breadcrumbs__arrow"> > </span>{{$goods->title}}</div>

  <div class="mod-course-banner clearfix" id="js_mod_course_banner">
    <div class="mod-course-banner__img-wrap">
            <a href="javascript:void(0);" rel="{gallery:'goodsPhoto',smallimage:'/tpl/txkt/runtime/_thumb/upload/2015/08/03/440_248_20150803172251799.jpg',largeimage:'/tpl/txkt/upload/2015/08/03/20150803172251799.jpg'}">
              <img src="{{$images->path}}" width="440" height="248" class="mod-course-banner__img" />
            </a>
    </div>

    <div class="mod-course-banner__content">
      <h1 class="mod-course-banner__title" title="{{$goods->title}}">{{$goods->title}}</h1>

            <!--货品ID，当为商品时值为空-->
            <input type='hidden' id='product_id' alt='货品ID' value='' />

      <div class="mod-course-banner__social">
              <span>评分：</span>
                <span class="grade"><i style="width:0px;"></i></span>
                <span class="mod-course-banner__vote-number">( 0 )</span>
                      </div>
      <div class="mod-course-banner__content-line">
        <span class="mod-course-banner__price  mod-course-card__price_free">
                              <!--商品价格-->
          <span id='priceLi'></span>
                          </span>

                <!--商品价格模板-->
        <script type='text/html' id='priceTemplate'>
                <%if(group_price){%>
                <span id='priceLi'>
                    会员价：<b class="price red2"><span class="f30" id="real_price"><%=group_price%></span></b> &nbsp;&nbsp;&nbsp;
                    销售价：<s><%if(minSellPrice != maxSellPrice){%>￥<%=minSellPrice%> - ￥<%=maxSellPrice%><%}else{%>￥<%=sell_price%><%}%></s>
                </span>
                <%}else{%>
                <span id='priceLi'><span class="mod-course-card__price_free" id="real_price"><%if(minSellPrice != maxSellPrice){%>￥<%=minSellPrice%> - ￥<%=maxSellPrice%><%}else{%>￥<%=sell_price%><%}%></span></span>
                <%}%>
                </script>
      </div>

            <label id="data_storeNums" style="display:none;">100</label>

                  <div class="mod-course-banner__content-line">
                <div class="mod-choose-time_v2">
                                </div>
          </div>


          <div class="mod-course-banner__btn-wrap mod-course-banner__btn-wrap-free">
              <span id="js_apply_button_region" class="button-region">
                <form class="" action="/cart/add" method="post">

                  <div class="mod-course-banner__content-line js-accept-invite-tips">
                        <dl>
                            <dt>购买数量：</dt>
                            <dd>
                                <a class="add"  id="numjia"> + </a>
                                <input class="gray_t" type="text" id="buyNums" name="num" onblur="checkBuyNums();" value="1" maxlength="5" />
                                <a class="reduce" id="numjian"> - </a>
                            </dd>
                        </dl>
                    </div>

                  <button type="submit" class="btn-primary" id="joinCarButton" >立即报名</button>

                </span>
                <div class="shop_cart" style="z-index:1">
                    <!-- <a href="javascript:void(0);" id="joinCarButton" class="btn_cart" onclick="joinCart();">加入报名清单</a> -->
                      <input type="hidden" name="id" value="{{$goods->id}}">
                      {{csrf_field()}}
                      <button type="submit" class="btn_cart" id="joinCarButton" >加入报名清单</button>
                    </form>
                </div>
                <script type="text/javascript">
                $('#numjia').click(function(){
                  var num=parseInt($('#buyNums').val());
                  if(num){
                    num=num+1;
                  }
                  console.log(num);
                  $('#buyNums').val(num);
                });
                $('#numjian').click(function(){
                  var num=parseInt($('#buyNums').val());
                  if(num<=1){
                    num=1;
                  }else{
                    num=num-1;
                  }
                  console.log(num);
                  $('#buyNums').val(num);
                });
                </script>


                <a id="js_fav" href="javascript:void(0);" class="btn-primary btn-heart">
                <i class="icon-font i-heart"></i>
                <?php $favorite=DB::table('goods')->where('id',$goods->id)->value('favorite'); ?>
                @if($favorite == 0)
                <span class="js-fav-num" id="favorite_add" onclick="favorite_add(this);">收藏</span>
                @else
                <span class="js-fav-num" id="favorite_del"  onclick="favorite_del(this);">取消收藏</span>
                @endif
                </a>


      </div>
                  </div>
    </div>
</div>

<div class="matter">
  <div class="mod-side-bar-right">
    <div class="mod-side-bar-right__box mod-side-bar-right__box_first">
      <div class="mod-side-bar-right__content">
            <div class="mod-side-bar-right__school">
                            </div>
      </div>
    </div>

          </div>

  <div class="mod-tab">
      <ul class="mod-tab__ul" id="js_tab" name="showButton">
      <label class="current"><span>商品详情</span></label>
      <label><span>售后服务</span></label>
      <label><span>学员评论({{$count}})</span></label>
      </ul>
      <div name="showBox">
          <div class="mod-tab__content">
                <h4 class="des-title">商品信息</h4>
                {!!$goods->detail!!}
          </div>

                <!-- 售后服务 start -->
                <div class="hidden box">
                    <div class="title3"><img src="/homes/picture/tel.gif" width="20px" height="19px" />售后服务</div>
                    <div class="cont_s gray">
                     <div style="display:block;" class="mc tabcon hide">
                    本产品全国联保，享受三包服务，质保期为：十五天质保<br />
        </div>


        <div id="promises">
          <strong>腾讯课堂服务承诺：</strong><br />
<strong>腾讯课堂</strong>向您保证所售商品均为正品行货，自带机打发票，与商品一起寄送。凭质保证书及<strong>Iweb</strong>商城发票，可享受全国联保服务，与您亲临商场选购的商品享受相同的质量保证。<br />
<strong>腾讯课堂</strong>还为您提供具有竞争力的商品价格和免运费政策，请您放心购买！
        </div>
        <div id="state"><strong>声明:</strong>因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</div>                                            </div>
                </div>

                <!-- 顾客评论 start -->
                <div class="hidden comment_list box">
                    <div class="title3">
                      @if(session('hid'))
                              @foreach($pinglun as $k=>$v)
                              <div>
                                 <h2><b>评论人:</b>{{$v->username}}</h2>
                                 <blockquote>
                                      <p>{!!$v->detail!!}</p>
                                      <small>{{$v->time}}
                                      </small>
                                  </blockquote>
                               </div>
                               <hr />
                              @endforeach
                        <span class="f_r f12 light_gray normal">
                         <form action="/user/comment" method="post">
                         <script id="editor" name="detail" type="text/plain" style="width:690px;height:250px;"></script>
                        <input type="hidden" name='title' value="{{$goods->title}}" />
                         <input type="hidden" name='good_id' value="{{$goods->id}}" />
                         <button type="submit" class="tijiao">提交评论</button>
                        </form>
                         <img src="/homes/picture/comm.gif" width="16px" height="16px" />商品评论<sp  an class="f12 normal">（已有<b class="red2">{{$count}}</b>条）</span>

                      @else

                      登录后查看和评论
											<br>
                        <img src="/homes/picture/comm.gif" width="16px" height="16px" />商品评论<span class="f12 normal">（已有<b class="red2">{{$count}}</b>条）</span>
                      @endif
                        </span>
                    </div>


                    <div id='commentBox'></div>


                    <!--评论JS模板-->
                    <script type='text/html' id='commentRowTemplate'>
                    <div class="item">
                        <div class="user">
                            <div class="ico">
                                <a href="javascript:void(0)">
                                    <img src="/tpl/txkt/<%=head_ico%>" width="70px" height="70px" onerror="this.src=''" />
                                </a>
                            </div>
                            <span class="blue"><%=username%></span>
                        </div>
                        <dl class="desc">
                            <%var widthPoint = 14 * point;%>
                            <p>
                                <b>评分：</b>
                                <span class="grade"><i style="width:<%=widthPoint%>px"></i></span>
                                <span class="light_gray f_r"><%=comment_time%></span><label></label>
                            </p>
                            <hr />
                            <p><b>评价：</b><span class="gray"><%=contents%></span></p>
                            <%if(recontents){%>
                            <p><b>回复：</b><span class="red"><%=recontents%></span></p>
                            <%}%>
                        </dl>
                        <div class="corner b"></div>
                    </div>
                    <hr />
                    </script>
                </div>
            </div>
    </div>
  </div>

    <div class="bottom-wrap">
    <div class="bottom-main">
        <h4 class="des-title">浏览历史</h4>
        <div class="course-card-list-960-wrap clearfix">
          <ul class="course-card-list">
            @foreach($history as $k=>$v)
            <li class="course-card-item">
                <a href="/course/{{$v->id}}" target="_blank" class="item-img-link">
                  <img src="{{$v->img}}" alt="{{$v->title}}" title="{{$v->title}}" class="item-img" height="124" width="220" />
                </a>
                <h4 class="item-tt">
                  <a href="/course/{{$v->id}}" target="_blank" class="item-tt-link" title="{{$v->title}}">{{$v->title}}</a>
                </h4>
                <div class="item-line">
                  <span class="line-cell item-price free">￥{{$v->price}}</span>
                </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
  </div>

<script type="text/javascript">
deliveryProvince = 0;
deliveryProvinceString = '';

$(function(){

//图片初始化
var goodsSmallPic = "/tpl/txkt/views/default/skin/default/images/front/nopic_435_435.gif";
var goodsBigPic   = "/tpl/txkt/views/default/skin/default/images/front/nopic_435_435.gif";

//存在图片数据时候
goodsSmallPic = "/tpl/txkt/runtime/_thumb/upload/2015/08/03/435_435_20150803172251799.jpg";
goodsBigPic   = "/tpl/txkt/upload/2015/08/03/20150803172251799.jpg";

//初始化商品轮换图
var bxObj = $('#thumblist').bxSlider({
  infiniteLoop: false,
  hideControlOnEnd: true,
  pager:false,
  minSlides: 5,
  maxSlides: 5,
  slideWidth: 72,
  slideMargin: 15,
  controls:true,
  onSliderLoad:function(currentIndex){
    //设置图片
    $('#smallPicBox').attr('src',goodsSmallPic);
    $('#bigPicBox').attr('href',goodsBigPic);

    //开启放大镜
    $('.jqzoom').jqzoom({
      title:false,
      lens:true,
      preloadText:'加载中...',
      zoomWidth:300,
      zoomHeight:300,
      xOffset:15,
        zoomType: 'standard',
        preloadImages: false
    });
  }
});

//如果抢购或团购过期则不许立即购买

//开启倒计时功能
var cd_timer = new countdown();

//限时抢购倒计时

//团购倒计时

//城市地域选择按钮事件
$('.sel_area').hover(
  function(){
    $('.area_box').show();
  },function(){
    $('.area_box').hide();
  }
);
$('.area_box').hover(
  function(){
    $('.area_box').show();
  },function(){
    $('.area_box').hide();
  }
);

//获取地址的ip地址
getAddress();

//生成商品价格
var priceHtml = template.render('priceTemplate',{"group_price":"","minSellPrice":"","maxSellPrice":"","sell_price":"{{$goods->price}}"});
$('#priceLi').replaceWith(priceHtml);

//按钮绑定
$('[name="showButton"]>label').click(function(){
  $(this).siblings().removeClass('current');
  if($(this).hasClass('current') == false)
  {
    $(this).addClass('current');
  }
  $('[name="showBox"]>div').addClass('hidden');
  $('[name="showBox"]>div:eq('+$(this).index()+')').removeClass('hidden');

  switch($(this).index())
  {
    case 1:
    {
      comment_ajax();
    }
    break;

    case 2:
    {
      history_ajax();
    }
    break;

    case 3:
    {
      refer_ajax();
    }
    break;

    case 4:
    {
      discuss_ajax();
    }
    break;
  }
});

});

//禁止购买
function closeBuy()
{
  if($('#buyNowButton').length > 0)
  {
    $('#buyNowButton').attr('disabled','disabled');
    $('#buyNowButton').addClass('disabled');
  }

  if($('#joinCarButton').length > 0)
  {
    $('#joinCarButton').attr('disabled','disabled');
    $('#joinCarButton').addClass('disabled');
  }
}

//开放购买
function openBuy()
{
  if($('#buyNowButton').length > 0)
  {
    $('#buyNowButton').removeAttr('disabled');
    $('#buyNowButton').removeClass('disabled');
  }

  if($('#joinCarButton').length > 0)
  {
    $('#joinCarButton').removeAttr('disabled');
    $('#joinCarButton').removeClass('disabled');
  }
}

//加载根据地域获取城市
function getAddress()
{
  //根据IP查询所在地
  var ipAddress = $.cookie('ipAddress');
  if(ipAddress)
  {
    searchDelivery(ipAddress);
  }
  else
  {
    $.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js',function(){
      ipAddress = remote_ip_info['province'];
      $.cookie('ipAddress',ipAddress);
      searchDelivery(ipAddress);
    });
  }
}

//发表讨论
function sendDiscuss()
{
  var userId = "";
  if(userId)
  {
    $('#discussTable').show('normal');
    $('#discussContent').focus();
  }
  else
  {
    alert('请登陆后再发表讨论!');
  }
}

/**
 * 根据省份获取运费信息
 * @param province 省份名称
 */
function searchDelivery(province)
{
  var url = '/tpl/txkt/block/searchPrivice/random/@random@';
  url = url.replace("@random@",Math.random);

  $.getJSON(url,{'province':province},function(json)
  {
    if(json.flag == 'success')
    {
      delivery(json.area_id,province);
      deliveryProvince       = json.area_id;
      deliveryProvinceString = province;
    }
  });
}

/**
 * 计算运费
 * @param provinceId
 * @param provinceName
 */
function delivery(provinceId,provinceName)
{
  $('.sel_area').text(provinceName);

  var buyNums = $('#buyNums').val();
  var productId = $('#product_id').val();
  var goodsId = "8";

  //通过省份id查询出配送方式，并且传送总重量计算出运费,然后显示配送方式
  var url = '/tpl/txkt/block/order_delivery';
  $.getJSON(url,{'province':provinceId,'goodsId':goodsId,'productId':productId,'num':buyNums,'random':Math.random},function(json)
  {
    //清空配送信息
    $('#deliveInfo').empty();

    for(var item in json)
    {
      var deliveRowHtml = template.render('deliveInfoTemplate',json[item]);
      $('#deliveInfo').append(deliveRowHtml);
    }
  });
  deliveryProvince       = provinceId;
  deliveryProvinceString = provinceName;
}

/**
 * 获取评论数据
 * @page 分页数
 */
function comment_ajax(page)
{
  if(!page && $.trim($('#commentBox').text()))
  {
    return;
  }
  page = page ? page : 1;
  var url = '/tpl/txkt/site/comment_ajax/page/@page@/goods_id/8';
  url = url.replace("@page@",page);
  $.getJSON(url,function(json)
  {
    //清空评论数据
    $('#commentBox').empty();

    for(var item in json.data)
    {
      var commentHtml = template.render('commentRowTemplate',json.data[item]);
      $('#commentBox').append(commentHtml);
    }
    $('#commentBox').append(json.pageHtml);
  });
}

/**
 * 获取购买记录数据
 * @page 分页数
 */
function history_ajax(page)
{
  if(!page && $.trim($('#historyBox').text()))
  {
    return;
  }
  page = page ? page : 1;
  var url = '/tpl/txkt/site/history_ajax/page/@page@/goods_id/8';
  url = url.replace("@page@",page);
  $.getJSON(url,function(json)
  {
    //清空购买历史记录
    $('#historyBox').empty();
    $('#historyBox').parent().parent().find('.pages_bar').remove();

    for(var item in json.data)
    {
      var historyHtml = template.render('historyRowTemplate',json.data[item]);
      $('#historyBox').append(historyHtml);
    }
    $('#historyBox').parent().after(json.pageHtml);
  });
}

/**
 * 获取购买记录数据
 * @page 分页数
 */
function refer_ajax(page)
{
  if(!page && $.trim($('#referBox').text()))
  {
    return;
  }
  page = page ? page : 1;
  var url = '/tpl/txkt/site/refer_ajax/page/@page@/goods_id/8';
  url = url.replace("@page@",page);
  $.getJSON(url,function(json)
  {
    //清空评论数据
    $('#referBox').empty();

    for(var item in json.data)
    {
      var commentHtml = template.render('referRowTemplate',json.data[item]);
      $('#referBox').append(commentHtml);
    }
    $('#referBox').append(json.pageHtml);
  });
}

/**
 * 获取购买记录数据
 * @page 分页数
 */
function discuss_ajax(page)
{
  if(!page && $.trim($('#discussBox').text()))
  {
    return;
  }
  page = page ? page : 1;
  var url = '/tpl/txkt/site/discuss_ajax/page/@page@/goods_id/8';
  url = url.replace("@page@",page);
  $.getJSON(url,function(json)
  {
    //清空购买历史记录
    $('#discussBox').empty();
    $('#discussBox').parent().parent().find('.pages_bar').remove();

    for(var item in json.data)
    {
      var historyHtml = template.render('discussRowTemplate',json.data[item]);
      $('#discussBox').append(historyHtml);
    }
    $('#discussBox').parent().after(json.pageHtml);
  });
}

//发布讨论数据
function sendDiscussData()
{
  var content = $('#discussContent').val();
  var captcha = $('[name="captcha"]').val();

  if($.trim(content)=='')
  {
    alert('请输入讨论内容!');
    $('#discussContent').focus();
    return false;
  }
  if($.trim(captcha)=='')
  {
    alert('请输入验证码!');
    $('[name="captcha"]').focus();
    return false;
  }

  var url = '/tpl/txkt/site/discussUpdate/id/8/captcha/@captcha@/random/@Math@';
  url = url.replace("@captcha@",captcha).replace("@Math@",Math.random);

  $.getJSON(url,{'content':content},function(json)
  {
    if(json.isError == false)
    {
      var discussHtml = template.render('discussRowTemplate',json);
      $('#discussBox').prepend(discussHtml);

      //清除数据
      $('#discussContent').val('');
      $('[name="captcha"]').val('');
      $('#discussTable').hide('normal');
      changeCaptcha('/tpl/txkt/site/getCaptcha');
    }
    else
    {
      alert(json.message);
    }
  });
}

/**
 * 规格的选择
 * @param _self 规格本身
 */
function sele_spec(_self)
{
  var specObj = $.parseJSON($(_self).attr('value'));

  //清除同规格下已选数据
  $('#selectedSpan'+specObj.id).remove();

  //已经为选中状态时
  if($(_self).attr('class') == 'current')
  {
    $(_self).removeClass('current');
    $('#selectedSpan'+specObj.id).remove();
  }
  else
  {
    //清除同行中其余规格选中状态
    $('#specList'+specObj.id).find('a.current').removeClass('current');

    $(_self).addClass('current');
    var newSpecHtml = template.render('selectedSpecTemplate',specObj);
    $('#specSelected').append(newSpecHtml);
  }

  //检查规格是否选择符合标准
  if(checkSpecSelected())
  {
    //整理规格值
    var specArray = [];
    $('[name="specCols"]').each(function(){
      specArray.push($(this).find('a.current').attr('value'));
    });
    var specJSON = '['+specArray.join(",")+']';

    //获取货品数据并进行渲染
    $.getJSON('/tpl/txkt/site/getProduct',{"goods_id":"8","specJSON":specJSON,"random":Math.random},function(json){
      if(json.flag == 'success')
      {
        //普通商品购买方式(非团购，抢购等),商品价格渲染
        if($('#priceLi').length > 0)
        {
          var priceHtml = template.render('priceTemplate',json.data);
          $('#priceLi').replaceWith(priceHtml);
        }
        //非普通商品购买方式，商品价格渲染
        else if($('#data_sellPrice').length > 0)
        {
          $('#data_sellPrice').text(json.data.sell_price);
        }

        //普通货品数据渲染
        $('#data_goodsNo').text(json.data.products_no);
        $('#data_storeNums').text(json.data.store_nums);
        $('#data_marketPrice').text("￥"+json.data.market_price);
        $('#data_weight').text(json.data.weight);
        $('#product_id').val(json.data.id);

        //库存监测
        checkStoreNums();
      }
      else
      {
        alert(json.message);
        closeBuy();
      }
    });
  }
}

/**
 * 监测库存操作
 */
function checkStoreNums()
{
  var storeNums = parseInt($.trim($('#data_storeNums').text()));
  if(storeNums > 0)
  {
    openBuy();
  }
  else
  {
    closeBuy();
  }
}

/**
 * 检查规格选择是否符合标准
 * @return boolen
 */
function checkSpecSelected()
{
  if($('[name="specCols"]').length === $('[name="specCols"] .current').length)
  {
    return true;
  }
  return false;
}

//检查购买数量是否合法
function checkBuyNums()
{
  //购买数量小于0
  var buyNums = parseInt($.trim($('#buyNums').val()));
  if(buyNums <= 0)
  {
    $('#buyNums').val(1);
    return;
  }

  //购买数量大于库存
  var storeNums = parseInt($.trim($('#data_storeNums').text()));
  if(buyNums >= storeNums)
  {
    $('#buyNums').val(storeNums);
    return;
  }

  //运费查询
  delivery(deliveryProvince,deliveryProvinceString);
}

/**
 * 购物车数量的加减
 * @param code 增加或者减少购买的商品数量
 */
function modified(code)
{
  var buyNums = parseInt($.trim($('#buyNums').val()));
  switch(code)
  {
    case 1:
    {
      buyNums++;
    }
    break;

    case -1:
    {
      buyNums--;
    }
    break;
  }

  $('#buyNums').val(buyNums);
  checkBuyNums();
}

//商品加入购物车
function joinCart()
{
  if(!checkSpecSelected())
  {
    tips('请先选择商品的规格');
    return;
  }

  var buyNums   = parseInt($.trim($('#buyNums').val()));
  var price     = parseFloat($.trim($('#real_price').text()));
  var productId = $('#product_id').val();
  var type      = productId ? 'product' : 'goods';
  var goods_id  = (type == 'product') ? productId : 8;

  $.getJSON('/tpl/txkt/simple/joinCart',{"goods_id":goods_id,"type":type,"goods_num":buyNums,"random":Math.random},function(content){
    if(content.isError == false)
    {
      //获取购物车信息
      $.getJSON('/tpl/txkt/simple/showCart',{"random":Math.random},function(json)
      {
        $('[name="mycart_count"]').text(json.count);
        $('[name="mycart_sum"]').text(json.sum);

        //展示购物车清单
        $('#product_myCart').show();

        //暂闭加入购物车按钮
        $('#joinCarButton').attr('disabled','disabled');
      });
    }
    else
    {
      alert(content.message);
    }
  });
}

//添加收藏夹
function favorite_add(obj)
{
      window.location.href="/user/favorite?id={{$goods->id}}";
  }

//取消收藏
function favorite_del(obj)
{
      window.location.href="/user/nofavorite?id={{$goods->id}}";
  }

//立即购买按钮
function buy_now()
{
  //对规格的检查
  if(!checkSpecSelected())
  {
    tips('请选择商品的规格');
    return;
  }

  //设置必要参数
  var buyNums  = parseInt($.trim($('#buyNums').val()));
  var id = 8;
  var type = 'goods';

  if($('#product_id').val())
  {
    id = $('#product_id').val();
    type = 'product';
  }

    //普通购买
  var url = '/tpl/txkt/simple/cart2/id/@id@/num/@buyNums@/type/@type@';
  url = url.replace('@id@',id).replace('@buyNums@',buyNums).replace('@type@',type);

  //页面跳转
  window.location.href = url;
}
</script>


<div class="mod-footer mod-footer_dark">
   <p>  Copyright ? 2015 Tencent. All Rights Reserved.</p><p> 深圳市腾讯计算机系统有限公司 版权所有 | <a target="_blank">腾讯课堂服务协议</a></p></div>

<div class="wrap-side-operation" id="js-side-operation">
  <div class="mod-side-operation">
    <div style="display: block;" id="js-jump-container" class="js-jump-container">
      <a href="javascript:void(0)" class="mod-side-operation__jump-to-top" id="js-jump-to-top"><i class="icon-font i-to-top"></i></a>
      </div>
      <div class="side-service-item side-service-qq js-c-special">
          <a class="item-link-block" href="javascript:;" target="_blank">
              <i class="icon-font i-qq-border item-icon"></i>
                <span class="item-hover-text">在线客服</span>
            </a>
    </div>
    <div class="side-service-item side-service-weixin js-c-special">
          <i class="icon-font i-weixin-border item-icon"></i>
            <span class="item-hover-text">扫码关注</span>
          <div class="item-hover-tips"></div>
      </div>
      <div class="side-service-item side-service-qr-code">
          <i class="icon-font i-phone item-icon"></i>
            <span class="item-hover-text">移动课堂</span>
          <div class="item-hover-tips"></div>
      </div>
      <div class="side-service-item side-service-feedback">
          <a class="item-link-block js-feedback-link" href="javascript:;">
              <i class="icon-font i-edit item-icon"></i>
              <span class="item-hover-text">问题反馈</span>
            </a>
    </div>
  </div>
</div>
<!-- 百度编辑器 -->
<script type="text/javascript">
   var ue = UE.getEditor('editor');
</script>
<script type='text/javascript'>
$(function()
{
    $('input:text[name="word"]').val("输入关键字...");

  $('input:text[name="word"]').bind({
    keyup:function(){autoComplete('/tpl/txkt/site/autoComplete','/tpl/txkt/site/search_list/word/@word@','');}
  });

  var mycartLateCall = new lateCall(200,function(){showCart('/tpl/txkt/simple/showCart')});

  //购物车div层
  $('.mycart').hover(
    function(){
      mycartLateCall.start();
    },
    function(){
      mycartLateCall.stop();
      $('#div_mycart').hide('slow');
    }
  );
});

//[ajax]加入购物车
function joinCart_ajax(id,type)
{
  $.getJSON("/tpl/txkt/simple/joinCart",{"goods_id":id,"type":type,"random":Math.random()},function(content){
    if(content.isError == false)
    {
      var count = parseInt($('[name="mycart_count"]').html()) + 1;
      $('[name="mycart_count"]').html(count);
      alert(content.message);
    }
    else
    {
      alert(content.message);
    }
  });
}

//列表页加入购物车统一接口
function joinCart_list(id)
{
  $.getJSON('/tpl/txkt/simple/getProducts',{"id":id},function(content){
    if(!content)
    {
      joinCart_ajax(id,'goods');
    }
    else
    {
      var url = "/tpl/txkt/block/goods_list/goods_id/@goods_id@/type/radio/is_products/1";
      url = url.replace('@goods_id@',id);
      artDialog.open(url,{
        id:'selectProduct',
        title:'选择货品到购物车',
        okVal:'加入购物车',
        ok:function(iframeWin, topWin)
        {
          var goodsList = $(iframeWin.document).find('input[name="id[]"]:checked');

          //添加选中的商品
          if(goodsList.length == 0)
          {
            alert('请选择要加入购物车的商品');
            return false;
          }
          var temp = $.parseJSON(goodsList.attr('data'));

          //执行处理回调
          joinCart_ajax(temp.product_id,'product');
          return true;
        }
      })
    }
  });
}
</script>
</body>
</html>
