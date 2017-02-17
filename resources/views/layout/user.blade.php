<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('title1')_个人中心-腾讯课堂</title>
	<link rel="stylesheet" href="/homes/css/index.css" />
	<link rel="shortcut icon" href="/homes/favicon.ico" />
	<link rel="stylesheet" href="/homes/css/common.css" />
	<script type="text/javascript" charset="UTF-8" src="/homes/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/homes/js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/homes/js/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/homes/js/artdialog.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/homes/js/iframetools.js"></script>
	<link rel="stylesheet" type="text/css" href="/homes/css/default.css" />
	<script type="text/javascript" charset="UTF-8" src="/homes/js/validate.js"></script>
	<link rel="stylesheet" type="text/css" href="/homes/css/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/homes/js/arttemplate.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/homes/js/arttemplate-plugin.js"></script>
	<script type='text/javascript' src="/homes/js/common.js"></script>
	<script type='text/javascript' src='/homes/js/site.js'></script>
	<script type='text/javascript'>
		//用户中心导航条
		function menu_current()
		{
		    var current = "index";
		    if(current == 'consult_old') current='consult';
		    else if(current == 'isevaluation') current ='evaluation';
		    else if(current == 'withdraw') current = 'account_log';
		    var tmpUrl = "/user/current";
		    tmpUrl = tmpUrl.replace("current",current);
		    $('div.cont ul.list li a[href^="'+tmpUrl+'"]').parent().addClass("current");
		}
	</script>
</head>
<body>
	<?php
			$sessionid = session('hid');
			$sessionid = DB::table('users')->where('id',$sessionid)->first();
			// dd($sessionid);
	 ?>
<div class="mod-header__wrap js-unknown-role" id="js_main_nav">
	<div class="mod-header clearfix">
		<div id="js-mod-header-login" class="mod-header__wrap-login">
        <div class="mod-header_wrap-user" id="js_logout_outer">
					<i class="icon-red-circle" style="display:none;"></i>
	        <img src="/homes/picture/33c6424ed0cd4c5eb9c4c2f31fd20353.gif" class="mod-header__user-img js-avatar" width="30" height="30" onerror="this.src='{{$sessionid->profile}}'" />
          <p class="mod-header__user-name">
              <a href="/user" class="mod-header__user-operation">个人中心<i class="icon-select-down"></i></a>
          </p>
            <ul class="mod-header__user-operations">
	            	<li><a href="/user/info" class="mod-header__user-operation js-live-course">个人信息</a></li>
	            	<li><a href="/user/class" class="mod-header__user-operation js-video">我的课程</a></li>
	              <li><a href="/user/xianjinjuan" class="mod-header__user-operation js-coupon">现金劵</a></li>
	              <li><a href="/user/comment/list" class="mod-header__user-operation js-signup">我的评价</a></li>
	              <li><a href="/user/favorite" class="mod-header__user-operation js-fav">收藏</a></li>
	              <li><a href="/logout" class="js_logout mod-header__link-logout js-login-op">退出</a></li>
            </ul>
      	</div>
                  		<a id="js-help" href="/site/help_list" class="mod-header__link-help">帮助</a>
		</div>
    	<h1 class="mod-header-logo"><a href="/" title="腾讯课堂" class="mod-header__link-logo"></a></h1>
    	<div class="mod-header__wrap-search" id="js-searchbox">
      		<div class="mod-search">
            	<form method='get' action='/s'>
                    <input type='hidden' name='controller' value='site' />
                    <input type='hidden' name='action' value='search_list' />
                    <input class="mod-search__input" maxlength="38" type="text" name='word' autocomplete="off" value="输入关键字..." />
                    <input class="mod-search__btn-search i-search" type="submit" value="" onclick="checkInput('word','输入关键字...');" />
				</form>
                <!--自动完成div 开始-->
				<ul class="auto_list" style='display:none'></ul>
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
            <p class="apply-tt">学习平台</p>
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
										<?php $cates = getCates(0); ?>
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

<div class="ucenter container">
	<div class="position">
		您当前的位置： <a href="/">首页</a> » <a >@yield('title2')</a>
	</div>
	<div class="wrapper clearfix">
		<div class="ht_left">
			<ul>
				<li><a id="nav_1" href="/user">个人中心</a></li>
				<li><a id="nav_2" href="/user/class">我的课程</a></li>
				<li><a id="nav_3" href="/user/xianjinjuan">我的现金劵</a></li>
				<li><a id="nav_4" href="/user/favorite/list">我的收藏</a></li>
				<li><a id="nav_5" href="/user/comment/list">我的评价</a></li>
				<li><a id="nav_6" href="/user/address">收货信息</a></li>
				<li><a id="nav_7" href="/user/info">个人资料</a></li>
				<li><a id="nav_8" href="/user/jifen">我的积分</a></li>
				<li><a id="nav_9" href="/user/account_log">帐户余额</a></li>
				<li><a id="nav_10" href="/user/online_recharge">在线充值</a></li>
				<li><a id="nav_11" href="/logout">退出</a></li>
			</ul>
		</div>

