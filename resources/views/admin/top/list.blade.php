@extends('layout.admin')

@section('title_1','导航列表 - 腾讯课堂后台管理系统')
@section('title_2','导航列表')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            导航列表管理
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>导航名称</th>
                            <th>导航地址</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($top as $k=>$v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->link}}</td>
                            <td>
                              <a href="/admin/top/edit?id={{$v->id}}">编辑</a>
                              <a href="/admin/top/delete?id={{$v->id}}">删除</a>
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
