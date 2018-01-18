<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/12/14
 * Time: 15:50
 **/

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CacheController extends Controller
{

    /**
     * Created by PhpStorm.
     * function: clear
     * Description:清除缓存
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function clear(Request $request)
    {
        $file = storage_path().'\framework\views';
        $this->delfile($file);
         $request->session()->flash('success','缓存清除成功');
         return redirect()->back();


    }

    /**
     * Created by PhpStorm.
     * function: delfile
     * Description:删除文件
     * @param $dir
     *
     */
    public function delfile($dir){
        $dirs=opendir($dir);
        while ($file=readdir($dirs)) {
            if($file!="." && $file!="..") {
                $files=$dir."/".$file;
                if(!is_dir($files)) {
                    unlink($files);
                } else {
                    delfile($files);
                }
            }
        }
        closedir($dirs);
    }




}
