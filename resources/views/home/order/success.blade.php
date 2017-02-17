@extends('layout.home')
@section('title', '订单状态')

@section('content')
<div class="wrapper clearfix container">
	<div class="wrap_box">
		<div class="error box clearfix">
			<table class="form_table prompt_3">
				<colgroup>
					<col width="320px" />
					<col />
				</colgroup>

				<tbody>
					<tr>
						<th><img src="/homes/images/success_msg_icon.gif" width="48px" height="51px" /></th>
						<td>
							<strong class="f14">
							操作成功!							</strong>
						</td>
					</tr>

					<tr>
						<th></th>
						<td>
							您现在可以去：
						<a class="blue" href="/cart">继续操作 >></a>

            <a class="blue" href="/user">个人中心 >></a>


							<a class="blue" href="/">网站首页 >></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
