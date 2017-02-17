@extends('layout.user')
@section('title1', '修改密码')
@section('title2', '修改密码')

@section('content')
<div class="ht_right">
	<div class="order">
		<div class="uc_title m_10">
			<label><span><a href='/user/info'>个人资料</a></span></label>
			<label class="current"><span><a href='/tpl/txkt/ucenter/password'>修改密码</a></span></label>
		</div>
		<div class="order_list">
			<form novalidate="true" name="formPassword" method="post" action="/user/info/update">
				<div class="order_left">
					<ul class="password">
						<li><span>用户名</span>
              <input class="userInput" name="username" placeholder="请输入用户名"pattern="required" alt="请输入用户名"  type="text">
						</li>
						<li><span>新密码</span>
							<input class="userInput" name="password" placeholder="密码由英文字母、数字组成，长度6-32位" pattern="^\w{6,32}$" alt="密码由英文字母、数字组成，长度6-32位" bind="repassword" type="password">
						</li>
						<li><span>确认密码</span>
							<input class="userInput" name="repassword" placeholder="密码由英文字母、数字组成，长度6-32位" pattern="^\w{6,32}$" alt="密码由英文字母、数字组成，长度6-32位" bind="password" type="password">
						</li>
					</ul>
					<input name="act" value="act_edit_password" type="hidden">
					<div class="clear"></div>
					<div class="order_right coupons_right">
						<input class="btn coupons btn_save" value="保存修改" type="submit">
					</div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<script>
$("#nav_7").attr("class","cta");
</script>
	</div>
</div>

@endsection
