@extends('layout.admin')

@section('title_1','分类列表 - 腾讯课堂后台管理系统')
@section('title_2','分类列表')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        分类管理
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
              <form class="" action="/admin/cate/list">
              <div class="row">
                <div class="col-sm-6">
                  <div class="dataTables_length" id="dataTables-example_length">
                    <label>显示
                      <select name="num" aria-controls="dataTables-example" class="form-control input-sm">
                        <option value="10" @if($request->input('num') == '10') selected @endif>10</option>
                        <option value="25" @if($request->input('num') == '25') selected @endif>25</option>
                        <option value="50" @if($request->input('num') == '50') selected @endif>50</option>
                        <option value="100" @if($request->input('num') == '100') selected @endif>100</option>
                      </select>页
                   </label>
                 </div>
               </div>
               <div class="col-sm-6">
                 <div id="dataTables-example_filter" class="dataTables_filter"  style="float:right">
                   <label>关键词:
                     <input type="search" name="keyword" class="form-control input-sm" placeholder="" aria-controls="dataTables-example">
                     <button type="submit" class="btn btn-default ">搜索</button>
                   </label>
                 </div>
               </div>
             </div>
           </form>
             <div class="row">
               <div class="col-sm-12">
                 <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">

                <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">id</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">分类名称</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 185px;">父级分类</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">path</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cates as $k=>$v)
                    <tr class="gradeA odd" role="row">
                        <td class="sorting_1">{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td class="">{{getCateName($v->pid)}}</td>
                        <td class="center">{{$v->path}}</td>
                        <td class="center">
                          <a href="/admin/cate/edit?id={{$v->id}}">编辑</a>
                          <a href="/admin/cate/delete?id={{$v->id}}">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
        </div>

</div>
@endsection
