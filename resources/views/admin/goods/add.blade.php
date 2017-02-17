@extends('layout.admin')

@section('title_1','商品添加 - 腾讯课堂后台管理系统')
@section('title_2','商品添加')

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
                <form role="form" action="/admin/goods/insert" method="post" enctype="multipart/form-data">
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
                        <input class="form-control" type="text" name="title" placeholder="请输入商品名称" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label>价格:</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" name="price" value="{{old('price')}}" placeholder="请输商品价格" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>库存:</label>
                        <input class="form-control" type="text" name="kucun" placeholder="请输入库存数量" value="{{old('kucun')}}">
                    </div>
                    <div class="form-group">
                        <label>所属分类:</label>
                        <select class="form-control" name="cate_id">
                            <option value="0">请选择</option>
                            @foreach($cates as $k=>$v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>商品图片:</label>
                        <input class="form-control" type="file" name="path[]" multiple>
                    </div>
                    <div class="form-group">
                        <label>商品详情:</label>
                        <script id="editor" name="detail" type="text/plain" style="width:900px;height:400px;"></script>
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-lg btn-success btn-block">添加商品</button>
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
