<?php

/**
 * 公共函数库
 * @return int
 */
function index()
{
    return 123;
}

/**
 * Created by PhpStorm.
 * function: existMenu
 * Description:判断属于哪个菜单
 * User: Xiaoxie
 * @param $routename
 * @param $id
 * @return bool
 *
 */
function existMenu($routename,$id)
{
    $result = \App\Model\Permission::where('cid',$id)->get();
    if($result)
    {
        foreach ($result as $item)
        {
            if ($routename == $item->name)
            {
                return true;
            }
        }
        //return true;
    }else{
        return false;
    }
}

/**
 * Created by PhpStorm.
 * function: getTree
 * Description:获取权限列表
 * User: Xiaoxie
 * @param $data
 * @param int $pId
 * @return array|string
 *
 */
 function getTree($data, $pId = 0)
{
    $tree = [];
    foreach ($data as $k => $v) {

        // $permission = $this->user->can($v->name);
        if ($v->cid == $pId) {
            $v->son = getTree($data, $v->id);
            $tree[] = $v;
            unset($data->$k);

        }
    }
    return $tree;
}

/**
 * Created by PhpStorm.
 * function: getNavigation
 * Description:导航栏
 * User: Xiaoxie
 *
 */
function getNavigation()
{
    $routename = \Illuminate\Support\Facades\Route::currentRouteName();
    //$routename = substr($routename,1);
    $result = \App\Model\Permission::where('name',$routename)->first();
    if($result)
    {
        if($result->cid != 0)
        {
            $parentName = \App\Model\Permission::find($result->cid);
            $route = $parentName->name;
            $url = url($route);
            $html = "<div class=\" content-header \">
                <div class=\"panel-heading\">
                    <h4 class=\"panel-title\"><span style=\"color: #0a0a0a\">$result->display_name</span></h4>
                </div>
                <ol class=\"breadcrumb\">
                    <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> $parentName->display_name</a></li>
                    <li class=\"active\">$result->display_name</li>
                </ol>
            </div>";
            echo  $html;
        }else{
            $route = $result->name;
            $url = url($route);
            $html = "<div class=\" content-header \">
                <div class=\"panel-heading\">
                    <h4 class=\"panel-title\"><span style=\"color: #0a0a0a\">$result->display_name</span></h4>
                </div>
                <ol class=\"breadcrumb\">
                    <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> $result->display_name</a></li>
                    <li class=\"active\">$result->display_name</li>
                </ol>
            </div>";
            echo  $html;
        }


    }

   // print_r($result->name);
}

/**
 * Created by PhpStorm.
 * function: addlog
 * Description: 登录日志
 * User: Xiaoxie
 * @param string $user_id
 * @param string $info
 *
 */
function addlog($user_id='',$info='')
{
    $model = new \App\Model\Log();
    if($user_id)
    {
        $model->user_id = $user_id;
    }else{
        $model->user_id = auth()->user()->id;
    }

    if($info)
    {
        $model->info = $info;
    }else{
        $model->info ='登陆成功';
    }
    $ip =  request()->getClientIp();
    $model->ip = $ip;
    $model->city = getCity($ip);
    $model->save();
}

/**
 * Created by PhpStorm.
 * function: getUrl
 * Description: get请求
 * User: Xiaoxie
 * @param $url
 * @param array $data
 * @return mixed
 *
 */
function getUrl($url, $data = [])
{
    $ch = curl_init();
    // 设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // 执行并获取HTML文档内容
    $output = curl_exec($ch);
    // 释放curl句柄
    curl_close($ch);
    return $output;
}

/**
 * Created by PhpStorm.
 * function: getCity
 * Description:获取城市名称
 * User: Xiaoxie
 * @return mixed
 *
 */
function getCity($ip)
{
    //新浪的接口
    $city = getUrl('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=' . $ip);

    $cityarr = json_decode($city, true);
    // 城市名称
    if ($cityarr['ret'] !='-1')
    {
        $cityname = $cityarr['country'].' '.$cityarr['province'].' '.$cityarr['city'];
    }else{
        $cityname='';
    }

    return $cityname;
}


/**
 * Created by PhpStorm.
 * function: getdirDelimiter
 * Description:目录分隔符
 * User: Xiaoxie
 * Email 736214763@qq.com
 * @return string
 *
 */
function getdirDelimiter()
{
    $Delimiter = DIRECTORY_SEPARATOR;
    return $Delimiter;
}


/**
 * Created by PhpStorm.
 * function: returnResult
 * Description:pjax操作返回信息
 * User: Xiaoxie
 * Email 736214763@qq.com
 * @param $url
 * @param $info
 * @param $status
 * @param $session
 * @return string
 *
 */
function returnResult($url,$info,$status,$session)
{
    request()->session()->flash($session,$info);
    return json_encode(['status'=>$status,'url'=>url($url)]);
}

/**
 * Created by PhpStorm.
 * function: sendEmail
 * Description:发送邮件
 * User: Xiaoxie
 * Email 736214763@qq.com
 * @param string $host
 * @param string $port
 * @param $to 收件人邮箱
 * @param $username 发件人邮箱
 * @param $pass发件人邮箱密码
 * @param $name 发件人姓名
 * @param array $addc 抄送人邮箱
 * @param $content 内容
 * @param $subject 主题
 * @param string $file 绝对路径
 * @param string $AddReplyTo 回复邮箱
 * @param string $charset 编码
 * @return bool 成功返回true
 *
 */
function sendEmail($host='smtp.ym.163.com',$port='25',$to,$username,$pass,$name,$addc=[],$content,$subject,$file='',$AddReplyTo='',$charset='UTF-8')
{
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try{

        $mail->IsSMTP();
        $mail->CharSet=$charset; //设置邮件的字符编码
        $mail->SMTPAuth   = true;                  //开启认证
        $mail->Port       = $port;
        $mail->Host       = $host;
        $mail->Username   = $username;  //发件邮箱
        $mail->Password   = $pass;
        if (!$AddReplyTo){
            $AddReplyTo= $username;
        }
        $mail->AddReplyTo($AddReplyTo,"xiaoxie");//回复地址
        $mail->From       = $username;
        $mail->FromName   = $name;
        $to = $to;
        $mail->AddAddress($to);
        if (!empty($addc)){
            foreach ($addc as $value)
            {
                $mail->addCC($value);
            }
        }

        //$mail->addAttachment('');         // Add attachments
        $mail->addAttachment('G:\wamp64\www\kfcadmin\public\static\dist\img\avatar.png');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;

    }catch (\PHPMailer\PHPMailer\Exception $e){
//        echo 'Message could not be sent.';
//        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    }
}


?>