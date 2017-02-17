@extends('layout.user')
@section('title1', '我的积分')
@section('title2', '我的积分')

@section('content')
<div class="ht_right">
	<div class="uc_title m_10">
		<label class="current"><span>个人积分</span></label>
	</div>
	<div class="box m_10">
		<p class="text" style="text-align:left;">您当前的积分：<b class="red">{{getJifen(session('hid'))}}</b>分</p>
	</div>

	<div class="form_content m_10">
		<div class="uc_title2 m_10">
			<strong class="f_l">积分兑换</strong>
		</div>
		<div class="cont">
			<form action='/tpl/txkt/ucenter/trade_ticket' method='post'>
				<table class="form_table" width="100%" cellpadding="0" cellspacing="0">
					<col width="10px" />
					<col width="520px" />
					<col />
										<tr><td></td><td colspan="2"><label>名称:男神一枚!</label></td></tr>
                    <tr><td></td><td colspan="2"><img src="/homes/images/liyan.jpg" alt="" style="width:200px;height:160px"></td></tr>
                    <tr><td></td><td colspan="2"><p class="text" style="text-align:left;">所需积分:<b class="red">999999</b>分</p></td></tr>
                    <tr><td></td><td colspan="2"><input type="submit" class="userBtn" value="兑换礼品" /></td></tr>
				</table>
			</form>
		</div>
	</div>
	<div class="prompt m_10">
		<p><strong>提示：</strong></p>
		<p class="indent">1、即今日起!凡是使用<a style="color:red">强哥宝</a>平台充值的用户!冲1000RMB送1000积分!冲10000送15000积分!</p>
		<p class="indent">2、积分仅限本ID使用，不能折算为现金、也不能再次兑换为积分</p>
    <p class="indent">3、充值积分可积累兑换平台任何活动时商品!</p>
	</div>
</div>

<script>
$("#nav_8").attr("class","cta");
</script>

<script type='text/javascript'>
	var FromObj = new Form('point_history');
	FromObj.init
	({
		'history_time':''
	});
</script>
	</div>
</div>

@endsection
