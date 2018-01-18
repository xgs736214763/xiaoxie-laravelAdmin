<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Role;
use App\Model\Permission;
use Zizaco\Entrust\Entrust;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $user = Auth::user();
       // print_r($user);
      echo   $user->hasRole('admin');
       //echo  Entrust->can('admin.user.manage');
      //  return view('admin_template',['page_title'=>'首页']);
    }
    
    
    public function addrole()
    {
        $admin = Role::first();//获取一个角色
       $user = User::first();//获取一个用户
      // $user->roles()->attach($admin->id); //将user 的id写入到 role_user表 用户和角色进行关联
       //获取权限列表
       $premission = Permission::first();
       
       //把角色对应的权限菜单写到permission_role表   角色和权限关联
      // $admin->perms()->sync(array($premission->id));//可以写多个array('1','2')
       //查询是否有权限  检查用户是否有Roles和Permissions的权限
      //$user->hasRole('admin');//查询当前用户是否具有admin的权限 
       echo  $user->can('admin.user.manages');//判断用户是否有菜单操作权限 就是路由
        
    }
    
    public function index1()
    {
        return view('test/index',['page_title'=>'首页']);
    }
    
    
    public function index2()
    {
        return view('test/index',['data'=>2]);
    }
    
}
