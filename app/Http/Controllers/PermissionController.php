<?php


/**
 * 权限管理
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/12/03
 * Time: 10:24
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Permission;
use App\Http\Middleware\Getmenus;

class PermissionController extends Controller
{
    protected $fields = [
        'name' => '',
        'display_name' => '',
        'description' => '',
        'cid' => 0,
        'isdisplay' => '',
        'icon' => '',
        'sorts' =>'',
    ];

    /**
     * 权限列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function index(Request $request)
    {
        $permission = Permission::orderBy('cid')->orderBy('sorts', 'desc')->get();
        $perlist = $this->getTree($permission);
        return view('permission/index', ['perlist' => $perlist, 'page_title' => '权限列表']);
    }

    /**
     * 获取权限列表，
     * @param $data
     * @param int $pId
     * @param int $i
     * @return array|string
     */
    public function getTree($data, $pId = 0)
    {
        $tree = [];
        foreach ($data as $k => $v) {

            // $permission = $this->user->can($v->name);
            if ($v->cid == $pId) {
                $v->son = $this->getTree($data, $v->id);
                $tree[] = $v;
                unset($data->$k);

            }
        }
        return $tree;
    }

    /**
     * 权限编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function edit(Request $request, $id)
    {
        $permission = Permission::find((int)$id);
        $menu = Permission::where('cid',0)->get();
        return view('permission/edit', ['page_title' => '权限编辑'], ['permission' => $permission,'menu'=>$menu]);
    }

    /**
     * 权限列表编辑提交
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::find((int)$id);
        foreach (array_keys($this->fields) as $field) {
            $permission->$field = $request->input($field);
        }
        try {
            if ($permission->save()) {
                return returnResult('admin/permission','修改成功',1,'success');
            }
        } catch (\Exception $e) {
            return returnResult('admin/permission','修改失败',2,'errors');
        }

    }

    /**
     *删除权限列表
     * 如果是删除父级子级也会被删除
     * @param $id
     * @return $this
     */
    public function delete(Request $request)
    {
        $id = $request->input('param');
        $result = Permission::where('id',$id)->delete();
        if ($result)
        {
            Permission::where('cid',$id)->delete();
            return returnResult('admin/permission','删除成功',1,'success');
        }else{
            return returnResult('admin/permission','删除失败',1,'errors');
        }
    }

    /**
     * 添加权限
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $permission = new Permission();
            foreach (array_keys($this->fields)  as $field)
            {
                $permission->$field = $request->input($field);
            }

            try{
                if($permission->save())
                {
                    return returnResult('admin/permission','添加成功',1,'success');
                }
            }catch (\Exception $e)
            {
                return returnResult('admin/permission','添加失败',2,'errors');
            }

        }
        $permission = Permission::where('cid','0')->orderBy('sorts','asc')->get();
        return view('permission/create',['page_title'=>'添加权限','permission'=>$permission]);
    }

}
