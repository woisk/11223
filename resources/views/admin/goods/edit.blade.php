@extends('layout.admin')

@section('title_1','商品修改 - 腾讯课堂后台管理系统')
@section('title_2','商品修改')

@section('content')
<!-- 百度编辑器 -->
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="panel panel-default">
    <div class="panel-heading">
        商品管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/goods/update" method="post" enctype="multipart/form-data">
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <h4>出错了!</h4>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </div>
                  @endif
                    <div class="form-group">
                        <label>商品名称:</label>
                        <input class="form-control" type="text" name="title" value="{{$goods->title}}">
                    </div>
                    <div class="form-group">
                        <label>价格:</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" name="price" value="{{$goods->price}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>库存:</label>
                        <input class="form-control" type="text" name="kucun" value="{{$goods->kucun}}">
                    </div>
                    <div class="form-group">
                        <label>商品详情:</label>
                        <script id="editor" name="detail" type="text/plain" style="width:900px;height:400px;">{!!$goods->detail!!}</script>
                    </div>
                    <!-- {{csrf_field()}} -->
                      <input type="hidden" name="id" value="{{$goods->id}}">
                    <button type="submit" class="btn btn-lg btn-success btn-block">修改商品</button>
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
