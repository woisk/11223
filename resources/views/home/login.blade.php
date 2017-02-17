@extends('layout.home')
@section('title', '用户登录')

@section('content')
<div class="container_2">
    <div class="wrapper clearfix">
	<div class="wrap_box">
		<h3 class="notice">已注册用户，请登录</h3>
		<p class="tips">欢迎来到我们的网站，如果您已是本站会员请登录</p>
		<div class="content_login">
			<div class="coLoginBody">
				<div class="coLogin_title">
					<p><span>请登录</span>还没有账号？<a href="/register">立即注册</a></p>
				</div>
				<form action='/login' method='post'>
					<table class="form_table f_l" width="515" style="margin-left:50px;">
						<colgroup><col width="100px">
						<col>
          </colgroup><tbody><tr><th>用户名：</th><td><input class="gray" name="username" value="" pattern="required" alt="填写用户名" type="text"></td></tr>
						<tr><th>登录密码：</th><td><input class="gray" name="password" pattern="^\S{6,32}$" alt="填写密码" type="password"></td></tr>
						<tr class="low"><td></td>
							<td>
								<label class="attr"><input class="radio" name="remember" value="1" type="checkbox">记住登录名</label>
								<label class="attr"><a class="link pwd" href="/forget">忘记密码</a></label>
							</td>
						</tr>
						<tr><td></td><td><input class="submit_login" value="登录" type="submit"></td></tr>
					</tbody></table>
				</form>
			 </div>
			 <div class="coLogin_bottom">
				<p>您也可以使用合作网站账号登录</p>
				<ul>
                                <a href="javascript:oauthlogin('2');" id="imgLink"><img src='/homes/picture/qq.gif' /></a>
                                <a href="javascript:oauthlogin('3');" id="imgLink"><img src='/homes/picture/sina.gif' /></a>
                				</ul>
			</div>
		</div>
	</div>
</div>

<script type='text/javascript'>

//DOM加载结束
$(function(){
	//回调地址设置
	$('input[name="callback"]').val("");
	$('.reg_btn').attr('href',"/tpl/txkt/simple/reg?callback=");

	$(".form_table input").focus(function(){$(this).addClass('current');}).blur(function(){$(this).removeClass('current');})
});

//多平台登录
function oauthlogin(oauth_id)
{
	$.getJSON('/tpl/txkt/simple/oauth_login',{"id":oauth_id,"callback":""},function(content){
		if(content.isError == false)
		{
			window.location.href = content.url;
		}
		else
		{
			alert(content.message);
		}
	});
}

//下一步操作
function next_step()
{
	var step_val = $('[name="next_step"]:checked').val();
	if(step_val == 'acount')
	{
				window.location.href = '/tpl/txkt/tourist/yes';
	}
	else if(step_val == 'reg')
	{
		window.location.href = '/tpl/txkt/simple/reg?callback=';
	}
}
</script>

</div>
@endsection
