@extends('layout.admin')

@section('title_1','公告列表 - 腾讯课堂后台管理系统')
@section('title_2','公告列表')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            公告管理
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>公告标题</th>
                            <th>发布时间</th>
                            <th>发布人</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($article as $k=>$v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{date("Y-m-d H:i:s",$v->time)}}</td>
                            <td>管理员</td>

                            <td>
                              <a href="/admin/article/edit?id={{$v->id}}">编辑</a>
                              <a href="/admin/article/delete?id={{$v->id}}">删除</a>
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
