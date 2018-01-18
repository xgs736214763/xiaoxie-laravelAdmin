<?php $__env->startSection('content'); ?>
    <div class="box">

        <div class="box-header">

            <div class="btn-group" >
            <a href="/admin/role/create" class="btn btn-sm btn-primary"> <i class="fa fa-save"></i>&nbsp;&nbsp;新增管理组 </a>
            </div>

            <div class="box-tools">
                <form class="form-group" action="/admin/role" method="post" data-pjax="">
                <div class="input-group input-group-sm" style="width: 150px;">

                        <input type="text" name="search" class="form-control pull-right" placeholder="Search">
                        <?php echo e(csrf_field()); ?>

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default sreachs"><i class="fa fa-search"></i></button>
                        </div>

                </div>
                </form>
            </div>

        </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding" >
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>序号</th>
                <th>角色名称</th>
                <th>角色标识</th>
                <th >角色描述</th>
                <th>创建时间</th>
                <th>修改时间</th>

                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($roles)): ?>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr role="row" <?php if($loop->iteration %2 ==0): ?> class="old" <?php else: ?> class="even" <?php endif; ?>>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($role->name); ?></td>
                            <td><?php echo e($role->display_name); ?></td>
                            <td><?php echo e($role->description); ?></td>

                            <td><?php echo e($role->created_at); ?></td>
                            <td><?php echo e($role->updated_at); ?></td>

                            <td>
                                <a style="margin:3px;" href="/admin/role/<?php echo e($role->id); ?>/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                                <a style="margin:3px;" href="javascript:void(0)" data-url="<?php echo e(url('admin/role/'.$role->id.'/delete')); ?>" data-content="确认删除管理组？" data-param="<?php echo e($role->id); ?>" data-title="删除管理组" class="delBtn X-Small btn-xs text-danger delete-btn"><i class="fa fa-times-circle"></i> 删除</a>
                            </td>
                        </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr >
                            <td align="right" colspan="7" id="pagination">
                                <?php echo e($roles->links()); ?>

                            </td>
                        </tr>
            <?php endif; ?>
            <tr>

            </tr>
            </tbody>

        </table>

    </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>