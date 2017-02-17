@extends('layout.user')
@section('title1', '收货信息')
@section('title2', '收货信息')

@section('content')

<div class="ht_right">
  <div class="order">
    <div class="uc_title m_10">
      <label class="current">
        <span>常用地址</span></label>
      <label>
        <span>
          <a href='javascript:;' onclick="form_empty()">+添加地址</a></span>
      </label>
    </div>
  </div>
  <div class=" clear"></div>
  <div id="address_list" class="form_content m_10 node">
    <table class="list_table" cellpadding="0" cellspacing="0" width="100%">
      <colgroup>
        <col width="120px">
          <col width="230px">
            <col width="120px">
              <col width="120px">
                <col width="120px">
                  <col></colgroup>
      <thead>
        <tr>
          <th>收货人</th>
          <th>所在地区</th>
          <th>街道地址</th>
          <th>电话/手机</th>
          <th>邮编</th>
          <th>操作</th></tr>
      </thead>
      @foreach($address as $k=>$v)
      <tbody>
        <td>{{$v->name}}</td>
        <td>{{getAreaName($v->sheng)}} {{getAreaName($v->shi)}} {{getAreaName($v->xian)}}</td>
        <td>{{$v->detail}}</td>
        <td>{{$v->phone}}</td>
        <td>{{$v->postcode}}</td>
        <td>
          <a href="/user/address/edit?id={{$v->id}}">编辑</a>
          <a href="/user/address/del?id={{$v->id}}">删除</a>
        </td>
      </tbody>
      @endforeach

    </table>
  </div>

  <div class="add_adds" style="display:block;" id="adress_add">

      @if(!empty($data))
      <form id="theForm" action="/user/address/insert" method="get">
      <ul>
        <li>
          <span>姓 名</span>
          <input name="name" pattern="required" value="{{$data->name}}" alt="收货人不能为空" type="text"></li>
        <li>
          <span>所在地区</span>

          <select name="sheng" id="prov" class="dizhi" >
            <option  value="0">请选择</option>
          </select>

          <select name="shi" id="city" value="{{$data->shi}}" class="dizhi" child="area" parent="province">
            <option  value="0">请选择</option>
          </select>

          <select name="xian" id="xian" value="{{$data->xian}}" class="dizhi" parent="city" pattern="required">
            <option  value="0">请选择</option>
          </select>
        </li>
        <li>
          <span>街道地址</span>
          <input name="detail" class="chang" value="{{$data->detail}}"pattern="required" alt="街道地区不能为空" type="text"></li>
        <li>
          <span>手机号码</span>
          <input name="phone" pattern="mobi" value="{{$data->phone}}" empty="" alt="手机号码格式不正确" type="text"></li>
        <li>
          <span>联系电话</span>
          <input name="mobile" pattern="phone" value="{{$data->mobile}}" empty="" alt="电话号码格式不正确" type="text"></li>
        <li>
          <span>邮政编码</span>
          <input name="postcode" id="zipcode" value="{{$data->postcode}}" type="text"></li>
        <li>
          <span style="float:left;">设为默认</span>
          <span style="float:left;">
            <input name="isdefault" value="{{$data->isdefault}}" type="checkbox"></span>
            <input type="hidden" name="id" value="{{$data->id}}">
        </li>
      </ul>
      <div class="add_adds_btn">
        {{csrf_field()}}
        <input value="保存地址" class="userBtn" type="submit">

          </div>
        </form>
      @else
      <form id="theForm" action="/user/address/insert" method="post">
      <ul>
        <li>
          <span>姓 名</span>
          <input name="name" pattern="required"  alt="收货人不能为空" type="text"></li>
        <li>
          <span>所在地区</span>

          <select name="sheng" id="prov" class="dizhi" >
            <option  value="0">请选择</option>
          </select>

          <select name="shi" id="city"  class="dizhi" child="area" parent="province">
            <option  value="0">请选择</option>
          </select>

          <select name="xian" id="xian"  class="dizhi" parent="city" pattern="required">
            <option  value="0">请选择</option>
          </select>
        </li>
        <li>
          <span>街道地址</span>
          <input name="detail" class="chang" pattern="required" alt="街道地区不能为空" type="text"></li>
        <li>
          <span>手机号码</span>
          <input name="phone" pattern="mobi" empty="" alt="手机号码格式不正确" type="text"></li>
        <li>
          <span>联系电话</span>
          <input name="mobile" pattern="phone"  empty="" alt="电话号码格式不正确" type="text"></li>
        <li>
          <span>邮政编码</span>
          <input name="postcode" id="zipcode" type="text"></li>
        <li>
          <span style="float:left;">设为默认</span>
          <span style="float:left;">
            <input name="isdefault"  type="checkbox"></span>
        </li>
      </ul>
      <div class="add_adds_btn">
        {{csrf_field()}}
        <input value="保存地址" class="userBtn" type="submit">

          </div>
        </form>
      @endif

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
</div>
</div>
@endsection
