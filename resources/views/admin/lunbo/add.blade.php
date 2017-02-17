@extends('layout.admin')

@section('title_1','添加广告 - 腾讯课堂后台管理系统')
@section('title_2','添加广告')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        轮播广告管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/lunbo/insert" method="post" enctype="multipart/form-data">
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <h4>出错了!</h4>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </div>
                  @endif
                    <div class="form-group">
                        <label>广告名称:</label>
                        <input class="form-control" type="text" name="name" placeholder="例:强哥PHP系列课程降价啦!" value="{{old('username')}}">
                    </div>
                    <div class="form-group">
                        <label>链接地址:</label>
                        <input class="form-control" type="text" name="url" placeholder="例:http://www.baidu.com" value="{{old('username')}}">
                    </div>
                    <div class="form-group">
                        <label>广告图:</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-lg btn-success btn-block">添加轮播广告</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
