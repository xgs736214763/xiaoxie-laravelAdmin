  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('/static/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->uname}}</p>
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
        @if(!empty($menus))
        @foreach($menus as $menu)
        @if(!empty($menu->son))
            <li class="treeview @if(existMenu(Route::currentRouteName(),$menu->id)) active @endif" >
            <a href="#">
        @else
        	<li>
        	<a href="{{ url($menu->name)}}">
        @endif
          
            <i class="fa {{$menu->icon}}"></i> <span>{{$menu->display_name}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          @if(!empty($menu->son))
          
          <ul class="treeview-menu">
          @foreach($menu->son as $key=>$value)
            <li><a href="{{ url($value->name)}}"><i class="fa {{$value->icon}}"></i> {{$value->display_name}}</a></li>
           @endforeach
          </ul>
          
          @endif
        </li>
       @endforeach
       @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>