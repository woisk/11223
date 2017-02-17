@extends('layout.admin')

@section('title_1','轮播广告列表 - 腾讯课堂后台管理系统')
@section('title_2','轮播广告列表')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            轮播广告管理
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>轮播名称</th>
                            <th>广告图片</th>
                            <th>跳转地址</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($lunbo as $k=>$v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->name}}</td>
                            <td>
                              <img src="{{$v->image}}" alt="" style="width:50px" />
                            </td>

                            <td>{{$v->url}}</td>
                            <td>
                              <a href="/admin/lunbo/edit?id={{$v->id}}">编辑</a>
                              <a href="/admin/lunbo/delete?id={{$v->id}}">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
@endsection
