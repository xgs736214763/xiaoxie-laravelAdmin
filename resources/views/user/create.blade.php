@extends('layouts.app')

@section('content')
    <div class="main animsition">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$page_title}}</h3>
                        </div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="POST" action="/admin/user/create" onsubmit="return false">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">用户名</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="uname"  placeholder="用户名必填" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">密码</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="password" placeholder="密码必填"  required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">昵称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name"  placeholder="昵称必填" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">邮箱</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control email" name="email" placeholder="邮箱必填"  required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">手机号</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile_phone"  placeholder="手机号必填" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">状态</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="status" >

                                            <option value="1"  >有效</option>
                                            <option value="2"  >停用</option>
                                            <option value="0" >注销</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">所属组</label>
                                    <div class="col-md-6">
                                        <select class="form-control change" name="role" >
                                            <option value=""  >请选择所属管理员组</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}"  >{{$role->display_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">qq</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="qq"   >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">备注</label>
                                    <div class="col-md-6">
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md submits">
                                            <i class="fa fa-plus-circle"></i>
                                            保存
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script>
        function test() {
            alert(123);
        }
    </script>
@endsection

@endsection


