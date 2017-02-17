@extends('layout.home')
@section('title', '订单确认')

@section('content')
<div class="container_2">
    <script type="text/javascript" charset="UTF-8" src="/tpl/txkt/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/tpl/txkt/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
<script type='text/javascript' src='/tpl/txkt/views/default/javascript/artTemplate/area_select.js'></script>
<script type='text/javascript' src='/tpl/txkt/views/default/javascript/orderFormClass.js'></script>
<script type='text/javascript'>
//创建订单表单实例
orderFormInstance = new orderFormClass();

//DOM加载完毕
jQuery(function(){
	//使用红包按钮
	$('#ticket_a').click(function()
	{
		//第一次打开时生成缓存数据
		if($.trim($('#ticket_show_box').text()) == '')
		{
			var ticketList = [];
			for(var index in ticketList)
			{
				var ticketHtml = template.render('ticketTrTemplate',{item:ticketList[index]});
				$('#ticket_show_box').append(ticketHtml);
			}
		}

		$(this).toggleClass('fold');
		$(this).toggleClass('unfold');
		$('#ticket_box').toggle('slow');
	});

	//初始化地域联动JS模板
	template.compile("areaTemplate",areaTemplate);

	//收货地址数据
	orderFormInstance.addressInit("");

	//支付方式
	orderFormInstance.paymentInit("");

	//商品价格
	orderFormInstance.goodsSum = "0";
});

/**
 * 生成地域js联动下拉框
 * @param name
 * @param parent_id
 * @param select_id
 */
function createAreaSelect(name,parent_id,select_id)
{
	//生成地区
	$.getJSON("/tpl/txkt/block/area_child",{"aid":parent_id,"random":Math.random()},function(json)
	{
		$('[name="'+name+'"]').html(template.render('areaTemplate',{"select_id":select_id,"data":json}));
	});
}

//[address]保存到常用的收货地址
function address_save()
{
	if(orderFormInstance.addressCheck())
	{
		$.getJSON('/tpl/txkt/simple/address_add',$('form[name="order_form"]').serialize(),function(content){
			if(content.data)
			{
				var addressLiHtml = template.render('addressLiTemplate',{"item":content.data});
				$('.addr_list').prepend(addressLiHtml);
				$('input:radio[name="radio_address"]:first').trigger('click');
			}
			orderFormInstance.addressSave();
		});
	}
}


//添加代金券
function add_ticket()
{
	var ticket_num = $('#ticket_num').val();
	var ticket_pwd = $('#ticket_pwd').val();

	if(ticket_num == '' || ticket_pwd == '')
	{
		alert('请填写卡号和密码');
		return '';
	}

	$.getJSON('/tpl/txkt/block/add_download_ticket',{"ticket_num":ticket_num,"ticket_pwd":ticket_pwd},function(content){
		if(content.isError == false)
		{
			is_success = true;
			$('[name="ticket_id"]').each(
				function()
				{
					if($(this).val() == content.data.id)
					{
						alert('代金券已经存在，不要重复添加');
						is_success = false;
					}
				}
			);

			if(is_success)
			{
				var ticketHtml = template.render('ticketTrTemplate',{item:content.data});
				$('#ticket_show_box').append(ticketHtml);
				$('[name="ticket_id"]').attr('checked',true);
				$('[name="ticket_id"]:last').trigger('click');
			}
			$('#ticket_num').val('');
			$('#ticket_pwd').val('');
		}
		else
		{
			alert(content.message);
		}
	});
}

//取消红包
function cancel_ticket()
{
	$('#ticket_a').trigger('click');
	$('[name="ticket_id"]').attr('checked',false);
	orderFormInstance.ticketPrice = 0;
	orderFormInstance.doAccount();
}


//选择代金券
function userTicket(seller_id,val)
{
	var sellerList = [0];
	var resultTicket = 0;
	for(var sid in sellerList)
	{
		if(seller_id == sid)
		{
			resultTicket = parseFloat(val) >= parseFloat(sellerList[sid]) ? parseFloat(sellerList[sid]) : parseFloat(val);
			orderFormInstance.ticketPrice = resultTicket;
			orderFormInstance.doAccount();
			return true;
		}
	}
	alert("请选择属于该商家的代金券");
	$('[name="ticket_id"]').attr('checked',false);
	return false;
}

//取消红包
function cancel_ticket()
{
	$('#ticket_a').trigger('click');
	$('[name="ticket_id"]').attr('checked',false);
	orderFormInstance.ticketPrice = 0;
	orderFormInstance.doAccount();
}


