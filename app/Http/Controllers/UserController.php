<?php

namespace App\Http\Controllers;


use App\Model\Role;
use App\model\Role_User;
use App\Model\User;
use App\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    protected $fields = [
        'uname' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'mobile_phone' => '',
        'qq' => '',
        'status' => '',
        'description' => '',
        'remember_token' => '',
    ];

    /**
     * 后台管理员列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function index()
    {

        $userlist = User::paginate(15);
        return view('user/index',['page_title'=>'管理员列表','userlists'=>$userlist]);

    }


    /**
     * 管理员编辑
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string|\think\response\View
     */
    public function edit(Request $request , $id)
    {
        //根据id获取信息
        $userinfo = User::find((int)$id);

        //获取管理员所属组
        $user_role =Role_User::where('user_id',$id)->first();

        //取出所有组
        $roles = Role::all();
        //print_r($roles);exit;
        //如果是post提交
        if($request->isMethod('post'))
        {

            foreach (array_keys($this->fields ) as $field)
            {
                $userinfo->$field = $request->input($field);
                if($request->input('password') ==''){
                    //如果密码为空不修改密码
                    unset($userinfo->password);
                }else{
                    $userinfo->password = bcrypt($request->input('password'));
                }

            }

            //修改所属管理组
            if ($request->input('role_id'))
            {

                if(!$user_role)
                {
                    $userinfo->roles()->attach($request->input('role_id'));
                }else{
                    //由于是做的一个管理员一个管理组 所以先删除，如果是一个管理员可以继承多个管理组的话。直接使用
                    //$userinfo->roles()->attach($request->input('role_id'));就可以了
                    $user_role->where('user_id',$id)->delete();
                    $userinfo->roles()->attach($request->input('role_id'));
                }

            }

            try{
                if ($userinfo->save())
                {
                    return returnResult('admin/user','修改成功',1,'success');
                }
            }catch (\Exception $e)
            {
                return returnResult('admin/user','修改失败',2,'errors');
            }
        }
        return view('user/edit',['page_title'=>'管理员信息修改','userinfo'=>$userinfo,'roles'=>$roles,'user_role'=>$user_role]);
    }

    /**
     * 管理员删除
     * @param $id
     * @return $this
     */
    public function delete(Request $request)
    {
        $id = $request->input('param');
        $user = User::find((int)$id);
        $result = $user->delete();
        if($result){
            return returnResult('admin/user','管理员删除成功',1,'success');
        }else{
            return returnResult('admin/user','管理员删除失败',2,'errors');
        }
    }


    /**
     * 添加管理员
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string|\think\response\View
     */
    public function create(Request $request)
    {
        $roles = Role::all();
        if ($request->isMethod('POST'))
        {

            $user = new User();
            foreach (array_keys($this->fields)  as $field)
            {
                if ($field == 'password')
                {
                    $user->$field = bcrypt($request->input($field));
                }else{
                    $user->$field = $request->input($field);
                }

            }


            try{
                if ($user->save())
                {
                    $roleid = $request->input('role');
                    if ($roleid)
                    {
                        $user->roles()->attach($roleid);
                    }
                    return returnResult('admin/user','新增成功',1,'success');
                }
            }catch (\Exception $e)
            {
                return returnResult('admin/user/create','新增失败！Email可能重复',2,'errors');
            }

        }
        return view('user.create',['page_title'=>'新增管理员','roles'=>$roles]);
    }


}
