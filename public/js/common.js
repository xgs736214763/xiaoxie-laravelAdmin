/**
 * common
 */
$(function(){
    //为所有的ajax设置token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.pjax.defaults.timeout = 5000;
    $.pjax.defaults.maxCacheLength = 0;
    //$(document).pjax('a', {container:'#pjax-container', fragment:'body'});
    //$(document).pjax('a', '#pjax-container');
    $(document).pjax('a', '#pjax-container', { fragment: 'body', timeout: 8000 });


    //提交
    $('body').off('click', '.submits');
    $('body').on("click", '.submits', function(event){
        $this  = $(this);
        $this.button('loading');
        var form = $this.closest('form');
        if(form.length){
            var ajax_option={
                dataType:'json',
                success:function(data){
                    if(data.status == '1'){
                        var url = data.url;
                        $.pjax({url: url, container: '#pjax-container'})
                    }else{
                        $this.button('reset');
                        var url = data.url;
                        $.pjax({url: url, container: '#pjax-container'})
                    }
                }
            }
            form.ajaxSubmit(ajax_option);
        }
    });

    //搜索
    $(document).on('submit', 'form[data-pjax]', function(event) {
        $.pjax.submit(event, {container:'#pjax-container', fragment:'body'})
    })

    //授权用户
    $('body').off('click', '.submitss');
    $('body').on("click", '.submitss', function(event){
        $("#search_to option").each(function (){
            $(this).prop('selected', 'selected');
        });
        $("#search option").each(function (){
            $(this).prop('selected', 'selected');
        });
        var _this = $(this);
        _this.button('loading');
        var form = _this.closest('form');
        if(form.length){
            var ajax_option={
                dataType:'json',
                success:function(data){
                    if(data.status == '1'){
                        $.amaran({'message':data.info});
                        var url = data.url;
                        $.pjax({url: url, container: '#pjax-container', fragment:'#pjax-container'})
                    }else if(data.status == '2'){
                        restlogin(data.info);
                    }else{
                        _this.button('reset');
                        $.amaran({'message':data.info});
                    }
                }
            }
            form.ajaxSubmit(ajax_option);
        }
    });

    /**
     * 备份数据表
     */
    $('body').off('click','.back-all');

    $('body').on('click','.back-all',function (event) {
        //取消事件的默认动作。
      //  console.log(123);
        event.preventDefault();
        $this = $(this);
        $title = $this.data('title')?$this.data('title'):'数据备份';
        $url = $this.data('url');
        $content = "确认备份吗？";
        if($this.hasClass('back-all'))
        {
            var tables = '';
            $checkbox = $('input[type="checkbox"]');
            $($checkbox).each(function(){
                if(true == $(this).is(':checked')){
                    tables += $(this).val() + ",";
                }
            });

            if(tables && $url){
                //console.log(123);
                BootstrapDialog.show({
                    size: BootstrapDialog.TYPE_PRIMARY,
                    message: $content,
                    title:$title,
                    buttons: [ {
                        label: '提交',
                        cssClass: 'btn-primary',
                        action: function(dialogItself){
                            //alert('Hi Orange!');

                            $.ajax({
                                type : "post",
                                url : $url,
                                dataType : 'json',
                                data : { tables:tables },
                                success : function(data) {
                                    if(data.status == '1'){
                                        var url = data.url;
                                        dialogItself.close();
                                        $.pjax({url: url, container: '#pjax-container', fragment:'body'});

                                    }else{
                                        var url = data.url;
                                        dialogItself.close();
                                        $.pjax({url: url, container: '#pjax-container', fragment:'body'})
                                    }
                                }
                            });
                        }
                    }, {
                        label: 'Close',
                        action: function(dialogItself){
                            dialogItself.close();
                        }
                    }]
                });

            }else{
                BootstrapDialog.alert('缺少参数');
            }
        }

    });

    /**
     * 备份数据表
     */
    $('body').off('click','.restore');

    $('body').on('click','.restore',function (event) {
        //取消事件的默认动作。
        //  console.log(123);
        event.preventDefault();
        $this = $(this);
        $title = $this.data('title')?$this.data('title'):'数据表还原';
        $url = $this.data('url');
        $content = "确认还原吗？";
        if($this.hasClass('restore'))
        {
            $sql = $this.data('sql');
            if($sql && $url){
                //console.log(123);
                BootstrapDialog.show({
                    size: BootstrapDialog.TYPE_PRIMARY,
                    message: $content,
                    title:$title,
                    buttons: [ {
                        label: '提交',
                        cssClass: 'btn-primary',
                        action: function(dialogItself){
                            //alert('Hi Orange!');
                            $.ajax({
                                type : "post",
                                url : $url,
                                dataType : 'json',
                                data : { sql:$sql },
                                success : function(data) {
                                    if(data.status == '1'){
                                        var url = data.url;
                                        dialogItself.close();
                                        $.pjax({url: url, container: '#pjax-container', fragment:'body'});

                                    }else{
                                        var url = data.url;
                                        dialogItself.close();
                                        $.pjax({url: url, container: '#pjax-container', fragment:'body'})
                                    }
                                }
                            });
                        }
                    }, {
                        label: 'Close',
                        action: function(dialogItself){
                            dialogItself.close();
                        }
                    }]
                });

            }else{
                BootstrapDialog.alert('缺少参数');
            }
        }

    });

    /**
     * 删除操作
     */
    $('body').off('click','.delete-btn');

    $('body').on('click','.delete-btn',function (event) {
        //取消事件的默认动作。
        //  console.log(123);
        event.preventDefault();
        $this = $(this);
        $title = $this.data('title')?$this.data('title'):'确人删除';
        $url = $this.data('url');
        $content = $this.data('content')?$this.data('content'):"确人删除吗？";
        if($this.hasClass('delete-btn'))
        {
            $param = $this.data('param');
            if($param && $url){
                //console.log(123);
                BootstrapDialog.show({
                    size: BootstrapDialog.TYPE_DANGER,
                    message: $content,
                    title:$title,
                    buttons: [ {
                        label: '提交',
                        cssClass: 'btn-primary',
                        action: function(dialogItself){
                            //alert('Hi Orange!');
                            $.ajax({
                                type : "post",
                                url : $url,
                                dataType : 'json',
                                data : { param:$param },
                                success : function(data) {
                                    if(data.status == '1'){
                                        var url = data.url;
                                        dialogItself.close();
                                        $.pjax({url: url, container: '#pjax-container', fragment:'body'});

                                    }else{
                                        var url = data.url;
                                        dialogItself.close();
                                        $.pjax({url: url, container: '#pjax-container', fragment:'body'})
                                    }
                                }
                            });
                        }
                    }, {
                        label: 'Close',
                        action: function(dialogItself){
                            dialogItself.close();
                        }
                    }]
                });

            }else{
                BootstrapDialog.alert('缺少参数');
            }
        }

    });


    $('body').off('change','.change');
    $('body').on('change','.change',function (event) {
        
    });

    $str = "<input type='text' value='aa'>";

    $('body').off('click','.add-btn');
    $('body').on('click','.add-btn',function (event) {
        event.preventDefault();
        BootstrapDialog.show({
            message: $('<div></div>').load('/admin/index/index')
        });
    })

    //NProgress.configure({ trickleRate: 0.02, trickleSpeed: 800, showSpinner: false });

    //特效
    $(document).ajaxStart(function(){NProgress.start();}).ajaxStop(function(){NProgress.done();});


})



$(function(){

    $(document).ready(function(){
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue',
            //  increaseArea: '20%' // optional
        });
    });

    $(document).on('pjax:complete', function() {
        //icheck插件
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue',
            //  increaseArea: '20%' // optional
        });
        //icheck全选和反选
        $('#checkbox').on('ifChecked', function(event){
            var that = $(this);
            var table = that.closest('.table');
            table.find("tr td input[type='checkbox']").iCheck("check");
        });
        $('#checkbox').on('ifUnchecked', function(event){
            var that = $(this);
            var table = that.closest('.table');
            table.find("tr td input[type='checkbox']").iCheck("uncheck");
        });
        //图标插件加载
        $('#target').iconpicker();
        //模态框删除
        function deletes($action){
            $('#deleteForm').attr('action',$action)
            $('#modal-danger').modal('show');
        }
    });



})





