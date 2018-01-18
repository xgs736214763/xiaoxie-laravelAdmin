<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/12/03
 * Time: 12:24
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class LoginController extends Controller
{
    
    //
    public function loginout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
    
    public function login()
    {
        
        return view('login.login');
    }

    /**
     * Created by PhpStorm.
     * function: checklogin
     * Description:验证登录
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\think\response\Redirect|void
     *
     */
    public function checklogin(Request $request)
    {

        $data = $request->all();
        $where['email'] = $data['email'];
        $where['password'] = $data['password'];
        if(Auth::attempt($where,false))
        {
            addlog();
            return redirect('/index/index');
        }else{
            echo 456;
        }
    }
    
    public function test(Request $request)
    {
       /*  //$date = $request->path();
        $data = $this->treeMenu();
       // print_r($menus);exit;
        foreach ($data as $k=>$v)
        {
            echo $v->name. $v->pid.'---'.$v->id.'<br/>' ;
        } */
        var_dump(Auth::guard('users')->user());
        return view('login.test');
    }
}

