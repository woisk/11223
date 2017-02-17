@extends('layout.home')
@section('title', '重置密码')

@section('content')
<div class="container_2">

<div class="wrapper clearfix">
	<div class="wrap_box">
		<h3 class="notice">重置密码</h3>
		<p class="tips"><span class="gray f_r">重置成功! 请点<a class="orange bold" href="/login">这里</a>登录</span>请重置您的密码!为避免您的账号被盗,请务必将密码设置长度设置为6-32位!</p>
		<div class="box clearfix">
			<form action='/reset' method='post'>
				<table class="form_table f_l">
					<col width="260px" />
					<col />
					<tr>
            <th>新密码：</th>
            <td>
              <input class="gray" type="password" name='password' pattern="^\S{6,32}$" bind='repassword' alt='填写6-32个字符' />
              <label>填写新的登录密码，6-32个字符</label>
            </td>
          </tr>
					<tr>
            <th>确认新密码：</th>
            <td>
              <input class="gray" type="password" name='repassword' pattern="^\S{6,32}$" bind='password' alt='重复上面所填写的密码' />
              <label>重复上面所填写的密码</label>
            </td>
          </tr>
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$user->id}}">
					<tr><td></td><td><input class="submit_login" type="submit" value="重置密码" /><label></label></td></tr>
				</table>
			</form>
		</div>
	</div>
</div>

<script type='text/javascript'>
$(function(){
		$('input[name="callback"]').val("");
	$(".form_table input").focus(function(){$(this).addClass('current');}).blur(function(){$(this).removeClass('current');})

	//表单回填
	var formObj = new Form();
	formObj.init({"email":"","username":""});
});
</script>
</div>
@endsection
