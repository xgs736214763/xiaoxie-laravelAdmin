<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Permission;

class Getmenus
{
    protected $user ;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->user= Auth::user();
        view()->share('menus',$this->getmenu());
        return $next($request);
    }

    /**
     * 获取菜单栏
     * @return array|string
     */
    public function getmenu()
    {
        $data = Permission::where('isdisplay','1')->orderBy('cid')->orderBy('sorts','desc')->get();
        $list = $this->getTree($data);
        return $list;
    }

    /**
     * 循环
     * @param $data
     * @param int $pId
     * @return array|string
     */
    public function getTree($data, $pId=0)
    {
        $tree = [];
        foreach($data as $k => $v)
        {
            $permission = $this->user->can($v->name);
            if($v->cid == $pId  ){
                 if($pId == 0){
                    if($permission || $this->user->id ==1){
                        $v->son = $this->getTree($data, $v->id);
                        $tree[] = $v;
                        unset($data->$k);
                    }
                }else{
                     if($permission || $this->user->id ==1){
                         $v->son = $this->getTree($data, $v->id);
                         $tree[] = $v;
                         unset($data->$k);
                     }
                    
                }
                
            }
        }
        return $tree;
    }
}
