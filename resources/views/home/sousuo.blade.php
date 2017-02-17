<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            商品搜索_腾讯课堂
        </title>
        <link type="image/x-icon" href="/homes/favicon.ico" rel="icon">
        <link rel="stylesheet" href="/homes/css/index.css" />
        <link rel="stylesheet" href="/homes/css/common.css" />
        <link rel="stylesheet" href="/homes/css/shake.css" />
        <script type="text/javascript" charset="UTF-8" src="/homes/js/jquery-1.11.3.min.js">
        </script>
        <script type="text/javascript" charset="UTF-8" src="/homes/js/jquery-migrate-1.2.1.min.js">
        </script>
        <script type="text/javascript" charset="UTF-8" src="/homes/js/form.js">
        </script>
        <script type="text/javascript" charset="UTF-8" src="/homes/js/validate.js">
        </script>
        <link rel="stylesheet" type="text/css" href="/homes/css/style.css" />
        <script type="text/javascript" charset="UTF-8" src="/homes/js/artdialog.js">
        </script>
        <script type="text/javascript" charset="UTF-8" src="/homes/js/iframetools.js">
        </script>
        <link rel="stylesheet" type="text/css" href="/homes/css/default.css" />
        <script type="text/javascript" charset="UTF-8" src="/homes/js/arttemplate.js">
        </script>
        <script type="text/javascript" charset="UTF-8" src="/homes/js/arttemplate-plugin.js">
        </script>
        <script type='text/javascript' src="/homes/js/common.js">
        </script>
        <script type='text/javascript' src='/homes/js/site.js'>
        </script>
        <link rel="stylesheet" href="/homes/css/red.css" />
        <script type="text/javascript" src="/homes/js/jquery.sonline.js">
        </script>
    </head>

    <body>
        <div class="mod-header__wrap js-unknown-role" id="js_main_nav">
            <div class="mod-header clearfix">
              <?php
                  $sessionid = session('hid');
                  $sessionid = DB::table('users')->where('id',$sessionid)->first();
                  // dd($sessionid);
               ?>
               @if(!$sessionid)
              <div id="js-mod-header-login" class="mod-header__wrap-login">
                <a href="/login" class="mod-header__link-login js-login-op" id="js_login">登录</a>
                <a href="/register" class="mod-header__link-login js-login-op" id="js_login">注册</a>
                <a id="js-help" href="/site/help_list" class="mod-header__link-help">帮助</a>
              </div>
              @else
              <div id="js-mod-header-login" class="mod-header__wrap-login">
                  <div class="mod-header_wrap-user" id="js_logout_outer">
                    <i class="icon-red-circle" style="display:none;"></i>
                    <img src="/homes/picture/33c6424ed0cd4c5eb9c4c2f31fd20353.gif" class="mod-header__user-img js-avatar" width="30" height="30" onerror="this.src='{{$sessionid->profile}}'" />
                    <p class="mod-header__user-name">
                        <a href="/user" class="mod-header__user-operation">个人中心<i class="icon-select-down"></i></a>
                    </p>
                      <ul class="mod-header__user-operations">
                          <li><a href="/ucenter/info" class="mod-header__user-operation js-live-course">个人信息</a></li>
                          <li><a href="/ucenter/order" class="mod-header__user-operation js-video">我的课程</a></li>
                          <li><a href="/ucenter/redpacket" class="mod-header__user-operation js-coupon">优惠券</a></li>
                          <li><a href="/ucenter/evaluation" class="mod-header__user-operation js-signup">我的评价</a></li>
                          <li><a href="/ucenter/favorite" class="mod-header__user-operation js-fav">收藏</a></li>
                          <li><a href="/logout" class="js_logout mod-header__link-logout js-login-op">退出</a></li>
                      </ul>
                  </div>
                                <a id="js-help" href="/site/help_list" class="mod-header__link-help">帮助</a>
              </div>
              @endif
                <h1 class="mod-header-logo">
                    <a href="/" title="腾讯课堂" class="mod-header__link-logo">
                    </a>
                </h1>
                <div class="mod-header__wrap-search" id="js-searchbox">
                    <div class="mod-search">
                        <form method='get' action='/s'>
                            <input type='hidden' name='controller' value='site' />
                            <input type='hidden' name='action' value='search_list' />
                            <input class="mod-search__input" maxlength="38" type="text" name='word'
                            autocomplete="no" value="{{$request->input('word')}}" />
                            <input class="mod-search__btn-search i-search" type="submit" value=""
                            onclick="checkInput('word','输入关键字...');" />
                        </form>
                        <!--自动完成div 开始-->
                        <ul class="auto_list" style='display:none'>
                        </ul>
                    </div>
                    <div class="mod-search-word-list">
                      <a href="/s?controller=site&action=search_list&word=会计基础学习" class="mod-search-word mod-search-word-hot" target="_blank">会计基础学习</a>
                      <a href="/s?controller=site&action=search_list&word=新概念课文" class="mod-search-word mod-search-word-hot" target="_blank">新概念课文</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-banner">
            <div class="wrap-little-banner">
                <div class="wrap-activity-list" jump-end="true">
                    <a href="/" title="腾讯课堂" class="wrap-activity-item">
                        首页
                    </a>
                    <a href="/tpl/txkt/#" class="wrap-activity-item">
                        设计学院
                    </a>
                    <a href="/tpl/txkt/#" class="wrap-activity-item">
                        挑灯夜学
                    </a>
                    <a href="/tpl/txkt/#" class="wrap-activity-item">
                        精选合辑
                    </a>
                </div>
                <div class="apply-entrance js-apply-entrance">
                    <p class="apply-tt">
                        学习平台
                    </p>
                    <ul class="apply-link-list">
                        <li>
                            <a href="http://www.ouchn.edu.cn/" target="_blank" report-tdw="action=organization_comein">
                                国家开放大学
                            </a>
                        </li>
                        <li>
                            <a href="http://www.buaa.edu.cn/" target="_blank" report-tdw="action=organization_comein">
                                北京航空航天大学
                            </a>
                        </li>
                        <li>
                            <a href="http://www.neu.edu.cn/" target="_blank" report-tdw="action=organization_comein">
                                东北大学
                            </a>
                        </li>
                        <li>
                            <a href="http://www.sjtu.edu.cn/" target="_blank" report-tdw="action=organization_comein">
                                上海交通大学
                            </a>
                        </li>
                        <li>
                            <a href="http://www.ecust.edu.cn/" target="_blank" report-tdw="action=organization_comein">
                                华东理工大学
                            </a>
                        </li>
                        <li>
                            <a href="http://www.ecnu.edu.cn/" target="_blank" report-tdw="action=organization_comein">
                                华东师范大学
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wrap-banner-bg clearfix">
                <div class="wrap-nav">
                    <div class="mod-nav">
                        <ul class="mod-nav__list allsort">
                            <li class="mod-nav__li-first">
                                <a id="js-course-list" href="javascript:;" class="mod-nav__course-all">
                                    <i class="icon-menu">
                                    </i>
                                    <span>
                                        全部课程
                                    </span>
                                </a>
                            </li>
                            <div class="sortlist" id='div_allsort' style='display:none'>
                              <?php
                                  $cates = getCates(0);
                               ?>
                            @foreach($cates as $k=>$v)
                                <li class="mod-nav__li js-mod-category ">
                                <div class="mod-nav__wrap-nav-first">
                                    <i class="icon-font i-v-right"></i>
                                    <a href="/list" class="mod-nav__link-nav-first" target="_blank">{{$v->name}}</a>
                                </div>
                                <div class="mod-nav__wrap-nav-hot">
                                @foreach($v->subcates as $a=>$b)
                                    <a href="/list" class="mod-nav__link-nav-hot" target="_blank">{{$b->name}}</a>
                                @endforeach
                                </div>
                                <div class="mod-nav__wrap-nav-side js-mod-category-side">
                                @foreach($v->subcates as $a=>$b)
                                    <ul class="mod-nav__side-list">
                                        <li class="mod-nav__side-li">
                                        <a href="/list" class="mod-nav__link-nav-second" target="_blank">{{$b->name}}</a>

                                        <div class="mod-nav__wrap-nav-third">
                                            @foreach($b->subcates as $c=>$d)

                                            <a href="/list?id={{$d->id}}" class="mod-nav__link-nav-third mod-nav__wrap-nav-third_line" target="_blank">{{$d->name}}</a>

                                            @endforeach
                                        </div>
                                        </li>

                                    </ul>
                                    @endforeach
                        </div>
                        </li>
                        @endforeach
                    </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="position">
            <span>
                全部结果：
            </span>
            <a href="javascript:void(0)">
                {{$request->input('word')}}
            </a>
        </div>
        <div class="wrapper clearfix container_2">
            <div class="sidebar f_l">
                <div class="box_2 m_10">
                    <div class="title">
                        分类筛选
                    </div>
                    <div class="content">
                        <dl class="w clearfix">
                         @foreach($cates as $k=>$v)
                            <dd class=''>

                                <a href="/list?id={{$d->id}}">
                                    {{$v->name}}
                                </a>

                            </dd>
                         @endforeach
                        </dl>
                    </div>
                </div>
                <div class="box m_10">
                </div>
                <div class="box m_10">
                    <div class="title">
                        销售排行榜
                    </div>
                    <div class="content">
                        <ul class="ranklist" id='ranklist'>
                            <li>
                                <span>
                                    1
                                </span>
                                <a href="/tpl/txkt/site/products/id/20">
                                    <img src="/homes/picture/af4cf36470ac42109c5b1959cd623518.gif" width="60" height="60"
                                    alt="2016国考全面基础班【尚政公考】（限招100人）" />
                                </a>
                                <a title="2016国考全面基础班【尚政公考】（限招100人）" class="p_name" href="/tpl/txkt/site/products/id/20">
                                    2016国考全面基础班【尚政公考】（限招100人）
                                </a>
                                <b>
                                    ￥98.00
                                </b>
                            </li>
                            <li>
                                <span>
                                    2
                                </span>
                                <a href="/tpl/txkt/site/products/id/1">
                                    <img src="/homes/picture/17096841758247be87040e62f104cf97.gif" width="60" height="60"
                                    alt="10分钟学会一首吉他弹唱（一指弹）【e学通】" />
                                </a>
                                <a title="10分钟学会一首吉他弹唱（一指弹）【e学通】" class="p_name" href="/tpl/txkt/site/products/id/1">
                                    10分钟学会一首吉他弹唱（一指弹）【e学通】
                                </a>
                                <b>
                                    ￥0.00
                                </b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="search_list main-left" style="width:955px;">
                <strong class="result">
                    "
                    <span class="red">
                        {{$request->input('word')}}
                    </span>
                    " 搜索结果
                </strong>
                <p class="t_l gray m_10">
                    你是不是想找：
                </p>
                <div class="sort-menu-con" id="auto-test-1">
                    <div class="sort-menu-border1">
                        <dl class="sort-menu sort-menu1 clearfix">
                            <dt>
                                学习方向
                            </dt>

                            <dd class="">
                                <label>
                                </label>
                                @foreach($cates as $key=>$value)
                                <a href="/tpl/txkt/site/pro_list/cat/1">
                                    {{$value->name}}
                                </a>
                                @endforeach
                            </dd>

                        </dl>
                    </div>
                    <div class="sort-menu-border2">
                        <div class="js-sort-menu-activity js-label-row">
                        </div>
                    </div>
                    <div class="sort-menu-border2">
                        <div class="js-sort-menu-activity js-label-row">
                        </div>
                    </div>
                    <div class="sort-menu-border2">
                        <div class="js-sort-menu-activity js-label-row">
                            <dl class="sort-menu sort-menu2 clearfix">
                                <dt>
                                    价格:
                                </dt>
                                <dd id='price_dd'>
                                    <p class="f_r">
                                        <input type="text" class="mini" name="min_price" value="" onchange="checkPrice(this);">
                                        至
                                        <input type="text" class="mini" name="max_price" onchange="checkPrice(this);"
                                        value="">
                                        元
                                        <label class="btn_gray_s">
                                            <input type="button" onclick="priceLink();" value="确定">
                                        </label>
                                    </p>
                                    <a class="nolimit current" href="?controller=site&action=search_list&word=1&min_price=&max_price=">
                                        不限
                                    </a>
                                    <a class="flags-item-unselected js-tag" href="?controller=site&action=search_list&word=1&min_price=0&max_price=1"
                                    id="0-1">
                                        0-1
                                    </a>
                                    <a class="flags-item-unselected js-tag" href="?controller=site&action=search_list&word=1&min_price=2&max_price=39"
                                    id="2-39">
                                        2-39
                                    </a>
                                    <a class="flags-item-unselected js-tag" href="?controller=site&action=search_list&word=1&min_price=40&max_price=69"
                                    id="40-69">
                                        40-69
                                    </a>
                                    <a class="flags-item-unselected js-tag" href="?controller=site&action=search_list&word=1&min_price=70&max_price=99"
                                    id="70-99">
                                        70-99
                                    </a>
                                    <a class="flags-item-unselected js-tag" href="?controller=site&action=search_list&word=1&min_price=100&max_price=199"
                                    id="100-199">
                                        100-199
                                    </a>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="sort-nav sort-nav-sml clearfix">
                    <dl class="sort-nav-order sort-nav-order-my">
                        <dd class="">
                            <a href="?controller=site&action=search_list&word=1&order=sale" class="">
                                销量
                            </a>
                        </dd>
                        <dd class="">
                            <a href="?controller=site&action=search_list&word=1&order=cpoint" class="">
                                评分
                            </a>
                        </dd>
                        <dd class="">
                            <a href="?controller=site&action=search_list&word=1&order=price" class="price-item-my">
                                价格
                            </a>
                        </dd>
                        <dd class="current">
                            <a href="?controller=site&action=search_list&word=1&order=new" class="">
                                最新上架
                            </a>
                        </dd>
                    </dl>
                </div>
                <div class="market-bd market-bd-6 course-list course-card-list-multi-wrap">
                    <ul class="course-card-list">
                    @foreach($goods as $k=>$v)
                        <li class="course-card-item win" style="padding:10px;">
                            <a href="/course/{{$v->id}}" target="_blank" class="item-img-link">
                                <img src="{{$v->path}}" alt="10分钟学会一首吉他弹唱（一指弹）【e学通】"
                                title="10分钟学会一首吉他弹唱（一指弹）【e学通】" class="item-img" height="124" width="220"
                                />
                                <i class="icon-font i-lu">
                                </i>
                            </a>
                            <h4 class="item-tt">
                                <a href="/course/{{$v->id}}" target="_blank" class="item-tt-link"
                                title="10分钟学会一首吉他弹唱（一指弹）【e学通】">
                                    {{$v->title}}
                                </a>
                            </h4>
                            <div class="item-line">
                                <span class="line-cell item-price free">
                                    {{$v->price}}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="clear">
                </div>

            </div>
        </div>
        <script type='text/javascript'>
            //价格跳转
            function priceLink() {
                var minVal = $('[name="min_price"]').val();
                var maxVal = $('[name="max_price"]').val();
                if (isNaN(minVal) || isNaN(maxVal)) {
                    alert('价格填写不正确');
                    return '';
                }
                var urlVal = "?controller=site&action=search_list&word=1";
                window.location.href = urlVal + '&min_price=' + minVal + '&max_price=' + maxVal;
            }

            //价格检查
            function checkPrice(obj) {
                if (isNaN(obj.value)) {
                    obj.value = '';
                }
            }

            //筛选条件按钮高亮
            jQuery(function() {

});
        </script>
        <div class="mod-footer mod-footer_dark">
            <p>
                Copyright © 2015 Tencent. All Rights Reserved.
            </p>
            <p>
                深圳市腾讯计算机系统有限公司 版权所有 |
                <a target="_blank">
                    腾讯课堂服务协议
                </a>
            </p>
        </div>
        <div class="wrap-side-operation" id="js-side-operation">
            <div class="mod-side-operation">
                <div style="display: block;" id="js-jump-container" class="js-jump-container">
                    <a href="javascript:void(0)" class="mod-side-operation__jump-to-top" id="js-jump-to-top">
                        <i class="icon-font i-to-top">
                        </i>
                    </a>
                </div>
                <div class="side-service-item side-service-qq js-c-special">
                    <a class="item-link-block" href="javascript:;" target="_blank">
                        <i class="icon-font i-qq-border item-icon">
                        </i>
                        <span class="item-hover-text">
                            在线客服
                        </span>
                    </a>
                </div>
                <div class="side-service-item side-service-weixin js-c-special">
                    <i class="icon-font i-weixin-border item-icon">
                    </i>
                    <span class="item-hover-text">
                        扫码关注
                    </span>
                    <div class="item-hover-tips">
                    </div>
                </div>
                <div class="side-service-item side-service-qr-code">
                    <i class="icon-font i-phone item-icon">
                    </i>
                    <span class="item-hover-text">
                        移动课堂
                    </span>
                    <div class="item-hover-tips">
                    </div>
                </div>
                <div class="side-service-item side-service-feedback">
                    <a class="item-link-block js-feedback-link" href="javascript:;">
                        <i class="icon-font i-edit item-icon">
                        </i>
                        <span class="item-hover-text">
                            问题反馈
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <script type='text/javascript'>
            $(function() {
                $('input:text[name="word"]').val("{{$request->input('word')}}");

                $('input:text[name="word"]').bind({
                    keyup: function() {
                        autoComplete('/tpl/txkt/site/autoComplete', '/tpl/txkt/site/search_list/word/@word@', '');
                    }
                });

                var mycartLateCall = new lateCall(200,
                function() {
                    showCart('/tpl/txkt/simple/showCart')
                });

                //购物车div层
                $('.mycart').hover(function() {
                    mycartLateCall.start();
                },
                function() {
                    mycartLateCall.stop();
                    $('#div_mycart').hide('slow');
                });
            });

            //[ajax]加入购物车
            function joinCart_ajax(id, type) {
                $.getJSON("/tpl/txkt/simple/joinCart", {
                    "goods_id": id,
                    "type": type,
                    "random": Math.random()
                },
                function(content) {
                    if (content.isError == false) {
                        var count = parseInt($('[name="mycart_count"]').html()) + 1;
                        $('[name="mycart_count"]').html(count);
                        alert(content.message);
                    } else {
                        alert(content.message);
                    }
                });
            }

            //列表页加入购物车统一接口
            function joinCart_list(id) {
                $.getJSON('/tpl/txkt/simple/getProducts', {
                    "id": id
                },
                function(content) {
                    if (!content) {
                        joinCart_ajax(id, 'goods');
                    } else {
                        var url = "/tpl/txkt/block/goods_list/goods_id/@goods_id@/type/radio/is_products/1";
                        url = url.replace('@goods_id@', id);
                        artDialog.open(url, {
                            id: 'selectProduct',
                            title: '选择货品到购物车',
                            okVal: '加入购物车',
                            ok: function(iframeWin, topWin) {
                                var goodsList = $(iframeWin.document).find('input[name="id[]"]:checked');

                                //添加选中的商品
                                if (goodsList.length == 0) {
                                    alert('请选择要加入购物车的商品');
                                    return false;
                                }
                                var temp = $.parseJSON(goodsList.attr('data'));

                                //执行处理回调
                                joinCart_ajax(temp.product_id, 'product');
                                return true;
                            }
                        })
                    }
                });
            }
        </script>
    </body>

</html>
