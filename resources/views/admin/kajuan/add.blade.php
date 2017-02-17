@extends('layout.admin')

@section('title_1','生成卡劵 - 腾讯课堂后台管理系统')
@section('title_2','生成卡劵')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                现金劵管理
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="/admin/kajuan/doadd" method="post">
                          <div class="form-group">
                              <label>卡劵数量</label>
                              <select class="form-control" name="num">
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="30">30</option>
                                  <option value="40">40</option>
                                  <option value="50">50</option>
                              </select>

                          </div>
                          <div class="form-group">
                              <label>有效时间</label>
                              <select class="form-control" name="time">
                                  <option value="0">不限制</option>
                                  <option value="7">一周</option>
                                  <option value="30">一个月</option>
                                  <option value="90">三个月</option>
                                  <option value="180">六个月</option>
                              </select>
                          </div>
                          <div class="form-group" >
                              <label>卡劵面值:</label>
                              <input class="form-control" name="mianzhi">
                          </div>
                          <div class="form-group">
                              <label>操作备注:</label>
                              <input class="form-control" name="beizhu">
                          </div>
                          <button type="submit" class="btn btn-lg btn-success btn-block">确认生成</button>
                        </form>
                    </div>

                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
