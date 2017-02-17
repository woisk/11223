@extends('layout.admin')

@section('title_1','用户添加 - 腾讯课堂后台管理系统')
@section('title_2','用户添加')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        用户管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/user/insert" method="post" enctype="multipart/form-data">
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
                        <input class="form-control" type="text" name="username" placeholder="请输入添加的账号" value="{{old('username')}}">
                    </div>
                    <div class="form-group">
                        <label>密 码:</label>
                        <input class="form-control" type="password" name="password" placeholder="请输入添加的密码">
                    </div>
                    <div class="form-group">
                        <label>确认密码:</label>
                        <input class="form-control" type="password" name="repassword" placeholder="请确认密码是否一致">
                    </div>
                    <div class="form-group">
                        <label>邮  箱:</label>
                        <input class="form-control" type="text" name="email" value="{{old('email')}}" placeholder="例:100001@qq.com">
                    </div>
                    <div class="form-group">
                        <label>手  机:</label>
                        <input class="form-control" type="text" name="phone" value="{{old('phone')}}" placeholder="例:18888888888">
                    </div>
                    <div class="form-group">
                        <label>头像:</label>
                        <input class="form-control" type="file" name="profile">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-lg btn-success btn-block">添加用户</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
