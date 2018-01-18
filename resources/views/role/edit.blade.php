@extends('layouts.app')

@section('content')
    <div class="main animsition">
        <div class="container-fluid">
            <style>
                .permission{ line-height:34px;}
                .permission p{ clear:both; margin-bottom:0px;}
                .permission p .checkbox-inline{ padding-top:0px;}
                .permission .permission1{ background:#f9f9f9;}
                .permission .permission2{ float:left; margin-left:24px; clear:none;}
            </style>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$page_title}}</h3>
                        </div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="POST" action="/admin/role/{{$role->id}}/edit" onsubmit="return false">
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value="{{$role->id}}">
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">角色名称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="tag" value="{{$role->name}}" autofocus="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">角色标签</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="display_name" id="tag" value="{{$role->display_name}}" autofocus="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">角色概述</label>
                                    <div class="col-md-6">
                                        <textarea name="description" class="form-control" rows="3">{{$role->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">角色授权</label>
                                    <div class="col-sm-6 permission">
                                        @if(!empty($permissionlist))
                                            @foreach($permissionlist as $permission)
                                                @if($permission->son)
                                                   {{-- @if(!empty(permission_roles))--}}
                                                    <p class="permission1" >
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="rules[]" value="{{$permission->id}}" @if(in_array($permission->id,$permission_role_arr)) checked @endif class="minimal"  > {{$permission->display_name}}
                                                        </label>
                                                    </p>
                                                    @foreach($permission->son as  $list)
                                                        <p class="permission2 p_left" >
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="rules[]" value="{{$list->id}}" @if(in_array($list->id,$permission_role_arr)) checked @endif class="minimal"  > {{$list->display_name}}
                                                            </label>
                                                        </p>
                                                    @endforeach
                                                @else
                                                    <p class="permission1" >
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="rules[]" value="{{$permission->id}}" @if(in_array($permission->id,$permission_role_arr)) checked @endif class="minimal"  > {{$permission->display_name}}
                                                        </label>
                                                    </p>
                                                @endif
                                            @endforeach
                                        @endif
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

