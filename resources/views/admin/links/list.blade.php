@extends('layout.admin')

@section('title_1','友情链接列表 - 腾讯课堂后台管理系统')
@section('title_2','友情链接列表')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            友情链接管理
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>网站名称</th>
                            <th>网站地址</th>
                            <th>网站描述</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($links as $k=>$v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->linkname}}</td>
                            <td>{{$v->url}}</td>
                            <td>{{$v->content}}</td>
                            <td>
                              <a href="/admin/links/edit?id={{$v->id}}">编辑</a>
                              <a href="/admin/links/delete?id={{$v->id}}">删除</a>
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
