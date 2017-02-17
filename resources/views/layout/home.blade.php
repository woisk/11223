<!-- 公共主页  -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>@yield('title')_腾讯课堂</title>
<link type="image/x-icon" href="favicon.ico" rel="icon">
<link rel="stylesheet" href="/homes/css/index.css"/>
<link rel="stylesheet" href="/homes/css/common.css"/>
<script type="text/javascript" charset="UTF-8" src="/homes/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="/homes/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="/homes/js/validate.js"></script>
<link rel="stylesheet" type="text/css" href="/homes/css/style.css"/>
<script type="text/javascript" charset="UTF-8" src="/homes/js/form.js"></script>
<script type="text/javascript" charset="UTF-8" src="/homes/js/artdialog.js"></script>
<script type="text/javascript" charset="UTF-8" src="/homes/js/iframetools.js"></script>
<link rel="stylesheet" type="text/css" href="/homes/css/default.css"/>
<script type='text/javascript' src="/homes/js/common.js"></script>
<script type='text/javascript' src='/homes/js/site.js'></script>
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
		<h1 class="mod-header-logo"><a href="/" title="腾讯课堂" class="mod-header__link-logo"></a></h1>
		<div class="mod-header__wrap-search" id="js-searchbox">
			<div class="mod-search">
				<form method='get' action='/s'>
					<input type='hidden' name='controller' value='site'/>
					<input type='hidden' name='action' value='search_list'/>
					<input class="mod-search__input" maxlength="38" type="text" name='word' autocomplete="off" value="输入关键字..."/>
					<input class="mod-search__btn-search i-search" type="submit" value="" onclick="checkInput('word','输入关键字...');"/>
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
		<div class="wrap-activity-list">
			<?php $top = DB::table('top')->get();?>
			 @foreach($top as $k=>$v)
			 <a href="{{$v->link}}" title="腾讯课堂" class="wrap-activity-item">{{$v->name}}</a>
			 @endforeach
		</div>
		<div class="apply-entrance js-apply-entrance">
			<p class="apply-tt">
				学习平台
			</p>
			<ul class="apply-link-list">
				<li><a href="http://www.ouchn.edu.cn/" target="_blank" report-tdw="action=organization_comein">国家开放大学</a></li>
				<li><a href="http://www.buaa.edu.cn/" target="_blank" report-tdw="action=organization_comein">北京航空航天大学</a></li>
				<li><a href="http://www.neu.edu.cn/" target="_blank" report-tdw="action=organization_comein">东北大学</a></li>
				<li><a href="http://www.sjtu.edu.cn/" target="_blank" report-tdw="action=organization_comein">上海交通大学</a></li>
				<li><a href="http://www.ecust.edu.cn/" target="_blank" report-tdw="action=organization_comein">华东理工大学</a></li>
				<li><a href="http://www.ecnu.edu.cn/" target="_blank" report-tdw="action=organization_comein">华东师范大学</a></li>
			</ul>
		</div>
	</div>
	<div class="wrap-banner-bg clearfix">
		<div class="wrap-nav">
			<div class="mod-nav">
				<ul class="mod-nav__list allsort">
					<li class="mod-nav__li-first">
					<a id="js-course-list" href="javascript:;" class="mod-nav__course-all">
					<i class="icon-menu"></i><span>全部课程</span>
					</a>
					</li>
					<!-- 递归读取分类 -->
					<?php	$cates = getCates(0);?>

					<div class="sortlist" id='div_allsort' style='display:none'>
						@foreach($cates as $k=>$v)
						<li class="mod-nav__li js-mod-category ">

							<div class="mod-nav__wrap-nav-first">
								<i class="icon-font i-v-right"></i>
								<a href="/list?id={{$v->id}}" class="mod-nav__link-nav-first" target="_blank">{{$v->name}}</a>
							</div>
							@if($v->subcates)

							<div class="mod-nav__wrap-nav-hot">
								@foreach($v->subcates as $a=>$b)
								<a href="/list?id={{$b->id}}" class="mod-nav__link-nav-hot" target="_blank">{{$b->name}}</a>
								@endforeach
							</div>

							<div class="mod-nav__wrap-nav-side js-mod-category-side">
								<ul class="mod-nav__side-list">
									@foreach($v->subcates as $a=>$b)
									<li class="mod-nav__side-li">
										<a href="/site/pro_list/cat/7" class="mod-nav__link-nav-second" target="_blank">{{$b->name}}</a>
										<div class="mod-nav__wrap-nav-third">
											@foreach($b->subcates as $c=>$d)
											<a href="/list?id={{$d->id}}" class="mod-nav__link-nav-third mod-nav__wrap-nav-third_line" target="_blank">{{$d->name}}</a>
											@endforeach
										</div>
									</li>
									@endforeach
								</ul>
							</div>
							@endif
						</li>
						@endforeach


					</div>
				</ul>
			</div>
		</div>
	</div>
</div>
@section('content')
@show
<div class="mod-footer mod-footer_dark">
	<p>
			Copyright © 2015 Tencent. All Rights Reserved.
	</p>
	<p>
			深圳市腾讯计算机系统有限公司 版权所有 | <a target="_blank">腾讯课堂服务协议</a>
	</p>
</div>
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
			<div class="item-hover-tips">
			</div>
		</div>
		<div class="side-service-item side-service-qr-code">
			<i class="icon-font i-phone item-icon"></i>
			<span class="item-hover-text">移动课堂</span>
			<div class="item-hover-tips">
			</div>
		</div>
		<div class="side-service-item side-service-feedback">
			<a class="item-link-block js-feedback-link" href="javascript:;" target="_blank">
			<i class="icon-font i-edit item-icon"></i>
			<span class="item-hover-text">问题反馈</span>
			</a>
		</div>
	</div>
</div>
</body>
</html>
