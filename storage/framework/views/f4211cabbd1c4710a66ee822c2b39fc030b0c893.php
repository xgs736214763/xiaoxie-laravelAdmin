<?php $__env->startSection('content'); ?>
    <div class="main animsition">
        <div class="container-fluid">
            <style>
                .permission{ line-height:34px;}
                .permission p{ clear:both; margin-bottom:0px;}
                .permission p .checkbox-inline{ padding-top:0px;}
                .permission .permission1{ background:#f9f9f9;}
                .permission .permission2{ float:left; margin-left:24px; clear:none;}
            </style>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e($page_title); ?></h3>
                        </div>
                        <div class="panel-body">


                            <form class="form-horizontal" role="form" method="POST" action="/admin/role/create" onsubmit="return false">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">角色名称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="tag" placeholder="角色名称" required>
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">显示名称</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="display_name" id="tag" value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">角色描述</label>
                                    <div class="col-md-6">
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">角色授权</label>
                                    <div class="col-sm-6 permission">
                                        <?php if(!empty($permissionlist)): ?>
                                        <?php $__currentLoopData = $permissionlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($permission->son): ?>
                                                <p class="permission1" >
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="rules[]" value="<?php echo e($permission->id); ?>" class="minimal"  > <?php echo e($permission->display_name); ?>

                                                    </label>
                                                </p>
                                                <?php $__currentLoopData = $permission->son; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <p class="permission2 p_left" >
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="rules[]" value="<?php echo e($list->id); ?>" class="minimal"  > <?php echo e($list->display_name); ?>

                                                        </label>
                                                    </p>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p class="permission1" >
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="rules[]" value="<?php echo e($permission->id); ?>" class="minimal"  > <?php echo e($permission->display_name); ?>

                                                    </label>
                                                </p>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>