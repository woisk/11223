//百度分享
var cur_bd_Text,cur_bd_Desc,cur_bd_Url;
window._bd_share_config={
    common:{
        onBeforeClick:function(cmd,config){
            var new_config={
                bdText:cur_bd_Text,
                bdDesc:cur_bd_Desc,
                bdUrl:cur_bd_Url
            };
            return new_config;
        }
    },
    share:[{
        "bdSize":16
    }]
};
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
$(document).ready(function(){
    $('.bdsharebuttonbox a').mouseover(function(){
        cur_bd_Text=$(this).parent().attr('text');
        cur_bd_Desc=$(this).parent().attr('desc');
        cur_bd_Url=$(this).parent().attr('url');
        return false;
    });
});


//关闭product购物车弹出的div
function closeCartDiv()
{
	$('#product_myCart').hide('slow');
	$('.submit_join').removeAttr('disabled','');
}

//商品移除购物车
function removeCart(urlVal,goods_id,type)
{
	var goods_id = parseInt(goods_id);

	$.getJSON(urlVal,{goods_id:goods_id,type:type},function(content){
		if(content.isError == false)
		{
			$('[name="mycart_count"]').html(content.data['count']);
			$('[name="mycart_sum"]').html(content.data['sum']);
		}
		else
		{
			alert(content.message);
		}
	});
}

//添加收藏夹
function favorite_add_ajax(urlVal,goods_id,obj)
{
	$.getJSON(urlVal,{goods_id:goods_id,nocache:((new Date()).valueOf())},function(content){
		alert(content.message);
	});
}

//寄存购物车[ajax]
function deposit_ajax(urlVal)
{
	$.getJSON(urlVal,{is_ajax:'1'},function(content){
		if(content.isError == false)
		{
			alert(content.message);
		}
		else
		{
			alert(content.message);
		}
	});
}

//购物车展示
function showCart(urlVal)
{
	$.getJSON(urlVal,{sign:Math.random()},function(content)
	{
		var cartTemplate = template.render('cartTemplete',{'goodsData':content.data,'goodsCount':content.count,'goodsSum':content.sum});
		$('#div_mycart').html(cartTemplate);
		$('#div_mycart').show();
	});
}

//自动完成
function autoComplete(ajaxUrl,linkUrl,minLimit)
{
	var minLimit = minLimit ? parseInt(minLimit) : 2;
	var maxLimit = 10;
	var keywords = $.trim($('input:text[name="word"]').val());

	//输入的字数通过规定字数
	if(keywords.length >= minLimit && keywords.length <= maxLimit)
	{
		$.getJSON(ajaxUrl,{word:keywords},function(content){

			//清空自动完成数据
			$('.auto_list').empty();

			if(content.isError == false)
			{
				for(var i=0; i < content.data.length; i++)
				{
					var searchUrl = linkUrl.replace('@word@',content.data[i].word);
					$('.auto_list').append('<li onclick="event_link(\''+searchUrl+'\')" style="cursor:pointer"><a href="javascript:void(0)">'+content.data[i].word+'</a>约'+content.data[i].goods_nums+'个结果</li>');
					//鼠标经过效果
					$('.auto_list li').bind("mouseover",
						function()
						{
							$(this).addClass('hover');
						}
					);
					$('.auto_list li').bind("mouseout",
						function()
						{
							$(this).removeClass('hover');
						}
					);
				}
				$('.auto_list').show();
			}
			else
			{
				$('.auto_list').hide();
			}
		});
	}
	else
	{
		$('.auto_list').hide();
	}
}

//输入框
function checkInput(para,textVal)
{
	var inputObj = (typeof(para) == 'object') ? para : $('input:text[name="'+para+'"]');

	if(inputObj.val() == '')
	{
		inputObj.val(textVal);
	}
	else if(inputObj.val() == textVal)
	{
		inputObj.val('');
	}
}

//dom载入成功后开始操作
jQuery(function()
{
	
	bann_roll();
	
	$("#js-jump-container").hide();
	$(window).scroll(function(){ 
		if ($(window).scrollTop()>100){ 
			$("#js-jump-container").show();
		} 
		else{ 
			$("#js-jump-container").hide(); 
		} 
	});
	
	$("#js-jump-container").click(function(){
		$('body,html').animate({scrollTop:0},500); 
		return false; 
	});
	
	
	$("#js_share").hover(function(){
		
		$(this).addClass('mod-course-banner__share-expand');
	
	},function(){
		
		$(this).removeClass('mod-course-banner__share-expand');
		
	});
	
	
	var allsortLateCall = new lateCall(200,function(){$('#div_allsort').show();});
	//商品分类
	$('.allsort').hover(
		function(){
			allsortLateCall.start();
		},
		function(){
			allsortLateCall.stop();
			$('#div_allsort').hide();
		}
	);
	$('.sortlist li').each(
		function(i)
		{
			$(this).hover(
				function(){
					$(this).addClass('hover');
					$('.sublist:eq('+i+')').show();
				},
				function(){
					$(this).removeClass('hover');
					$('.sublist:eq('+i+')').hide();
				}
			);
		}
	);

	//排行,浏览记录的图片
	$('#ranklist li').hover(
		function(){
			$(this).addClass('current');
		},
		function(){
			$(this).removeClass('current');
		}
	);

	//自动完成input框 事件绑定
	var tmpObj = $('input:text[name="word"]');
	var defaultText = tmpObj.val();
	tmpObj.bind({
		focus:function(){checkInput($(this),defaultText);},
		blur :function(){checkInput($(this),defaultText);}
	});
});


//图片滚动
function bann_roll(){
	var sWidth = $("#js_banner").height();
	var len = $("#js_banner ul li").length;
	var index = 0;
	var picTimer;
	
	var btn = "<div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='mod_btn_pre icon-font i-v-left'></div><div class='mod_btn_next icon-font i-v-right'></div>";
	$("#js_banner").append(btn);
	
	$("#js_banner .btn span").css("opacity",0.4).mouseenter(function() {
		index = $("#js_banner .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseenter");
	
	$("#js_banner .mod_btn_pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});
	
	$("#js_banner .mod_btn_next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});
	
	$("#js_banner ul").css("height",sWidth * (len));
	
	$("#js_banner").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); 
	}).trigger("mouseleave");
	
	function showPics(index){
		var nowLeft = -index*sWidth;
		$("#js_banner ul").stop(true,false).animate({"top":nowLeft},300);
		$("#js_banner .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300);
	}
    
};

//teb切换效果
function cutover(id,etype){
	var tabContainer = $("#"+id).find(".tabContainer");
	var panelContainer = $("#"+id).find(".panelContainer");	
	tabContainer.find("ul>li").each(function(i,e){
		if (etype=="1"){
			$(e).hover(function(){
				tabContainer.find("ul>li").removeClass("current");
				$(e).addClass("current");
				panelContainer.children("div").hide();
				panelContainer.children("div").eq(i).show();
			});
		}else{
			$(e).click(function(){
				tabContainer.find("ul>li").removeClass("current");
				$(e).addClass("current");
				panelContainer.children("div").hide();
				panelContainer.children("div").eq(i).show();
			});
				
		}
	});
};

