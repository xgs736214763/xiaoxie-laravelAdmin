<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/11/29
 * Time: 15:47
 */
?>


<?php if(Session::has('errors')): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>出错了!</strong>
        <?php echo e(Session::get('errors')); ?>

    </div>
<?php endif; ?>
