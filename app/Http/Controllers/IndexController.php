<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/12/01
 * Time: 12:24
 */
namespace App\Http\Controllers;

use App\Model\Databases;
use App\Model\Log;
use App\Model\Message;
use App\Model\User;
use App\Model\Visitcnt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index()
    {
        //$datas = Databases::getTableStatus();
       // print_r($datas);
       // exit;
        $this->updateCnts();
        //用户数量
        $usercount = User::count();

        //登录日志数量
        $logcount = Log::count();

        //留言数量
        $messagecount = Message::count();

        //网站访问数
        $cnt =Visitcnt::find(1);
        if($cnt)
        {
            $cnts = $cnt->cnts;
        }else{
            $cnts = 0;
        }
        $data['user'] = $usercount;
        $data['log'] = $logcount;
        $data['message'] = $messagecount;
        $data['cnts'] = $cnts;
        $server = $this->getService();
        $logs = $this->getLogs();
        return view('index/index',['page_title'=>'首页','data'=>$data,'server'=>$server,'logs'=>$logs]);
    }

    /**
     * Created by PhpStorm.
     * function: updateCnts
     * Description:更新访问数量
     * User: Xiaoxie
     *
     */
    public function updateCnts()
    {
        DB::table('visitcnts')->increment('cnts', 1);
    }

    /**
     * Created by PhpStorm.
     * function: getService
     * Description:获取系统信息
     * User: Xiaoxie
     * @return mixed
     *
     */
    public function getService()
    {
        $server['os'] = PHP_OS;
        //版本
        $server['version'] = PHP_VERSION;
        //服务器信息
        $server['server'] = $_SERVER ['SERVER_SOFTWARE'];
        //最大上传限制：
        $server['upload'] = get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件";
        //最大执行时间
        $server['time'] = get_cfg_var("max_execution_time")."秒 ";

        //MySQL最大连接数：
        $server['limit'] = get_cfg_var("mysqli.max_links")==-1 ? "不限" : @get_cfg_var("mysqli.max_links");
        //脚本运行占用最大内存
        $server['memory_limit'] = get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无";
        //服务器时间
        $server['date'] = date('Y-m-d H:i:s');
        return $server;
    }

    /**
     * Created by PhpStorm.
     * function: getLogs
     * Description:获取登录日志
     * User: Xiaoxie
     * @return mixed
     *
     */
    public function getLogs()
    {
        $logs = Log::paginate(5);
        return $logs;
    }


    public function message(Request $request)
    {
        $message = new Message();
        if ($request->isMethod('post'))
        {
            $message->title = $request->input('title');
            $message->content = $request->input('content');
            $message->email = $request->input('email');
            if ($message->save())
            {
                return returnResult('admin/index/index','Bug反馈成功',1,'success');
            }else{
                return returnResult('admin/index/index','Bug反馈失败',2,'errors');
            }
        }
    }

}
