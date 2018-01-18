<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/12/27
 * Time: 15:38
 **/

namespace App\Http\Controllers;

use App\Model\Databases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseController extends Controller
{

    /**
     * Created by PhpStorm.
     * function: index
     * Description:数据表的展示
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     *
     */
    public function index()
    {
        $tables = Databases::getTableStatus();
        return view('database/index',['page_title'=>'数据表备份','tables'=>$tables]);
    }

    /**
     * Created by PhpStorm.
     * function: backup
     * Description:数据的备份
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param Request $request
     * @return string
     *
     */
    public function backup(Request $request)
    {
        $data = $request->input('tables');

        if ($data)
        {
            //分割提交的字符串tables
            $dataarr = explode(',',$data);
            //数组长度
            $count = count($dataarr);
            //如果是全部提交则销毁on
            if ($dataarr[0] =='on')
            {
                unset($dataarr[0]);

            }
            //如果数组长度大于2 需要把最后一个 ,去掉
            if ($count>1)
            {
                unset($dataarr[$count-1]);
            }

            if ($dataarr){
                $tables = $dataarr;
                $datasql = [];
                $sqlcreate = [];
                foreach ($tables as $table)
                {
                    $sqlcreate[] = Databases::createTableSql($table);
                    $datasql[] = Databases::getAndInserTableData($table);
                }
                $result =  Databases::sqlToFile($tables,$sqlcreate,$datasql);
            }else{
                $result= '';
            }

            if ($result){
                return returnResult('admin/database/index','数据表备份成功',1,'success');
            }



        }
    }

    /**
     * Created by PhpStorm.
     * function: restore
     * Description:sql文件的还原
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string|\think\response\View
     *
     */
    public function restore(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $sql = $request->input('sql');
            $path = config('app.databaseurl').getdirDelimiter().$sql;
            $sql = file_get_contents($path);
            $request = Databases::restore($sql);
            if ($request){
                return returnResult('admin/database/restore','数据表还原成功',1,'success');
            }else{
                return returnResult('admin/database/restore','数据表还原失败',2,'errors');
            }
           // echo $sqls;
        }else{
            $files = Databases::getSqlFile();
            return view('database/restore',['page_title'=>'数据表还原','files'=>$files]);
        }

    }

    /**
     * Created by PhpStorm.
     * function: data_filter
     * Description:数据的过滤
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param $data
     * @return bool
     *
     */
    public function data_filter($data)
    {
        if (empty($data) || preg_match('/^#.*/', $data))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * Created by PhpStorm.
     * function: delete
     * Description:删除文件
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param Request $request
     * @param $sql
     * @return $this
     *
     */
    public function delete(Request $request)
    {
        $sql = $request->input('param');
        $path = config('app.databaseurl').getdirDelimiter().$sql;

        if (@unlink($path)) {
            return returnResult('admin/database/restore','删除成功',1,'success');
        }else{
            return returnResult('admin/database/restore','删除失败',2,'errors');
        }
    }

    /**
     * Created by PhpStorm.
     * function: download
     * Description:文件下载
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param Request $request
     * @param $sql
     * @return $this
     *
     */
    public function download(Request $request,$sql)
    {
        $fileName=$path = config('app.databaseurl').getdirDelimiter().$sql;
        if (file_exists($fileName)){
            ob_end_clean();
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Disposition: attachment; filename=' . basename($fileName));
            readfile($fileName);
        }else{
            return redirect('admin/database/restore')->withErrors('下载出错了');
        }
    }
}