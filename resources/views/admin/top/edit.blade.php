@extends('layout.admin')

@section('title_1','编辑导航 - 腾讯课堂后台管理系统')
@section('title_2','编辑导航')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        导航管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/top/update" method="post">
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <h4>出错了!</h4>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </div>
                  @endif
                    <div class="form-group">
                        <label>导航名称:</label>
                        <input class="form-control" type="text" name="name" placeholder="例: 首页" value="{{$top->name}}">
                    </div>
                    <div class="form-group">
                        <label>导航URL:</label>
                        <input class="form-control" type="text" name="link" placeholder="例:  '/' 或 http://www.baidu.com "  value="{{$top->link}}">
                    </div>

                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$top->id}}">
                    <button type="submit" class="btn btn-lg btn-success btn-block">更新导航信息</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
