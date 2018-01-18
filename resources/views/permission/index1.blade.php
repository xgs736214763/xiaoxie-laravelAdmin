@extends('layouts.app')

@section('content')
    <div class="box">
        @include('tip/success')
        @include('tip/error')
        <div class="box-header">

            <div class="btn-group" ">
            <a href="/admin/permission/create" class="btn btn-sm btn-primary"> <i class="fa fa-save"></i>&nbsp;&nbsp;新增 </a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>权限路由</th>
                <th>权限名称</th>
                <th>权限描述</th>
                <th >菜单</th>
                <th>创建时间</th>
                <th>修改时间</th>

                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($perlist))
                @foreach($perlist as $menu)
                    @if(!empty($menu->son))
                        <tr class="active">
                            <td>{{$menu->name}}</td>
                            <td>{{$menu->display_name}}</td>
                            <td>{{$menu->description}}</td>
                            <td>
                                @if($menu->isdisplay == 1) <span class="btn btn-sm btn-success">是</span>
                                @else
                                    <span class="btn btn-sm btn-warning">否</span>
                                @endif
                            </td>
                            <td>{{$menu->created_at}}</td>
                            <td>{{$menu->updated_at}}</td>

                            <td>
                                <a style="margin:3px;" href="/admin/permission/{{$menu->id}}/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                                <a style="margin:3px;" href="/admin/permission/{{$menu->id}}/delete" attr="{{$menu->id}}" class="delBtn X-Small btn-xs text-danger"><i class="fa fa-times-circle"></i> 删除</a>
                            </td>
                        </tr>
                        @foreach($menu->son as $value)
                            <tr>
                                <td>{{$value->name}}</td>
                                <td>　　　├{{$value->display_name}}</td>
                                <td>{{$value->description}}</td>
                                <td>
                                    @if($value->isdisplay == 1) <span class="btn btn-sm btn-success">是</span>
                                    @else
                                        <span class="btn btn-sm btn-warning">否</span>
                                    @endif
                                </td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->updated_at}}</td>

                                <td>
                                    <a style="margin:3px;" href="/admin/permission/{{$value->id}}/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                                    <a style="margin:3px;" href="/admin/permission/{{$value->id}}/delete" attr="{{$value->id}}" class="delBtn X-Small btn-xs text-danger"><i class="fa fa-times-circle"></i> 删除</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="active">
                            <td>{{$menu->name}}</td>
                            <td>{{$menu->display_name}}</td>
                            <td>{{$menu->description}}</td>
                            <td>
                                @if($menu->isdisplay == 1) <span class="btn btn-sm btn-success">是</span>
                                @else
                                    <span class="btn btn-sm btn-warning">否</span>
                                @endif
                            </td>
                            <td>{{$menu->created_at}}</td>
                            <td>{{$menu->updated_at}}</td>

                            <td>
                                <a style="margin:3px;" href="/admin/permission/{{$menu->id}}/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                                <a style="margin:3px;" href="/admin/permission/{{$menu->id}}/delete" attr="{{$menu->id}}" class="delBtn X-Small btn-xs text-danger"><i class="fa fa-times-circle"></i> 删除</a>
                            </td>
                        </tr>
                    @endif
                @endforeach

            @endif
            <tr>
                {{$permission->links()}}
            </tr>
            </tfoot>
        </table>
    </div>
    </div>

@endsection

