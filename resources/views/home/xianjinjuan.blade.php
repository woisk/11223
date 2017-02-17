@extends('layout.user')
@section('title1', '我的现金劵')
@section('title2', '我的现金劵')

@section('content')
<div class="ht_right">
	<div class="order">
		<div class="uc_title m_10">
			<label class="current"><span>全部现金劵</span></label>
		</div>
		<table class="list_table m_10" cellpadding="0" cellspacing="0" width="100%">
			<colgroup>
			<col width="300px">
			<col width="140px">
			<col width="240px">
			<col width="140px">
			<col width="140px">
			<col>
			</colgroup>
			<thead><tr class=""><th>卡劵</th><th>面值</th><th>有效时间</th><th>状况</th><th>操作</th></tr></thead>
			<thead>
          @foreach($kajuan as $k=>$v)
          <tr>
            <td>{{$v->kajuanhao}}</td>
            <td>{{$v->mianzhi}}.00 元</td>
            <td>{{date('Y-m-d H:i:s',$v->guoqitime)}}</td>
            <td>@if($v->status==0)<a style="color:red">未使用</a>@else已使用@endif</td>
            <td><a style="color:red" href="/user/xianjinjuan/duihuan?id={{$v->id}}">@if($v->status==0)兑换现金</a>@else @endif</a></td>
          </tr>
          @endforeach
      </thead>
			</table>
	</div>
</div>
<script>
$("#nav_3").attr("class","cta");
</script>
	</div>
</div>

@endsection
