@extends('layout.home')
@section('title', '购物车')

@section('content')
<style media="screen">
  button.btn_continue {
    display: inline-block;
    width: 105px;
    height: 36px;
    margin-right: 10px;
    background: #188EEE;
    color: #FFF;
    text-align: center;
    line-height: 36px;
    font-size: 16px;
  }
  button.btn_pay {
    display: inline-block;
    width: 128px;
    height: 36px;
    margin-right: 20px;
    background: #FF6900;
    color: #FFF;
    text-align: center;
    line-height: 36px;
    font-size: 16px;
}
</style>
<div class="container_2">
    <div class="wrapper clearfix">
	<div class="position mt_10"> <span>您当前的位置：</span> <a href="/"> 首页</a> » 学习清单</div>
	<div class="flow_step_no1 flow_cart">
		<ul>
			<li class="step_1">1、查看清单</li>
			<li class="step_2">2、填写核对学员信息</li>
			<li class="step_3">3、成功提交报名</li>
		</ul>
	</div>

	<div id="cart_prompt" class="cart_prompt f14 t_l" style="display:none">
		<p class="m_10 gray"><b class="orange">恭喜，</b>您的订单已经满足了以下优惠活动！</p>
			</div>

	<table width="100%" class="cart_table m_10">
		<col width="115px" />
		<col />
		<col width="80px" />
		<col width="80px" />
		<col width="80px" />
		<col width="80px" />
		<col width="80px" />
		<col width="80px" />
		<caption>查看学习清单</caption>
		<thead>
			<tr>
        <th>图片</th>
        <th>商品名称</th>
        <th>赠送积分</th>
        <th>单价</th>
        <th>优惠</th>
        <th>数量</th>
        <th>小计</th>
        <th class="last">操作</th>
      </tr>
		</thead>
    <?php $total = 0;?>
  <form class="" action="/order/add" method="post">

  	<tbody>
        @if(!empty($carts))
        @foreach($carts as $k=>$v)
				<tr>
          <!-- 商品ID -->
          <input type="hidden" name="data[{{$k}}][id]" value="{{$v['goods']->id}}">
  				<td><img src="{{$v['pic']}}" width="66px" height="66px" alt="{{$v['goods']->title}}" title="{{$v['goods']->title}}" /></td>
  				<td class="t_l">
  					<a href="/course/{{$v['goods']->id}}" class="blue">{{$v['goods']->title}}</a>
					</td>
  				<td>0</td>
  				<td><b>￥{{$v['goods']->price}}</b></td>
  				<td>减￥0</td>
  				<td>
  					<div class="num">
              <a class="add"  id="numjia"> + </a>
              <input class="gray_t" type="text" id="buyNums" name="data[{{$k}}][num]" onblur="checkBuyNums();" value="{{$v['num']}}" maxlength="5" />
              <a class="reduce" id="numjian"> - </a>
  					</div>
  				</td>
  				<td>￥<b class="red2" id="sum_49_0">{{$v['num'] * $v['goods']->price }}</b></td>
          <?php $total += ($v['num'] * $v['goods']->price); ?>
  				<td><a href="/cart/del?goodsid={{$v['goods']->id}}">删除</a></td>
			</tr>
      @endforeach
      @else
      <tr>
        <td colspan="8">购物车是空的哦~赶快选购你喜欢的课程吧!O(∩_∩)O~~</td>
      </tr>
      @endif
			<tr class="stats">
				<td colspan="8">
					<span>商品总重量：<b id='weight'>0</b>g</span>
          <span>商品总金额：￥<b id='origin_price'>0</b> - 商品优惠：￥<b id='discount_price'>0</b> - 促销活动优惠：￥<b id='promotion_price'>0</b></span><br />
					金额总计（不含运费）：￥<b class="orange" id='sum_price'>{{$total}}</b>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" class="t_l">
					<a class="del" href="javascript:void(0);" onclick="delModel({msg:'确定要清空学习清单么？',link:'/cart/delModel'});">清空学习清单</a>
				</td>
				<td colspan="6" class="t_r">
          {{csrf_field()}}
					<button class="btn_continue">查看课程</button>
					<button class="btn_pay">提交报名</button>
				</td>
			</tr>
		</tfoot>
  </form>
	</table>

      <!-- 商品加减 -->
      <script type="text/javascript">
        $('#numjia').click(function(){
          var num=parseInt($('#buyNums').val());
          if(num){
            num=num+1;
          }
          console.log(num);
          $('#buyNums').val(num);
        });
        $('#numjian').click(function(){
          var num=parseInt($('#buyNums').val());
          if(num<=1){
            num=1;
          }else{
            num=num-1;
          }
          console.log(num);
          $('#buyNums').val(num);
        });



      </script>
	<div class="salide_box">
		<div class="box">
			<div class="title">热门商品推荐</div>
			<ul class="lists_hot">
				<li>
					<a href="/tpl/txkt/site/products/id/59">
					<img src="http://www.8sk.cn/tpl/txkt/pic/thumb/img/upload@_@2015@_@08@_@06@_@20150806163901643.jpg/w/440/h/248" width="172" height="159" /></a>
					<a href="/tpl/txkt/site/products/id/59" class="txt_jq">初升高物理衔接课</a><b>￥0.00</b>
					<input type="submit" class="btn_cart2" onclick="window.location.href='/tpl/txkt/simple/joinCart/link/cart/type/goods/goods_id/59';" value="加入购物车">
				</li>
		</ul>
		</div>
	</div>

