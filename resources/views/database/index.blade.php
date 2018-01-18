@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          {{--  <form action="{{url('admin/database/backup')}}" class="form-group">--}}
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="pull-left">
                    <a class="btn btn-primary btn-sm back-all" href="javascript:void(0);" data-url="{{url('admin/database/backup')}}" data-title="备份数据库"><i class="fa fa-save"></i> 备份数据库</a>
                </div>
            </div>



            <div class="box-body table-responsive">
                <table class="table table-bordered table-hover" >
                    <tbody><tr>
                        <th ><div ><input type="checkbox" class="minimal"  id="checkbox"></div></th>
                        <th >序号</th>
                        <th>表名</th>
                        <th>注释</th>
                        <th>数据条数</th>
                        <th>类型</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                    </tr>
                    @if(!empty($tables))
                        @foreach($tables as $table)
                            <tr>
                                <td><div ><input type="checkbox"  value="{{$table->Name}}"  class="minimal" ></div></td>
                                <td>{{$loop->iteration}}</td>
                                <td><span class="label label-primary">{{$table->Name}}</span></td>
                                <td>{{$table->Comment}}</td>
                                <td><span class="label label-primary">{{$table->Rows}}</span> 条记录</td>
                                <td>{{$table->Engine}}</td>
                                <td>{{$table->Create_time}}</td>
                                <td>{{$table->Update_time}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody></table>
            </div>
           {{-- </form>--}}
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>

        function Oncheck() {


            str = '';
            $checkbox = $('input[type="checkbox"]');
            $($checkbox).each(function(){
                if(true == $(this).is(':checked')){
                    str += $(this).val() + ",";
                }
            });
            $('#table').val(str);
           return true;
        }

    </script>
@endsection