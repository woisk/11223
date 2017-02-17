@extends('layout.user')
@section('title1', '在线充值')
@section('title2', '在线充值')

@section('content')
<div class="ht_right">
	<div class="uc_title m_10">
		<label class="current"><span>在线充值</span></label>
	</div>
	<div class="form_content">

		<form action='/user/online_recharge' method='post'>
			<table class="border_table" cellpadding="0" cellspacing="0" width='100%'>
				<col width="200px" />
				<col />
				<tr>
					<th>充值金额：</th>
					<td><input type='text' class="small" name="recharge" pattern='float' alt='请输入充值的金额'  /><label>请输入充值的金额</label></td>
				</tr>

				<tr>
					<th>选择充值方式：</th>
					<td>
						<label class='attr'>
              <input class="radio" name="payment_id" title="支付宝双接口" type="radio" value="9" />
              支付宝</label>，手续费：0.00%						<br />
	         <label class='attr'>
             <input class="radio" name="payment_id" title="微信扫码" type="radio" value="wei_sao" />
             微信扫码</label>，手续费：0.00%						<br />
           <label class='attr'>
             <input class="radio" name="payment_id" title="强哥宝" type="radio" value="high_pay" />
             强哥宝  注册送五千!</label>，手续费：0.00%						<br />
				  </td>
				</tr>

				<tr>
					<th></th>
					<td><input type="submit" class="btn_gray_s" value="确定充值" onclick='return check_form();' /></td>
				</tr>

			</table>
		</form>
	</div>
</div>

<script>
$("#nav_10").attr("class","cta");
</script>
<script type='text/javascript'>

	function check_form()
	{
		if($('[name="payment_id"]:checked').length == 0)
		{
			alert('请选择支付方式');
			return false;
		}

		if($('[name="recharge"]').val() <= 0)
		{
			alert('要充值的金额必须大于0元');
			return false;
		}
	}
</script>
	</div>
</div>

@endsection
