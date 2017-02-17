@extends('layout.user')
@section('title1', '已报名课程')
@section('title2', '已报名课程')
@section('content')
  <div class="ht_right">
      <div class="order">
          <div class="uc_title m_10">
              <label class="current">
                  <span>
                      我的课程
                  </span>
              </label>
          </div>
          <table class="list_table" width="100%" cellpadding="0" cellspacing="0">

              <tr>
                  <th>
                      ID
                  </th>
                  <th style="width:150px">
                      报名编号
                  </th>
                  <th>
                      创建订单时间
                  </th>
                  <th>
                      状态
                  </th>

                  <th>
                      支付方式
                  </th>
                  <th>
                      价钱
                  </th>
              </tr>
              @foreach($orders as $k=>$v)
              <tr>
                  <td>{{$v->id}}</td>
                  <td style="width:150px">{{$v->orders}}</td>
                  <td>{{$v->create_at}}</td>
                  <?php
                  if($v->status == 0){
                      ?>
                       <td>未支付</td>
                       <?php
                  }else{
                      ?>
                       <td>已支付</td>
                       <?php
                  }
                  ?>
                  <td>{{$v->pay_type}}</td>
                  <td>{{$v->price}}</td>
              </tr>
              @endforeach

          </table>
      </div>
  </div>
  <script>
      $("#nav_2").attr("class", "cta");
  </script>
</div>
</div>
@endsection
