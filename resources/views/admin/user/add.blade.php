@extends('template.late')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">用户添加</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            添加用户
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{url('/admin/user/insert')}}" method="post">
                                        <div class="form-group col-sm-8">
                                            <label>用户名</label>
                                            <input class="form-control" type="text" name="nickname" placeholder="请输入1-12位数字字母下划线">
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label>密码</label>
                                            <input class="form-control" type="password" name="password" placeholder="请输入8-18位非空白字符">
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label>确认密码</label>
                                            <input class="form-control" type="password" name="repassword" placeholder="再次输入密码">
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label>Email</label>
                                            <input class="form-control" type="text" name="email" placeholder="请输入验证邮箱">
                                        </div>
                                        {{csrf_field()}}
                                        <input type="hidden" name="token" value="{{str_random()}}">
                                        <div class="form-group col-sm-8">
                                            <button class="btn btn-default">添加用户</button>
                                            <button type="reset" class="btn btn-default">重置</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

@endsection