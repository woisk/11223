@extends('layout.admin')

@section('title_1','添加公告 - 腾讯课堂后台管理系统')
@section('title_2','添加公告')

@section('content')
<!-- 百度编辑器 -->
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="panel panel-default">
    <div class="panel-heading">
        公告管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/article/insert" method="post" enctype="multipart/form-data">
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <h4>出错了!</h4>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </div>
                  @endif
                    <div class="form-group">
                        <label>公告标题:</label>
                        <input class="form-control" type="text" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label>发布人:</label>
                        <input class="form-control" type="text" name="zuozhe" value="管理员">
                    </div>
                    <div class="form-group">
                        <label>公告内容:</label>
                        <script id="editor" name="content" type="text/plain" style="width:900px;height:400px;"></script>
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-lg btn-success btn-block">发布公告</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
<!-- 百度编辑器 -->
<script type="text/javascript">
   var ue = UE.getEditor('editor');
</script>
@endsection
