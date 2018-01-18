<?php $__env->startSection('content'); ?>
    <div class="box">

        <div class="box-header">

            <div class="btn-group" >
                <a href="/admin/permission/create" class="btn btn-sm btn-primary"> <i class="fa fa-save"></i>&nbsp;&nbsp;新增 </a>
            </div>
        </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>权限路由</th>
                <th>权限名称</th>
                <th>权限描述</th>
                <th >菜单</th>
                <th >图标</th>
                <th >排序</th>
                <th>创建时间</th>
                <th>修改时间</th>

                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($perlist)): ?>
                <?php $__currentLoopData = $perlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($menu->son)): ?>
                        <tr role="row" class="active">
                            <td><?php echo e($menu->name); ?></td>
                            <td><?php echo e($menu->display_name); ?></td>
                            <td><?php echo e($menu->description); ?></td>
                            <td>
                                <?php if($menu->isdisplay == 1): ?> <span class="btn btn-sm btn-success">是</span>
                                <?php else: ?>
                                    <span class="btn btn-sm btn-warning">否</span>
                                <?php endif; ?>
                            </td>
                            <td  align="center"><i class="fa <?php echo e($menu->icon); ?>"></i></td>
                            <td><?php echo e($menu->sorts); ?></td>
                            <td><?php echo e($menu->created_at); ?></td>
                            <td><?php echo e($menu->updated_at); ?></td>

                            <td>
                                <a style="margin:3px;" href="/admin/permission/<?php echo e($menu->id); ?>/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                                <a style="margin:3px;" href="javascript:void(0)" data-url="<?php echo e(url("admin/permission/$menu->id/delete")); ?>" data-title="删除菜单" data-content="确认删除菜单吗？" data-param="<?php echo e($menu->id); ?>" class="delBtn X-Small btn-xs text-danger delete-btn"><i class="fa fa-times-circle"></i> 删除</a>
                            </td>
                        </tr>
                        <?php $__currentLoopData = $menu->son; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr role="row" class="even">
                                <td>　　　├<?php echo e($value->name); ?></td>
                                <td>　　　├<?php echo e($value->display_name); ?></td>
                                <td><?php echo e($value->description); ?></td>
                                <td>
                                    <?php if($value->isdisplay == 1): ?> <span class="btn btn-sm btn-success">是</span>
                                    <?php else: ?>
                                        <span class="btn btn-sm btn-warning">否</span>
                                    <?php endif; ?>
                                </td>
                                <td align="center"><i class="fa <?php echo e($value->icon); ?>"></i></td>
                                <td><?php echo e($value->sorts); ?></td>
                                <td><?php echo e($value->created_at); ?></td>
                                <td><?php echo e($value->updated_at); ?></td>

                                <td>
                                    <a style="margin:3px;" href="/admin/permission/<?php echo e($value->id); ?>/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                                    <a style="margin:3px;" href="javascript:void(0)"  data-url="<?php echo e(url("admin/permission/$value->id/delete")); ?>" data-title="删除菜单" data-content="确认删除菜单吗？" data-param="<?php echo e($value->id); ?>" class="delBtn X-Small btn-xs text-danger delete-btn"><i class="fa fa-times-circle"></i> 删除</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr role="row" class="active">
                            <td><?php echo e($menu->name); ?></td>
                            <td><?php echo e($menu->display_name); ?></td>
                            <td><?php echo e($menu->description); ?></td>
                            <td>
                                <?php if($menu->isdisplay == 1): ?> <span class="btn btn-sm btn-success">是</span>
                                <?php else: ?>
                                    <span class="btn btn-sm btn-warning">否</span>
                                <?php endif; ?>
                            </td>
                            <td align="center"><i  class="fa <?php echo e($menu->icon); ?>"></i></td>
                            <td><?php echo e($menu->sorts); ?></td>
                            <td><?php echo e($menu->created_at); ?></td>
                            <td><?php echo e($menu->updated_at); ?></td>

                            <td>
                                <a style="margin:3px;" href="/admin/permission/<?php echo e($menu->id); ?>/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
                                <a style="margin:3px;" href="javascript:void(0)"  data-url="<?php echo e(url("admin/permission/$menu->id/delete")); ?>" data-title="删除菜单" data-content="确认删除菜单吗？" data-param="<?php echo e($menu->id); ?>" class="delBtn X-Small btn-xs text-danger delete-btn"><i class="fa fa-times-circle"></i> 删除</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>
            </tbody>
        </table>

    </div>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>