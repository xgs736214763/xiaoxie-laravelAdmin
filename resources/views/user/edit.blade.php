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

                            <form class="form-horizontal" role="form" method="POST" action="/admin/user/{{$userinfo->id}}/edit" onsubmit="return false">
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value="{{$userinfo->id}}">
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">用户名</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="uname" id="tag" value="{{$userinfo->uname}}" autofocus="">
                                    </div>
                                </div>
                            @if($userinfo->id != 1)
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">所属管理组</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="role_id" >
                                            <option value="">请选择管理组</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if(!empty($user_role))@if($user_role->role_id == $role->id) selected @endif @endif>{{$role->display_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">密码</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="password" placeholder="留空默认不修改" id="tag" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">昵称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="tag" value="{{$userinfo->name}}" autofocus="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">邮箱</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control email" name="email" id="tag" value="{{$userinfo->email}}" autofocus="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">手机号</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="mobile_phone" id="tag" value="{{$userinfo->mobile_phone}}" autofocus="">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">状态</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="status" >
                                            <option value="0" @if($userinfo->status == '注销') selected @endif>注销</option>
                                            <option value="1" @if($userinfo->status == '有效') selected @endif >有效</option>
                                            <option value="2" @if($userinfo->status == '停用') selected @endif >停用</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">qq</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="qq" id="tag" value="{{$userinfo->qq}}" autofocus="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">备注</label>
                                    <div class="col-md-6">
                                        <textarea name="description" class="form-control" rows="3">{{$userinfo->descrption}}</textarea>
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

@endsection

