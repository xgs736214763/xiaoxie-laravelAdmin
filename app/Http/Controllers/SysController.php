<?php

namespace App\Http\Controllers;

use App\model\Sys;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SysController extends Controller
{
    protected $fields = [
        'keys' => '',
        'values' => '',
    ];
    //
    public function sendtoEmail()
    {


        $content = 'this is test';
        $subject = 'test subject';
        sendEmail('smtp.ym.163.com',25,'736214763@qq.com','xiegs@etonesystem.com','xgs5211314','xiaoxie',[],$content,$subject);
    }

    /**
     * Created by PhpStorm.
     * function: index
     * Description:配置项
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|
     *
     */
    public function index(Request $request)
    {
        $name = $request->input('search');
        if ($name)
        {
            $lists = Sys::where('keys','like','%'.$name.'%')->paginate(15);
        }else{
            $lists = Sys::paginate(15);
        }

        return view('sys/index',['page_title'=>'系统配置列表','lists'=>$lists]);
    }


    public function create()
    {

    }


}
