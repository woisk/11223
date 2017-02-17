@extends('layout.user')
@section('title1', '个人资料')
@section('title2', '个人资料')

@section('content')
<script type="text/javascript" charset="UTF-8" src="js/arttemplate.js"></script><script type="text/javascript" charset="UTF-8" src="js/arttemplate-plugin.js"></script>
<script type='text/javascript' src='js/area_select.js'></script>

<div class="ht_right f_r">

	<div class="uc_title m_10">
		<label class="current"><span><a href='/tpl/txkt/ucenter/info'>个人资料</a></span></label>
		<label><span><a href='/user/info/edit'>修改密码</a></span></label>
	</div>

	<div class="form_content m_10">
		<dl class="userinfo_box clearfix">
			<dt>
								<a class="ico" href="javascript:void(0);">
					<img src="{{$users->profile}}" id="user_ico_img" onerror="this.src='/tpl/txkt/views/default/skin/default/images/front/user_ico.gif'" height="96" width="96"></a>
				<a href="javascript:select_ico();">修改头像</a>
			</dt>
			<dd>
				<table class="form_table" cellpadding="0" cellspacing="0" width="100%">
					<colgroup><col width="120px">
					<col>
					</colgroup><tbody><tr>
						<th>登录名：</th><td>{{$users->username}}</td>
					</tr>
					<tr>
						<th>邮箱：</th>
						<td>{{$users->email}}</td>
					</tr>
					<tr>
						<th>会员等级：</th><td></td>
					</tr>
				</tbody></table>
			</dd>
		</dl>
	</div>

	<div class="add_adds" style="display:block;" id="adress_add">
		<form novalidate="true" action="/user/info/editdetail" method="post" name="user_info">
			<table class="form_table" cellpadding="0" cellspacing="0" width="100%">
				<colgroup><col width="120px">
				<col>
				</colgroup><tbody><tr>
					<th><span class="red">*</span> 姓名：</th><td><input class="normal" name="zsname" pattern="required"  type="text"></td>
				</tr>
				<tr>
					<th><span class="red">*</span> 性别：</th>
					<td class="tdSex">
						<label class="attr"><input name="sex" value="1" class="rad" type="radio">男</label>
						<label class="attr"><input name="sex" value="2" class="rad" checked="checked" type="radio">女</label>
					</td>
				</tr>
				<tr>
					<th><span class="red">*</span>出生日期：</th>
					<td>
						<select name='year' pattern='required' class="sel"></select>
						<select name='month' pattern='required' class="sel"></select>
						<select name='day' pattern='required' class="sel"></select>
					</td>
				</tr>
				<tr>
					<th><span class="red">*</span> 所在地区：</th>
					<td>
              <select name="sheng" id="prov" child="city,area" onchange="areaChangeCallback(this);"
              class="sel">
                  <option value="{{$userdetail->sheng}}">{{getAreaName($userdetail->sheng)}}</option>
              </select>

							<select name="shi" id="city" child="area" parent="province" value="{{$userdetail->shi}}" onchange="areaChangeCallback(this);"
              class="sel"><option value="{{$userdetail->shi}}">{{getAreaName($userdetail->shi)}}</option>
              </select>

							<select name="xian" id="xian" parent="city" pattern="required" value="{{$userdetail->xian}}" class="sel"><option value="{{$userdetail->xian}}">{{getAreaName($userdetail->xian)}}</option>
              </select>
          </td>
				</tr>
				<tr>
					<th><span class="red">*</span> 联系地址：</th>
					<td><input class="normal" name="detail" pattern="required" alt="请填写联系地址" type="text"></td>
				</tr>
				<tr>
					<th><span class="red">*</span> 手机号码：</th>
					<td><input class="normal" name="phone" pattern="phone" alt="请填写正确的手机号码" type="text"></td>
				</tr>
				<tr>
					<th>邮编：</th>
					<td><input class="normal" name="postcode" pattern="zip"  empty alt="请填写正确的邮政编码" type="text"></td>
				</tr>
				<tr>
					<th>固定电话：</th>
					<td><input class="normal" name="telephone" pattern="phone"  empty alt="请填写正确的固定电话" type="text"></td>
				</tr>
				<tr>
					<th>QQ：</th>
					<td><input class="normal" name="qq" pattern="qq"  empty alt="请填写正确的QQ号" type="text"></td>
				</tr>
				<tr>
					<th>MSN：</th>
					<td><input class="normal" name="msn" pattern="email"  empty alt="请填写正确的MSN号" type="text"></td>
				</tr>
				<tr><th></th><td><label><input value="保存基本信息" class="userBtn" type="submit"></label></td></tr>
			</tbody></table>
		</form>
	</div>
