@extends('layout.admin')

@section('title_1','回收站 - 腾讯课堂后台管理系统')
@section('title_2','回收站')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        回收站管理
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
              <form class="" action="/admin/goods/list">
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
                      <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width:77px;">id</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">商品名称</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 77px;">价格</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 77px;">库存</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($goods as $k=>$v)
                    <tr class="gradeA odd" role="row">
                        <td class="sorting_1">{{$v->id}}</td>
                        <td>{{$v->title}}</td>
                        <td>{{$v->price}}</td>
                        <td class="center">{{$v->kucun}}</td>
                        <td class="center">
                          <a href="/admin/goods/recycleupdate?id={{$v->id}}">移出回收站</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
            <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate" style="float:right;margin-top:-40px">
              <ul class="pagination">
                {!! $goods->appends($request->only(['num','keyword']))->render() !!}
              </ul>
            </div>

      </div>
    </div>
        </div>

</div>
@endsection
