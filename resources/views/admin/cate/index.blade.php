@extends('template.late')

@section('content')

	<div class="col-lg-12" style="margin-top:10px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                Kitchen Sink
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>类名</th>
                                <th>pid</th>
                                <th>路径</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cates as $k=>$v)
                            <tr class="info">
                                <td>{{$v['id']}}</td>
                                <td>{{$v['catename']}}</td>
                                <td>{{$v['pid']}}</td>
                                <td>{{$v['path']}}</td>
                                <td>{{$v['state']}}</td>
                                <td><a href="/admin/cate/edit/{{$v['id']}}" class="btn btn-info">修改</a> <a href="/admin/user/cate/{{$v['id']}}" class="btn btn-danger">删除</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
@endsection