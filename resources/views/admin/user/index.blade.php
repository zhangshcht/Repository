@extends('template.late')

@section('content')

	
  	@if(session('error'))
	    <div class="alert alert-danger alert-dismissable" style="margin-top:10px">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        {{session('error')}}
	    </div>
	@endif
    <div class="panel panel-default" style="margin-top:10px">
      <div class="panel-heading">用户表单</div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
	            <form action="{{url('/admin/user/index')}}" method="get">
				  <div class="col-sm-6">
				    <div class="dataTables_length" id="dataTables-example_length">
				      <label>显示
				        <select name="show_n" aria-controls="dataTables-example" id="sel" class="form-control input-sm">
				          <option value="10">10</option>
				          <option value="25">25</option>
				          <option value="50">50</option>
				          <option value="100">100</option></select> 条</label>
				    </div>
				  </div>
				  <div class="col-sm-6">
				    <div id="dataTables-example_filter" class="dataTables_filter">
				      <label>Key:
				        <input type="search" class="form-control input-sm" placeholder="" name="keys_name" aria-controls="dataTables-example" style="margin-right:5px;"><button class="btn btn-outline btn-primary btn-sm">搜索</button></label></div>
				  </div>
				</form>
			</div>
			
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 175px;"> ID</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 200px;"> 用户名</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 182px;"> 邮箱</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 152px;"> 是否激活</th>
                      <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;"> 操作</th></tr>
                  </thead>
                  <tbody>
                  @foreach($user as $k=>$v)
                    <tr class="gradeA odd" role="row">
                      <td class="sorting_1"> {{$v['id']}}</td>
                      <td> {{$v['nickname']}}</td>
                      <td> {{$v['email']}}</td>
                      <td class="center"> {{$v['power']}}</td>
                      <td class="center"><a href="/admin/user/edit/{{$v['id']}}" class="btn btn-info">修改</a> <a href="/admin/user/delete/{{$v['id']}}" class="btn btn-danger">删除</a></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
           <div class="row">
			  <div class="col-sm-6">

			    <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite"></div></div>
			  <div class="col-sm-6">
			    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
			      {!! $user->render() !!}
			    </div>
			  </div>
			</div>
        </div>
        
      </div>
      <!-- /.panel-body --></div>

      

@endsection