//选择代金券
function userTicket(seller_id,val)
{
	var sellerList = [0];
	var resultTicket = 0;
	for(var sid in sellerList)
	{
		if(seller_id == sid)
		{
			resultTicket = parseFloat(val) >= parseFloat(sellerList[sid]) ? parseFloat(sellerList[sid]) : parseFloat(val);
			orderFormInstance.ticketPrice = resultTicket;
			orderFormInstance.doAccount();
			return true;
		}
	}
	alert("请选择属于该商家的代金券");
	$('[name="ticket_id"]').attr('checked',false);
	return false;
}
</script>

<div class="wrapper clearfix">
	<div class="position mt_10">
		<span>您当前的位置：</span><a href="/tpl/txkt/"> 首页</a> » 填写报名信息
	</div>
	<div class="flow_step_no2 flow_cart">
		<ul>
			<li class="step_1">1、查看清单</li>
			<li class="step_2">2、填写核对学员信息</li>
			<li class="step_3">3、成功提交报名</li>
		</ul>
	</div>
	<form action='/order/confirm' method='post' name='order_form' callback='orderFormInstance.isSubmit();'>

		<div class="cart_box m_10">
			<div class="title">
				填写核对学员信息
			</div>
			<div class="cont">
				<!--地址管理 开始-->
				<div class="wrap_box">
					<h3>
					<span class="orange">收货信息</span>
					<a class="normal f12" href="/user/address" id="addressToggleButton" onclick="orderFormInstance.addressModToggle();">[更改默认地址]</a>
					</h3>
					<!--地址展示 开始-->
					<table class="form_table" id="address_show_box" style='display:none'>
					<col width="120"/>
					<col/>
					<tbody id="addressShowBox">
					</tbody>
					<!--收货地址展示模板-->
					<script type='text/html' id='addressShowTemplate'>
						<tr><th>收货人姓名：</th><td><%=accept_name%></td></tr>
						<tr><th>省份：</th><td><%=province_val%> <%=city_val%> <%=area_val%></td></tr>
						<tr><th>地址：</th><td><%=address%></td></tr>
						<tr><th>手机号码：</th><td><%=mobile%></td></tr>
						<tr><th>固定电话：</th><td><%=telphone%></td></tr>
						<tr><th>邮政编码：</th><td><%=zip%></td></tr>
						</script>
					</table>
					<!--地址展示 结束-->

					<!--收货表单信息 开始-->
          <div id="address_list" class="form_content m_10 node">
          		<table class="list_table" cellpadding="0" cellspacing="0" width="100%">
          			<colgroup><col width="120px">
          			<col width="230px">
          			<col width="120px">
          			<col width="120px">
          			<col width="120px">
          			<col>
          			</colgroup>
          			<thead>
          				<tr class="">
          					<th>收货人</th>
          					<th>所在地区</th>
          					<th>街道地址</th>
          					<th>电话/手机</th>
          					<th>邮编</th>
          					<th>操作</th>
          				</tr>
          			</thead>
          			<tbody>
                    @foreach($address as $k=>$v)
                    <!-- 显示默认地址 -->
                    @if($v->isdefault == 1)
                    <?php $address_id = $v->id; ?>
    			 					<tr class="item" aid="{{$v->id}}">
          						<td>{{$v->name}}</td>
          						<td>{{getAreaName($v->sheng)}} {{getAreaName($v->shi)}} {{getAreaName($v->xian)}}</td>
          						<td>{{$v->detail}}</td>
          						<td>{{$v->phone}}</td>
          						<td>{{$v->postcode}}</td>
          						<td>
          							<a class="blue" href="javascript:void(0)" onclick="form_back({&quot;id&quot;:&quot;13&quot;,&quot;user_id&quot;:&quot;16&quot;,&quot;accept_name&quot;:&quot;宋致峰&quot;,&quot;zip&quot;:&quot;111111&quot;,&quot;telphone&quot;:&quot;111111&quot;,&quot;country&quot;:null,&quot;province&quot;:&quot;430000&quot;,&quot;city&quot;:&quot;430100&quot;,&quot;area&quot;:&quot;430101&quot;,&quot;address&quot;:&quot;和平街一号&quot;,&quot;mobile&quot;:&quot;13141111111&quot;,&quot;default&quot;:&quot;0&quot;})">修改</a>|
          							<a class="blue" href="javascript:void(0)" onclick="delModel({link:'/tpl/txkt/ucenter/address_del/id/13'});">删除</a>
											</td>
          					</tr>
                    @endif
                    @endforeach
							</tbody>
          		</table>
          	</div>



				</div>

				<!--地址管理 结束-->
				<!--支付方式 开始-->
        <!-- 支付信息开始 -->
        <div class="wrap_box" id="paymentBox">
        <h3>
          <span class="orange">支付方式</span>
        </h3>

        <table width="100%" class="border_table" id="payment_form">
          <colgroup>
            <col width="200px">
            <col>
          </colgroup>
          <tbody>
            <tr>
              <th>
                <label>
                  <input class="radio" name="pay_type" alt="0" title="支付宝" type="radio" value="ali_pay">支付宝
                </label>
              </th>
              <td> 支付手续费：￥0</td>
            </tr>
            <tr>
            <th>
              <label>
                <input class="radio" name="pay_type" alt="0" title="微信扫码" type="radio" value="wei_sao">微信扫码

            <td> 支付手续费：￥0</td>
          </tr>
          <tr>
          <th>
            <label>
              <input class="radio" name="pay_type" alt="0" title="high_pay" type="radio" value="high_pay">high_pay

          <td> 支付手续费：￥0</td>
        </tr>
                    </tbody></table>

        <table class="form_table" id="payment_show_box" style="display:none">
          <colgroup><col width="120px">
          <col>
          </colgroup><tbody id="paymentShowBox"></tbody>
        </table>

        <!--支付方式模板-->
        <script type="text/html" id="paymentShowTemplate">
          <tr>
            <th>支付方式：</th>
            <td><%=name%></td>
          </tr>
        </script>

      </div>
        <!-- 支付信息结束 -->
				<!--购买清单 开始-->
				<div class="wrap_box">
					<h3><span class="orange">购买的课程</span></h3>
					<div class="cart_prompt f14 t_l m_10" style="display:none">
						<p class="m_10 gray">
							<b class="orange">恭喜，</b>您的订单已经满足了以下优惠活动！
						</p>
					</div>
					<table width="100%" class="cart_table t_c">
					<colgroup>
					<col width="115px"/>
					<col/>
					<col width="80px"/>
					<col width="80px"/>
					<col width="80px"/>
					<col width="80px"/>
					<col width="80px"/>
					</colgroup>
					<thead>
					<tr>
						<th>
							图片
						</th>
						<th>
							课程名称
						</th>
						<th>
							赠送积分
						</th>
						<th>
							单价
						</th>
						<th>
							优惠
						</th>
						<th>
							数量
						</th>
						<th class="last">
							小计
						</th>
					</tr>
					</thead>
					<tbody>
            <?php $total = 0;?>
            @if(!empty($carts))
            @foreach($carts as $k=>$v)
					<!-- 商品展示 开始-->
					<tr>
						<td>
							<img src="{{$v['pic']}}" width="66px" height="66px" alt="股市精讲研究直播" title="股市精讲研究直播"/>
						</td>
						<td class="t_l">
							<a href="/course/{{$v['goods']->id}}" class="blue">{{$v['goods']->title}}</a>
						</td>
						<td>
							0
						</td>
						<td>
							<b>￥{{$v['goods']->price}}</b>
						</td>
						<td>
							减￥0
						</td>
						<td>
							{{$v['num']}}
						</td>
						<td id="deliveryFeeBox_49_0_2">
							<b class="red2">￥{{$v['num'] * $v['goods']->price }}</b>
						</td>
            <?php $total += ($v['num'] * $v['goods']->price); ?>
					</tr>
          @endforeach
          @else
          <tr>
            <td colspan="8">购物车是空的哦~赶快选购你喜欢的课程吧!O(∩_∩)O~~</td>
          </tr>
          @endif
					<!-- 商品展示 结束-->
					</tbody>
					</table>
				</div>
				<!--购买清单 结束-->
			</div>
		</div>
    <div class="cart_box" id="amountBox">
  			<div class="cont_2">
  				<strong>结算信息</strong>
  				<div class="pink_box">
  					<p class="f14 t_l">课程总金额：<b>{{$total}}</b> - 代金券：<b name="ticket_value">0</b> + 税金：<b id="tax_fee">0</b> + 保价：<b id="protect_price_value">0</b> + 支付手续费：<b id="payment_value">0</b></p>

  					<a href="javascript:void(0)" id="ticket_a" class="fold" hidefocus="">
  						<b class="orange">暂不支持发票</b>
  					</a>



  				</div>
  				<hr class="dashed">
  				<div class="pink_box gray m_10">
  					<table width="100%" class="form_table t_l">
  						<colgroup><col width="220px">
  						<col>
  						<col width="250px">
  						</colgroup><tbody><tr>
                <!-- <input type="hidden" name="total" value="{{$total}}"> -->
  							<td class="t_r"><b class="price f14">应付总额：<span class="red2">￥<b id="final_sum">{{$total}}</b></span>元</b></td>
  						</tr>
  					</tbody></table>
  				</div>
  				<p class="m_10 t_r">
            {{csrf_field()}}
            <input type="hidden" name="price" value="{{$total}}">
            <input type="hidden" name="order_id" value="{{$request->id}}">
            <input type="hidden" name="address_id" value="{{$address_id}}">
            <input type="submit" value="提交报名" class="submit_order">
          </p>
  			</div>
  		</div>
	</form>
</div>
</div>
@endsection
