@extends('layouts.app')

@section('content')
    <div class="main animsition">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">编辑权限</h3>
                        </div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="POST" action="/admin/permission/{{$permission->id}}/update" onsubmit="return false">
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value="{{$permission->id}}">
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">权限规则</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="tag" value="{{$permission->name}}" >

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">权限名称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="display_name" id="tag" value="{{$permission->display_name}}" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">排列序号</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="sorts" value="{{$permission->sorts}}" placeholder="大的在前面">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">主次菜单</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="cid" id="" >
                                            <option value="0" >父级菜单</option>
                                            @foreach($menu as $value)
                                            <option value="{{$value->id}}" @if($value->id == $permission->cid) selected @endif>{{$value->display_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">是否菜单</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="isdisplay" id="" >
                                            <option value="1" @if($permission->isdisplay == 1) selected @endif>是</option>
                                            <option value="0" @if($permission->isdisplay == 0) selected @endif>否</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">图标</label>
                                    <div class="col-md-6">
                                        <!-- Button tag -->
                                       {{-- <button class="btn btn-default iconpicker" name="icon" data-iconset="fontawesome" data-icon="fa-users" role="iconpicker"><i class="fa fa-users"></i><input type="hidden" name="icon" value="fa-users"><span class="caret"></span></button>
                                    --}}
                                        <button class="btn btn-default iconpicker" name="icon" id="target" data-iconset="fontawesome" data-icon="{{$permission->icon}}"   role="iconpicker" ><i class="fa {{$permission->icon}}"></i><input type="hidden" id="icons" name="icon" value="{{$permission->description}}"></button>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">权限概述</label>
                                    <div class="col-md-6">
                                        <textarea name="description" class="form-control" rows="3">{{$permission->description}}</textarea>
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
@section('scripts')
    <script type="text/javascript" src="{{asset('/static/plugins/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.3.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/static/plugins/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js')}}"></script>
    <script>
        $(document).on('pjax:complete', function() {
          $icon =$('$icons').val();
            $('#target').iconpicker()
                .iconpicker('setIcon', $icon);


        });
    </script>
@endsection
