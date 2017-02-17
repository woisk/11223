@extends('layout.admin')

@section('title_1','卡劵发放 - 腾讯课堂后台管理系统')
@section('title_2','卡劵发放')

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
                        <form role="form" action="/admin/kajuan/update" method="post">
                          <div class="form-group" >
                              <label>卡劵号码:</label>
                              <input class="form-control" id="disabledInput" type="text" value="{{$kajuan->kajuanhao}}" placeholder="Disabled input" disabled="">
                          </div>
                          <div class="form-group" >
                              <label>卡劵面值:</label>
                              <input class="form-control" id="disabledInput" type="text" value="{{$kajuan->mianzhi}}" placeholder="Disabled input" disabled="">
                          </div>
                          <div class="form-group">
                              <label>用户账号:</label>
                              <input class="form-control" name="username">
                          </div>
                          <input type="hidden" name="kajuanid" value="{{$kajuan->id}}">
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
