@extends('layouts.app')

@section('content')
    <div class="box">

        <div class="box-header">

            <div class="btn-group" >
            <a href="/admin/user/create" class="btn btn-sm btn-primary"> <i class="fa fa-save"></i>&nbsp;&nbsp;新增管理员 </a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding" >
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>序号</th>
                <th>用户名</th>
                <th >昵称</th>
                <th>邮箱</th>
                <th>手机号</th>
                <th>qq</th>
                <th>状态</th>
                <th>备注</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($userlists))
                @foreach($userlists as $userlist)
                    <tr role="row" @if($loop->iteration %2 ==0) class="old" @else class="even" @endif>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$userlist->uname}}</td>
                        <td>{{$userlist->name}}</td>
                        <td>{{$userlist->email}}</td>
                        <td>{{$userlist->mobile_phone}}</td>
                        <td>{{$userlist->qq}}</td>
                        <td>{{$userlist->status}}</td>
                        <td>{{$userlist->description}}</td>

                        <td>{{$userlist->created_at}}</td>
                        <td>{{$userlist->updated_at}}</td>
                    @if($userlist->id == 1)
                            <td>
                                <a style="margin:3px;" href="/admin/user/{{$userlist->id}}/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>

                            </td>
                    @else
                        <td>
                            <a style="margin:3px;" href="/admin/user/{{$userlist->id}}/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                            <a class="delBtn X-Small btn-xs text-danger delete-btn" style="margin:3px;"  href="javascript:void(0)"
                            data-url="{{url('admin/user/'.$userlist->id.'/delete')}}" data-title="删除管理员" data-param="{{$userlist->id}}" data-content="确认删除吗"><i class="fa fa-times-circle"></i> 删除</a>

                        </td>
                    @endif
                    </tr>

                @endforeach
                <tr >
                    <td align="right" colspan="7" id="pagination">
                        {{$userlists->links()}}
                    </td>
                </tr>
            @endif
            <tr>

            </tr>
            </tbody>

        </table>



@endsection


