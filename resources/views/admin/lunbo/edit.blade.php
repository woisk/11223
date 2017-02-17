@extends('layout.admin')

@section('title_1','修改广告 - 腾讯课堂后台管理系统')
@section('title_2','修改广告')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        轮播广告管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/lunbo/update" method="post" enctype="multipart/form-data">
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
                        <input class="form-control" type="text" name="name" placeholder="例:强哥PHP系列课程降价啦!" value="{{$lunbo->name}}">
                    </div>
                    <div class="form-group">
                        <label>链接地址:</label>
                        <input class="form-control" type="text" name="url"  value="{{$lunbo->url}}">
                    </div>
                    <div class="form-group">
                        <label>广告图:</label>
                          <img src="{{$lunbo->image}}" alt="" />
                        <br>
                        <br>
                        <input class="form-control" type="file" name="image">
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$lunbo->id}}">
                    <button type="submit" class="btn btn-lg btn-success btn-block">更新轮播广告</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
