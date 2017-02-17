@extends('layout.admin')

@section('title_1','添加导航 - 腾讯课堂后台管理系统')
@section('title_2','添加导航')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        导航管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/top/insert" method="post">
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
                        <input class="form-control" type="text" name="name" placeholder="例: 首页" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>导航地址:</label>
                        <input class="form-control" type="text" name="link" placeholder="例:  '/' 或 http://www.baidu.com " value="{{old('link')}}">
                    </div>

                    {{csrf_field()}}
                    <button type="submit" class="btn btn-lg btn-success btn-block">添加导航信息</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
