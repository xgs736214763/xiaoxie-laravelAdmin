@extends('layouts.base')

@section('title','500')

@section('pageHeader','服务器内部错误')

@section('pageDesc','服务器内部错误')

@section('content')
    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content" style="padding-top: 30px">
            <h3><i class="fa fa-warning text-yellow"></i>  哎呦！有一个错误.</h3>

            <p>
                页面没找到.
                此时你可以返回<a href="{{route('index/index')}}"> 首页 </a>.
            </p>

        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->



@endsection


@section('js')

@endsection