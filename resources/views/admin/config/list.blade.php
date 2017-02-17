@extends('layout.admin')

@section('title_1','网站配置 - 腾讯课堂后台管理系统')
@section('title_2','网站配置')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        网站配置管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/config/insert" method="post">
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <h4>出错了!</h4>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </div>
                  @endif
                    <div class="form-group">
                        <label>网站名称:</label>
                        <input class="form-control" type="text" name="webname" value="{{$config->webname}}">
                    </div>
                    <div class="form-group">
                        <label>网站关键字:</label>
                        <input class="form-control" type="text" name="keywords" value="{{$config->keywords}}">
                    </div>
                    <div class="form-group">
                        <label>网站描述:</label>
                        <input class="form-control" type="text" name="content"  value="{{$config->content}}">
                    </div>
                    <div class="form-group">
                        <label>版权信息:</label>
                        <input class="form-control" type="text" name="copy"  value="{{$config->copy}}">
                    </div>
                    <div class="form-group">
                        <label>网站状态:</label>
                        <select class="form-control" name="status">
                            <option value="1">开启</option>
                            <option value="0">维护</option>
                        </select>
                    </div>

                    {{csrf_field()}}
                    <button type="submit" class="btn btn-lg btn-success btn-block">更新网站配置</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
