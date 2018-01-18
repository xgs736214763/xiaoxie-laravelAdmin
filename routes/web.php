<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('login/loginout','LoginController@loginout')->name('login/loginout');

Route::post('login/checklogin','LoginController@checklogin')->name('login/checklogin');
//Route::get('login/test','LoginController@test')->name('login/test')->middleware('menus');
Route::get('login/test', ['as' => 'login/test', 'middleware' => ['menus'], 'uses'=>'LoginController@test']);
//定义路由群组 中间件权限 左侧菜单栏
Route::group(['middleware' => ['web','menus','auth','authadmin']], function () {
    Route::get('/index/index',array('as'=>'index/index','uses'=>'IndexController@index'));
    Route::get('/admin/index/index',array('as'=>'admin/index/index','uses'=>'IndexController@index'));
    Route::post('/admin/index/message',array('as'=>'admin/index/message','uses'=>'IndexController@message'));
    /**
     * 权限路由
     */
    Route::any('/admin/permission',array('as'=>'admin/permission','uses'=>'PermissionController@index'));
    Route::get('/admin/permission/{id}/edit',array('as'=>'admin/permission/edit','uses'=>'PermissionController@edit'));
    Route::post('/admin/permission/{id}/update',array('as'=>'admin/permission/update','uses'=>'PermissionController@update'));
    Route::any('/admin/permission/{id}/delete',array('as'=>'admin/permission/delete','uses'=>'PermissionController@delete'));
    Route::any('/admin/permission/create',array('as'=>'admin/permission/create','uses'=>'PermissionController@create'));

    /**
     * 角色路由
     */
    Route::any('/admin/role',array('as'=>'admin/role','uses'=>'RoleController@index'));
    Route::any('/admin/role/{id}/edit',array('as'=>'admin/role/edit','uses'=>'RoleController@edit'));
    Route::any('/admin/role/{id}/delete',array('as'=>'admin/role/delete','uses'=>'RoleController@delete'));
    Route::any('/admin/role/create',array('as'=>'admin/role/create','uses'=>'RoleController@create'));

    /**
     * 管理员路由
     */
    Route::get('/admin/user',array('as'=>'admin/user','uses'=>'UserController@index'));
    Route::any('/admin/user/{id}/edit',array('as'=>'admin/user/edit','uses'=>'UserController@edit'));
    Route::any('/admin/user/{id}/delete',array('as'=>'admin/user/delete','uses'=>'UserController@delete'));
    Route::any('/admin/user/create',array('as'=>'admin/user/create','uses'=>'UserController@create'));

    Route::any('/admin/cache/clear',array('as'=>'admin/cache/clear','uses'=>'CacheController@clear'));

    /**
     * 数据库
     */
    Route::any('/admin/database/index',array('as'=>'admin/database/index','uses'=>'DatabaseController@index'));
    Route::any('/admin/database/backup',array('as'=>'admin/database/backup','uses'=>'DatabaseController@backup'));
    Route::any('/admin/database/restore',array('as'=>'admin/database/restore','uses'=>'DatabaseController@restore'));
    Route::any('/admin/database/{sql}/delete',array('as'=>'admin/database/delete','uses'=>'DatabaseController@delete'));
    Route::any('/admin/database/{sql}/download',array('as'=>'admin/database/download','uses'=>'DatabaseController@download'));

    /**
     * 配置项
     */
    Route::any('/admin/sys/index',array('as'=>'admin/sys/index','uses'=>'SysController@index'));
    Route::any('/admin/sys/{id}/edit',array('as'=>'admin/sys/edit','uses'=>'SysController@edit'));
    Route::any('/admin/sys/{id}/delete',array('as'=>'admin/sys/delete','uses'=>'SysController@delete'));
    Route::any('/admin/sys/create',array('as'=>'admin/sys/create','uses'=>'SysController@create'));

    Route::get('admin', function () {
        return view('login.test',['page_title'=>'首页']);
    });

    Route::any('/admin/sys/sendtoEmail',array('as'=>'admin/sys/sendtoEmail','uses'=>'SysController@sendtoEmail'));


});

Route::auth();
//Route::get('login/login',array('as'=>'login','uses'=>'LoginController@login'));
    Route::get('test/addrole','TestController@addrole')->name('addrole');