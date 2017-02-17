@extends('layout.admin')

@section('title_1','卡劵列表 - 腾讯课堂后台管理系统')
@section('title_2','卡劵列表')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Basic Table
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>卡劵账号</th>
                            <th>面值</th>
                            <th>卡劵信息</th>
                            <th>卡劵状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kajuan as $k=>$v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->kajuanhao}}</td>
                            <td>{{$v->mianzhi}}.00 元</td>
                            <td>{{$v->beizhu}}</td>
                            <td>@if($v->status==0) 未使用 @else 已使用 @endif</td>
                            <td>
                            <a class="btn btn-warning btn-circle" href="/admin/kajuan/delete?id={{$v->id}}"><i class="fa fa-times"></i></a>
                            <a class="btn btn-success btn-circle" href="/admin/kajuan/update?id={{$v->id}}"><i class="fa fa-link"></i></a>
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
