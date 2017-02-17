@extends('layout.user')
@section('title1', '首页')
@section('title2', '个人中心')

@section('content')
<div class="ht_right m_l">
	<div class="basic">
		<div class="basic_text">
			<div class="basic_left">
				<dl>
					<dt>
						<img id="user_ico_img" src="{{$users->profile}}" onerror="this.src='/tpl/txkt/views/default/skin/default/images/front/user_ico.gif'" height="100" width="100" />
					</dt>
					<dd>
						<h4>{{$users->username}}</h4>
						<p><span class="sp">余额：</span><em>￥{{getMoney($users->id)}}</em></p>
					</dd>
					<dd><p>等级：<strong>注册用户</strong></p>
						<p><a href="/user/info/edit">修改密码</a></p>
					</dd>
				</dl>
				<span><a class="blue" href="javascript:select_ico();">修改头像</a></span>
				<span>现金劵：<a href="javascript:;">0张</a></span>
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
		art.dialog.open('/user/profile',
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
@endsection
