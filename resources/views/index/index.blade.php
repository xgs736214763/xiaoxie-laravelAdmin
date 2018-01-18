@extends('layouts.app')
@section('content')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p>后台正在测试中。。。。</p>
            <p></p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$data['user']}}</h3>

                        <p>用户数</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="{{url('admin/user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$data['log']}}</h3>

                        <p>登陆次数</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$data['cnts']}}</h3>

                        <p>浏览量</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$data['message']}}</h3>

                        <p>留言数量</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <!-- 系统配置 -->
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">系统配置</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <table  id="example2" class="table table-bordered table-hover">
                            <tbody><tr>
                                <td>操作系统：{{$server['os']}}</td>
                            </tr>
                            <tr>
                                <td>PHP版本：{{$server['version']}}</td>
                            </tr>
                            <tr>
                                <td>运行环境：{{$server['server']}}</td>
                            </tr>
                            <tr>
                                <td>最大上传限制：{{$server['upload']}}</td>
                            </tr>
                            <tr>
                                <td>最大执行时间：{{$server['time']}}</td>
                            </tr>
                            <tr>
                                <td>MySQL最大连接数：{{$server['limit']}}</td>
                            </tr>
                            <tr>
                                <td>脚本运行占用最大内存：{{$server['memory_limit']}}</td>
                            </tr>
                            <tr>
                                <td>服务器时间：{{$server['date']}}</td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
            </div>
            <!-- 系统配置 -->

            <!-- 登录日志 -->
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">最新登录</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead><tr>
                                <th>ID</th>
                                <th>IP</th>
                                <th>位置</th>
                                <th>登录时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($logs))
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{$log->Id}}</td>
                                    <td><span class="label label-primary">{{$log->ip}}</span></td>
                                    <td> {{$log->city}}  </td>
                                    <td>{{$log->created_at}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">{{$logs->links()}}</td>

                                </tr>
                            @endif
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!-- 登录日志 -->
        </div>
        <div class="row">
            <!-- 反馈 -->
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bug反馈</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" action="{{url('admin/index/message')}}" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题</label>
                                <div class="col-sm-9"><input class="form-control" name="title" placeholder="标题"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱</label>
                                <div class="col-sm-9"><input class="form-control" name="email" placeholder="邮箱"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Bug描述</label>
                                <div class="col-sm-9"><textarea class="form-control" style="resize:none;height:150px;" name="content" placeholder="留言内容"></textarea></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-9">

                                    <button type="submit" class="btn btn-info pull-left" data-loading-text="<i class='fa fa-spinner fa-spin '></i> 提交">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- 反馈 -->
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Area Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart" style="height: 250px; width: 787px;" width="787" height="250"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

        </div>
        <!-- /.row (main row) -->

@endsection
@section('scripts')
    <script src="/bower_components/chart.js/Chart.js"></script>
    <script>
        $(function () {
            function getdata() {
                var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
                // This will get the first returned node in the jQuery collection.
                var areaChart       = new Chart(areaChartCanvas)

                var areaChartData = {
                    labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [
                        {
                            label               : 'Electronics',
                            fillColor           : 'rgba(210, 214, 222, 1)',
                            strokeColor         : 'rgba(210, 214, 222, 1)',
                            pointColor          : 'rgba(210, 214, 222, 1)',
                            pointStrokeColor    : '#c1c7d1',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data                : [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label               : 'Digital Goods',
                            fillColor           : 'rgba(60,141,188,0.9)',
                            strokeColor         : 'rgba(60,141,188,0.8)',
                            pointColor          : '#3b8bba',
                            pointStrokeColor    : 'rgba(60,141,188,1)',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data                : [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                }
                var areaChartOptions = {
                    //Boolean - If we should show the scale at all
                    showScale               : true,
                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines      : false,
                    //String - Colour of the grid lines
                    scaleGridLineColor      : 'rgba(0,0,0,.05)',
                    //Number - Width of the grid lines
                    scaleGridLineWidth      : 1,
                    //Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true,
                    //Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines  : true,
                    //Boolean - Whether the line is curved between points
                    bezierCurve             : true,
                    //Number - Tension of the bezier curve between points
                    bezierCurveTension      : 0.3,
                    //Boolean - Whether to show a dot for each point
                    pointDot                : false,
                    //Number - Radius of each point dot in pixels
                    pointDotRadius          : 4,
                    //Number - Pixel width of point dot stroke
                    pointDotStrokeWidth     : 1,
                    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                    pointHitDetectionRadius : 20,
                    //Boolean - Whether to show a stroke for datasets
                    datasetStroke           : true,
                    //Number - Pixel width of dataset stroke
                    datasetStrokeWidth      : 2,
                    //Boolean - Whether to fill the dataset with a color
                    datasetFill             : true,
                    //String - A legend template
                    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                  //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                  maintainAspectRatio     : true,
                  //Boolean - whether to make the chart responsive to window resizing
                  responsive              : true
                }

                //Create the line chart
                areaChart.Line(areaChartData, areaChartOptions)
            }
            getdata();
        })

    </script>
    @endsection
