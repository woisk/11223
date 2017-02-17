@extends('layout.user')
@section('title1', '账户余额')
@section('title2', '账户余额')

@section('content')
<div class="ht_right">

	<div class="uc_title m_10">
		<label class="current"><span><a href='/tpl/txkt/ucenter/account_log'>交易记录</a></span></label>
		<label><span><a href='/tpl/txkt/ucenter/withdraw'>提现申请</a></span></label>
	</div>

	<div class="prompt m_10">
		<p>账户余额：<b class="orange f14">￥{{getMoney(session('hid'))}}</b></p>
	</div>

	<div>
		<table class='list_table m_10' width='100%' cellspacing='0' cellpadding='0'>
			<col />
			<thead>
				<tr>
					<th>订单号</th><th>存入金额</th><th>支出金额</th><th>交易时间</th><th>支付方式</th><th>交易状态</th>
				</tr>
			</thead>
			<tbody>
          @foreach($money as $k=>$v)
          <tr>
            <td>{{$v->orders}}</td>
            <td>{{$v->nums}}</td>
            <td>0</td>
            <td>{{date('Y-m-d H:i:s',$v->time)}}</td>
            <td>
              @if($v->pay_type == 'high_pay')
              强哥宝
							@elseif($v->pay_type == '现金劵')
							现金劵
              @endif
            </td>
            <td>
              @if($v->status == 1)
              交易成功
              @else
              交易失败
              @endif</td>
          </tr>
          @endforeach
		  </tbody>
		</table>
		<div class='pages_bar'><a href='#' >首页</a><a href='#' >尾页</a><span>当前第1页/共0页</span></div>	</div>
</div>
<script>
$("#nav_9").attr("class","cta");
</script>
	</div>
</div>


@endsection
