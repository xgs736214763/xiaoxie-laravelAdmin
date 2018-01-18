@extends('layouts.app')

@section('content')
    <div class="main animsition">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$page_title}}</h3>
                        </div>
                        <div class="panel-body">


                            <form class="form-horizontal" role="form" method="POST" action="/admin/permission/create" onsubmit="return false">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">权限选择</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="cid" id="" >
                                            <option value="0">父级菜单</option>
                                            @if(!empty($permission))
                                                @foreach($permission as $value)
                                                    <option value="{{$value->id}}">{{$value->display_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">权限规则</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="tag" placeholder="路由名称">
                                       {{-- <input type="hidden" class="form-control" name="cid" id="tag" value="0" autofocus="">--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">权限名称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="display_name" id="tag" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">排列序号</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="sorts" placeholder="大的在前面">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">是否菜单</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="isdisplay" id="" >
                                            <option value="1" >是</option>
                                            <option value="0" >否</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">图标</label>
                                    <div class="col-md-6">
                                        <!-- Button tag -->
                                       {{-- <button class="btn btn-default iconpicker" name="icon" data-iconset="fontawesome" data-icon="fa-sliders" role="iconpicker" data-original-title="" title=""><i class="fa fa-sliders"></i><input type="hidden" name="icon" value="fa-sliders"><span class="caret"></span></button>--}}

                                        <button class="btn btn-default iconpicker" name="icon" id="target" data-iconset="fontawesome" data-icon="fa-sliders"   role="iconpicker" ><i class="fa fa-sliders"></i><input type="hidden" name="icon" value="fa-sliders"></button>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">权限概述</label>
                                    <div class="col-md-6">
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md submits">
                                            <i class="fa fa-plus-circle"></i>
                                            添加
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
  {{--  <script type="text/javascript" src="{{asset('/static/plugins/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.3.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/static/plugins/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js')}}"></script>
--}}
@endsection


