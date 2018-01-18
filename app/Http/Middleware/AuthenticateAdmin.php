<?php
/**
 * 检测权限
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Zizaco\Entrust\Entrust as entrust;

class AuthenticateAdmin
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //return $next($request);
        if(Auth::guard('web')->user()->id === 1){
            return $next($request);
        }

        $previousUrl = URL::previous();
       // echo Route::currentRouteName();
        if(!Auth::guard('web')->user()->can(Route::currentRouteName())) {
            if($request->ajax() && ($request->getMethod() != 'GET')) {
                return response()->json([
                    'status' => -1,
                    'code' => 403,
                    'msg' => '您没有权限执行此操作'
                ]);
            } else {
                return response()->view('errors/403', compact('previousUrl'));
            }
        }

        return $next($request);
    }
}
