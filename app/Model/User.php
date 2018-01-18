<?php
namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','uname','qq','status','description','mobile_phone',
    ];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * status获取
     * @param $value
     * @return mixed
     */
    public function getStatusAttribute($value)
    {
        $status =  ['0'=>'注销','1'=>'有效','2'=>'停用'];
        return $status[$value];
    }

    /**
     * status 还原回去
     * @param $value
     * @return array
     */
   /* public function setStatusAttribute($value)
    {
        $status =  ['0'=>'注销','1'=>'有效','2'=>'停用'];
        return array_keys($status,$value);
    }*/

}