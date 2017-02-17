@extends('layout.user')
@section('title1', '我的评价')
@section('title2', '我的评价')

@section('content')
<style type="text/css">
  li{
    float:left;
  }
  
</style>
<div class="order">
    <div class="uc_title m_10">
      <label class="current"><span>我的评价</span></label>
    </div>
    
    <ul class="evaluation">
    
      <table class="list_table m_10" width="100%" cellspacing="0" cellpadding="0">
        <colgroup><col width="180px">
        <col>
        <col width="160px">
        <col width="100px">
        </colgroup><thead>
          <tr class=""><th>商品名称</th><th>购买时间</th><th>评价内容</th><th>删除该评论</th></tr>
        </thead>
        <tbody>
        @foreach($comment as $k=>$v)
             <tr>
                 <td align="center">
                   {{$v->title}}
                 </td>
                 <td align="center">
                    {{$v->time}}
                 </td>
                 <td align="center">
                    {!!$v->detail!!}
                 </td>
                  <td align="center">
                    <a href="/user/comment/delete?id={{$v->id}}">X</a>
                 </td>
             </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr class="">
            <td colspan="4">
            </td>
          </tr>
        </tfoot>
      </table>   
    </ul>
  </div>
@endsection
