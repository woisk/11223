@extends('layout.admin')

@section('title_1','网站配置 - 腾讯课堂后台管理系统')
@section('title_2','数据库备份')

@section('content')
<div class="row">
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              数据库备份

          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-4">
                      <form role="form"  action="/admin/config/sql" method="post">
                          <div class="form-group">
                              <label>服务器名称：</label>
                              <input class="form-control" placeholder="例如：localhost 或127.0.0.1" name="servername" >
                          </div>
			<div class="form-group">
                              <label>数据库账户：</label>
                              <input class="form-control" placeholder="例如：root" name="serverroot" >
                          </div>
			<div class="form-group">
                              <label>数据库密码：</label>
                              <input class="form-control" type="password" placeholder="填写数据库密码" name="serverpass" >
                          </div>
			<div class="form-group">
                              <label>数据库名称：</label>
                              <input class="form-control" placeholder="请选择导出的数据库的名称" name="servernames" >
                          </div>
			<button type="submit" class="btn btn-lg btn-success btn-block">开始备份</button>
			<br/>

                      </form>

                  </div>
                  <!-- /.col-lg-6 (nested) -->

                  </div>
                  <!-- /.col-lg-6 (nested) -->
              </div>
              <!-- /.row (nested) -->
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
@endsection
