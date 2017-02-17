@extends('layout.admin')

@section('title_1','添加友情链接 - 腾讯课堂后台管理系统')
@section('title_2','添加友情链接')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        友情链接管理
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" action="/admin/links/insert" method="post">
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
                        <input class="form-control" type="text" name="linkname" placeholder="例:腾讯课堂" value="{{old('linkname')}}">
                    </div>
                    <div class="form-group">
                        <label>网站URL:</label>
                        <input class="form-control" type="text" name="url" placeholder="例:http://ke.qq.com" value="{{old('url')}}">
                    </div>
                    <div class="form-group">
                        <label>网站描述:</label>
                        <input class="form-control" type="text" name="content" placeholder="例:腾讯课堂-腾讯推出的专业在线教育平台，聚合大量优质教育机构和名师，下设职业培训、公务员考试、托福雅思、考证考级、英语口语、中小学教育等众多在线学习精品课程，打造老师在线上课教学、学生及时互动学习的课堂。腾讯课堂，学习成就梦想！" value="{{old('content')}}">
                    </div>

                    {{csrf_field()}}
                    <button type="submit" class="btn btn-lg btn-success btn-block">添加友情链接</button>
                </form>
            </div>
            <!-- /.col-lg-6 (nested) -->

        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