@section('content')
		<div class="ht_right m_l">
			<div class="basic">
				<div class="basic_text">
					<div class="basic_left">
						<dl>
							<dt>
												<img id="user_ico_img" src="picture/372470f56e684865b2e4f1a587f85e79.gif" onerror="this.src='/tpl/txkt/views/default/skin/default/images/front/user_ico.gif'" height="100" width="100" />
							</dt>
							<dd>
								<h4>cnhack</h4>
								<p><span class="sp">余额：</span><em>￥0.00</em></p>
							</dd>
							<dd><p>等级：<strong>注册用户</strong></p>
								<p><a href="/tpl/txkt/ucenter/password">修改密码</a></p>
							</dd>
						</dl>
						<span><a class="blue" href="javascript:select_ico();">修改头像</a></span>
						<span>优惠券：<a href="javascript:;">0张</a></span>
						<span><a href="/tpl/txkt/simple/logout" class="TC" rel="nofollow">退出</a></span>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
		    </div>
			<div class="order">
				<div class="uc_title m_10">
					<label class="current"><span><a href='javascript:;'>最新报名</a></span></label>
					<label><span><a href='/tpl/txkt/ucenter/evaluation'>待评价课程</a></span></label>
				</div>
				<div class="m_10">
				<table class="list_table" cellpadding="0" cellspacing="0" width="100%">
					<colgroup><col width="200px">
		            <col width="200px">
					</colgroup>
					<tbody>
						<tr class="">
							<th>报名编号</th><th>报名日期</th><th>学员姓名</th><th>支付方式</th><th>总金额</th><th>学习状态</th>
						</tr>
									</tbody>
				</table>
			</div>
			<div class="clear"></div><div class="index_more"><a href="/tpl/txkt/ucenter/order">更多课程&gt;&gt;</a></div>
			</div>
		</div>

		<script>
			$("#nav_1").attr("class","cta");
		</script>

		<script type='text/javascript'>
		//选择头像
		function select_ico()
		{
				art.dialog.open('/tpl/txkt/block/photo_upload?callback=%2Ftpl%2Ftxkt%2Fucenter%2Fuser_ico_upload',
			{
				'id':'user_ico',
				'title':'设置头像',
				'ok':function(iframeWin, topWin)
				{
					iframeWin.document.forms[0].submit();
					return false;
				}
			});
		}

		//头像上传回调函数
		function callback_user_ico(content)
		{
			var content = eval(content);
			if(content.isError == true)
			{
				alert(content.message);
			}
			else
			{
				$('#user_ico_img').attr('src',content.data);
			}
			art.dialog({id:'user_ico'}).close();
		}
		</script>

			</div>
		</div>
@show

<div class="mod-footer mod-footer_dark">
	<p>	Copyright © 2015 Tencent. All Rights Reserved.</p><p>	深圳市腾讯计算机系统有限公司 版权所有 | <a target="_blank">腾讯课堂服务协议</a></p></div>

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
        	<a class="item-link-block js-feedback-link" href="javascript:;" target="_blank">
            	<i class="icon-font i-edit item-icon"></i>
            	<span class="item-hover-text">问题反馈</span>
           	</a>
		</div>
	</div>
</div>
<script type='text/javascript'>
//DOM加载完毕后运行
$(function()
{
	$(".tabs").each(function(i){
	    var parrent = $(this);
		$('.tabs_menu .node',this).each(function(j){
			var current=".node:eq("+j+")";
			$(this).bind('click',function(event){
				$('.tabs_menu .node',parrent).removeClass('current');
				$(this).addClass('current');
				$('.tabs_content>.node',parrent).css('display','none');
				$('.tabs_content>.node:eq('+j+')',parrent).css('display','block');
			});
		});
	});

	//隔行换色
	$(".list_table tr:nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);

	menu_current();

	$('input:text[name="word"]').bind({
		keyup:function(){autoComplete('/site/autoComplete','/site/search_list/word/@word@','');}
	});

		$('input:text[name="word"]').val("输入关键字...");

	//购物车div层
	$('.mycart').hover(
		function(){
			showCart('/simple/showCart');
		},
		function(){
			$('#div_mycart').hide('slow');
		}
	);
});
</script>
</body>
</html>
