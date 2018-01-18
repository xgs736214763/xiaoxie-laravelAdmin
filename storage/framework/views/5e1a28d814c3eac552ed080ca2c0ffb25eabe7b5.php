  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo e(asset('/static/dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo e(auth()->user()->uname); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <li class="header">栏目导航</li>
        <?php if(!empty($menus)): ?>
        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($menu->son)): ?>
            <li class="treeview <?php if(existMenu(Route::currentRouteName(),$menu->id)): ?> active <?php endif; ?>" >
            <a href="#">
        <?php else: ?>
        	<li>
        	<a href="<?php echo e(url($menu->name)); ?>">
        <?php endif; ?>
          
            <i class="fa <?php echo e($menu->icon); ?>"></i> <span><?php echo e($menu->display_name); ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php if(!empty($menu->son)): ?>
          
          <ul class="treeview-menu">
          <?php $__currentLoopData = $menu->son; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(url($value->name)); ?>"><i class="fa <?php echo e($value->icon); ?>"></i> <?php echo e($value->display_name); ?></a></li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          
          <?php endif; ?>
        </li>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>