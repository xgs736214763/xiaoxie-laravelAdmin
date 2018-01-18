<?php

namespace App\Http\Controllers;

use App\Model\Permission_Role;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Model\Permission;

class RoleController extends Controller
{
    protected $fields = [
        'name' => '',
        'display_name' => '',
        'description' => '',
    ];
    /**
     * 角色列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|
     */
    public function index(Request $request)
    {

        $name = $request->input('search');
        if($name){
            $roles = Role::where('name','like','%'.$name.'%')->orWhere('display_name','like','%'.$name.'%')->paginate(15);
        }else{
            $roles =  Role::paginate(15);
        }

       return view('role/index',['roles'=>$roles,'paginator'=>$roles,'page_title'=>'角色列表']);
    }

    /**
     * 角色编辑
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function edit(Request $request,$id)
    {
        $role = Role::find((int)$id);
        //提交编辑
        if($request->isMethod('post'))
        {
            //循环遍历字段
            foreach (array_keys($this->fields) as $field)
            {
                $role->$field = $request->input($field);
            }
            $rules = $request->input('rules');
            try {
                if ($role->save())
                {
                  //更新权限
                    $role->perms()->sync($rules);
                    return returnResult('admin/role','修改成功',1,'success');
                }
            } catch (\Exception $e) {
                return returnResult('admin/role','角色编辑失败',2,'errors');
            }
        }
        //权限节点
        $permission = Permission::orderBy('cid')->orderBy('sorts', 'desc')->get();
        $permissionlist = getTree($permission);


        //实例化permission_role
        $permissionRole = new Permission_Role();
        //查询出角色对应的权限
        $permission_roles = $permissionRole->where('role_id',$id)->get();
        $permission_role_arr =[];
        foreach ($permission_roles as $value)
        {
            $permission_role_arr[] = $value->permission_id;
        }
        //print_r($permission_role_arr);

        return view('role/edit',['page_title'=>'角色编辑','role'=>$role,'permissionlist'=>$permissionlist,'permission_role_arr'=>$permission_role_arr]);
    }

    /**
     * 角色删除
     * @param $id
     * @return $this
     */
    public function delete(Request $request)
    {
        $id = $request->input('param');
        $role = Role::find((int)$id);
        $result = $role->delete();
        if($result){
            return returnResult('admin/role','角色删除成功',1,'success');
        }else{
            return returnResult('admin/role','角色删除失败',2,'errors');
        }
    }

    /**
     * 角色创建
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string|\think\response\View
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $role = new Role();
            foreach (array_keys($this->fields)  as $field)
            {
                $role->$field = $request->input($field);
            }

            $rules = $request->input('rules');
            try {
                if ($role->save())
                {
                    $role->perms()->sync($rules);
                    return returnResult('admin/role','添加成功',1,'success');
                }
            } catch (\Exception $e) {
                return returnResult('admin/role','添加失败',2,'errors');
            }
        }
        $role = Role::orderBy('id','asc')->get();
        $permission = Permission::orderBy('cid')->orderBy('sorts', 'desc')->get();
        $permissionlist = getTree($permission);
        return view('role/create',['page_title'=>'添加角色','permissionlist'=>$permissionlist]);
    }


}
