@extends('layout.admin')

@section('title_1','用户修改 - 腾讯课堂后台管理系统')
@section('title_2','用户修改')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        用户修改
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/user/update" method="post" enctype="multipart/form-data">
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <h4>出错了!</h4>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </div>
                  @endif
                    <div class="form-group">
                        <label>用 户 名:</label>
                        <input class="form-control" type="text" name="username"  value="{{$user->username}}">
                    </div>
                    <div class="form-group">
                        <label>邮  箱:</label>
                        <input class="form-control" type="text" name="email" value="{{$user->email}}" placeholder="例:100001@qq.com">
                    </div>
                    <div class="form-group">
                        <label>手  机:</label>
                        <input class="form-control" type="text" name="phone" value="{{$user->phone}}" placeholder="例:18888888888">
                    </div>
                    <div class="form-group">
                        <label>头像:</label>
                         <img src="{{$user->profile}}" width="200" alt="">
                        <input class="form-control" type="file" name="profile">
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-lg btn-success btn-block">更新用户</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
