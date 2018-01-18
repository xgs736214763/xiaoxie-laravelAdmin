<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/11/29
 * Time: 15:47
 */
?>
{{--@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>出错了!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}

@if (Session::has('errors'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>出错了!</strong>
        {{ Session::get('errors') }}
    </div>
@endif