</div>

<script type='text/javascript'>
//购物车数量改动计算
function cartCount(obj)
{
	var countInput = $('#count_'+obj.goods_id+'_'+obj.product_id);
	var countInputVal = parseInt(countInput.val());
	var oldNum = countInput.data('oldNum') ? countInput.data('oldNum') : obj.count;

	//商品数量大于1件
	if(isNaN(countInputVal) || (countInputVal <= 0))
	{
		alert('购买的数量必须大于1件');
		countInput.val(1);
		countInput.change();
	}
	//商品数量小于库存量
	else if(countInputVal > parseInt(obj.store_nums))
	{
		alert('购买的数量不能大于此商品的库存量');
		countInput.val(parseInt(obj.store_nums));
		countInput.change();
	}
	else
	{
		var diff = parseInt(countInputVal) - parseInt(oldNum);
		if(diff == 0)
		{
			return;
		}

		//修改按钮状态
		toggleSubmit("lock");

		//更新购物车中此商品的数量
		$.getJSON("/tpl/txkt/simple/joinCart",{"product_id":obj.product_id,"goods_id":obj.goods_id,"goods_num":diff,"random":Math.random()},function(content){
			if(content.isError == true)
			{
				alert(content.message);
				countInput.val(1);
				countInput.change();

				//修改按钮状态
				toggleSubmit("open");
			}
			else
			{
				var goodsId   = [];
				var productId = [];
				var num       = [];
				$('[id^="count_"]').each(function(i)
				{
					var idValue = $(this).attr('id');
					var dataArray = idValue.split("_");

					goodsId.push(dataArray[1]);
					productId.push(dataArray[2]);
					num.push(this.value);
				});
				countInput.data('oldNum',countInputVal);
				$.getJSON("/tpl/txkt/simple/promotionRuleAjax",{"goodsId":goodsId,"productId":productId,"num":num,"random":Math.random()},function(content){
					if(content.promotion.length > 0)
					{
						$('#cart_prompt .indent').remove();

						for(var i = 0;i < content.promotion.length; i++)
						{
							$('#cart_prompt').append('<p class="indent blue">'+content.promotion[i].plan+'，'+content.promotion[i].info+'</p>');
						}
						$('#cart_prompt').show();
					}
					else
					{
						$('#cart_prompt .indent').remove();
						$('#cart_prompt').hide();
					}

					/*开始更新数据*/
					$('#weight').html(content.weight);
					$('#origin_price').html(content.sum);
					$('#discount_price').html(content.reduce);
					$('#promotion_price').html(content.proReduce);
					$('#sum_price').html(content.final_sum);
					$('#sum_'+obj.goods_id+'_'+obj.product_id).html((obj.sell_price * countInputVal).toFixed(2));

					//修改按钮状态
					toggleSubmit('open');
				});
			}
		});
	}
}

//增加商品数量
function cart_increase(obj)
{
	//库存超量检查
	var countInput = $('#count_'+obj.goods_id+'_'+obj.product_id);
	if(parseInt(countInput.val()) + 1 > parseInt(obj.store_nums))
	{
		alert('购买的数量大于此商品的库存量');
	}
	else
	{
		countInput.val(parseInt(countInput.val()) + 1);
		countInput.change();
	}
}

//减少商品数量
function cart_reduce(obj)
{
	//库存超量检查
	var countInput = $('#count_'+obj.goods_id+'_'+obj.product_id);
	if(parseInt(countInput.val()) - 1 <= 0)
	{
		alert('购买的数量必须大于1件');
	}
	else
	{
		countInput.val(parseInt(countInput.val()) - 1);
		countInput.change();
	}
}



//锁定提交
function toggleSubmit(isOpen)
{
	isOpen == 'open' ? $('.btn_pay').val('ok') : $('.btn_pay').val('wait');
}

/**
 * 读取购物车
 */
function deposit_cart_get()
{
	$.getJSON('/tpl/txkt/simple/deposit_cart_get',{"random":Math.random()},function(json)
	{
		if(json.isError == 1)
		{
			alert('读取购物车失败');
			return;
		}
		//页面刷新
		window.location.reload();
	});
}
</script>

<!--滑动门-->
<link rel="stylesheet" type="text/css" href="/tpl/txkt/views/default/javascript/jquery.bxSlider/jquery.bxslider.css" />
<script type="text/javascript" src="/tpl/txkt/views/default/javascript/jquery.bxSlider/jquery.bxSlider.min.js"></script>
<script type="text/javascript">
jQuery(function(){
	$('#scrollpic').bxSlider({controls:false,minSlides: 5,slideWidth: 180,maxSlides: 5,pager:false});
});
</script>
</div>

@endsection
