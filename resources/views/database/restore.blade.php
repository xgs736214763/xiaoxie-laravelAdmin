@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="pull-left">
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover">
                    <tbody><tr>
                        <th>备份序号</th>
                        <th>备份名称</th>
                        <th>备份时间</th>
                        <th>备份大小</th>
                        <th width="175">操作</th>
                    </tr>
                    @if(!empty($files))
                        @foreach($files as $file)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$file['filename']}}</td>
                                <td>{{$file['time']}}</td>
                                <td>{{$file['size']}}KB</td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="{{url('admin/database/'.$file['filename'].'/download')}}"><i class="fa fa-arrow-down"></i> 下载</a>
                                    <a class="btn btn-primary btn-xs restore" href="javascript:void(0);" data-sql="{{$file['filename']}}" data-url="{{url('admin/database/restore')}}" data-id="{{$file['filename']}}" data-title="还原数据表"><i class="fa fa-mail-reply-all"></i> 还原</a>
                                    <a class="btn btn-danger btn-xs delete-btn" href="javascript:void(0);" data-url="{{url("admin/database/$file[filename]/delete")}}" data-content="确认删除数据备份吗？" data-title="删除数据备份" data-param="{{$file['filename']}}" ><i class="fa fa-trash"></i> 删除</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody></table>
            </div>
        </div>
    </div>
</div>
@endsection