</div>

<script>
$("#nav_7").attr("class","cta");
</script>

<script type='text/javascript'>

//修改头像
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

//出生日期
function dateSelectInit()
{
	var yearHtml = '<option value="">请选择</option>';
	for(var year=2010;year>=1940;year--)
	{
		yearHtml+= '<option value="'+year+'">'+year+'</option>';
	}

	var monthHtml = '<option value="">--</option>';
	for(var month=12;month>=1;month--)
	{
		if(month < 10) month = '0' + month;
		monthHtml+= '<option value="'+month+'">'+month+'</option>';
	}

	var dayHtml = '<option value="">--</option>';
	for(var day=31;day>=1;day--)
	{
		if(day < 10) day = '0' + day;
		dayHtml+= '<option value="'+day+'">'+day+'</option>';
	}

	$('[name="year"]').html(yearHtml);
	$('[name="month"]').html(monthHtml);
	$('[name="day"]').html(dayHtml);
}

//初始化日期
dateSelectInit();

//表单回填
var formObj = new Form('user_info');
formObj.init({
	'id':'{{$userdetail->user_id}}',
	'zsname':'{{$userdetail->zsname}}',
	'phone':'{{$userdetail->phone}}',
	'telephone':'{{$userdetail->telephone}}',
	'detail':'{{$userdetail->detail}}',
	'qq':'{{$userdetail->qq}}',
	'msn':'{{$userdetail->msn}}',
	'sex':'{{$userdetail->sex}}',
	'postcode':'{{$userdetail->postcode}}',
	'year':'{{$userdetail->year}}',
	'month':'{{$userdetail->month}}',
	'day':'{{$userdetail->day}}',
});
</script>
	</div>
</div>

<script type="text/javascript">
    $(function(){
        // 发送ajax请求
        $.get('/user/address/get',{pid:0},function(data){
            // console.log(data);
            // jquery方法遍历数组
            $.each(data,function(i){
              // 动态创建option标签
                // console.log(i);
                $('<option value="'+data[i].areaid+'">'+data[i].areaname+'</option>').appendTo('#prov');
            });
        },'json');
        /**
         * 市
         */
        // 当省的值发生改变时触发事件
        $('#prov').change(function(){
            // 获取当前下拉框的值
            var v = $(this).val();

            // 发送ajax获取值
            $.get('/user/address/get',{pid:v},function(data){
                // 清空市
                $('#city').empty();
                // 清空县
                $('#xian').empty();
                // jquery方法遍历数组
                $.each(data,function(i){
                  // 动态创建option标签
                    // console.log(i);
                    $('<option value="'+data[i].areaid+'">'+data[i].areaname+'</option>').appendTo('#city');
                });
            },'json');
        });

        /**
         * 县
         */
        // 当市的值发生改变时触发事件
        $('#city').change(function(){
            // 获取当前下拉框的值
            var v = $(this).val();

            // 发送ajax获取值
            $.get('/user/address/get',{pid:v},function(data){
                // 清空县
                $('#xian').empty();
                // jquery方法遍历数组
                $.each(data,function(i){
                  // 动态创建option标签
                    // console.log(i);
                    $('<option value="'+data[i].areaid+'">'+data[i].areaname+'</option>').appendTo('#xian');
                });
            },'json');
        });

    });
</script>
@endsection
