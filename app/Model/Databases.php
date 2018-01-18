<?php
/**
 * Created by PhpStorm.
 * User: xiaoxie
 * Date: 2017/12/27
 * Time: 14:17
 **/

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Databases extends Model
{
     protected $dbnames;

    public function __construct()
    {
        $name = env('DB_DATABASE');
        $this->dbnames  = $name;
    }

    protected function  getTableStatus()
    {
        $result=DB::select("SHOW TABLE STATUS ");

        return $result;
    }

    /**
     * Created by PhpStorm.
     * function: getTables
     * Description:获取所有的表
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @return array
     *
     */
     protected function getTables()
    {
        //查询不包含视图的表
        $result=DB::select("SHOW FULL TABLES FROM `{$this->dbnames}` WHERE Table_Type = 'BASE TABLE'");

        foreach ($result as $v){
            $name = 'Tables_in_'.$this->dbnames;
            $tables[]=$v->$name;
        }
        return $tables;

    }

    /**
     * Created by PhpStorm.
     * function: getViews
     * Description:获取视图
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @return array
     *
     */
     protected function getViews()
    {
        $result = DB::select("SHOW FULL TABLES FROM `{$this->dbnames}` WHERE Table_Type = 'VIEW'");
        foreach ($result as $v){
            $name = 'Tables_in_'.$this->dbnames;
            $views[]=$v->$name;
        }
        return $views;
    }

    /**
     * Created by PhpStorm.
     * function: getTableViews
     * Description:获取所有的表和视图
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @return array
     *
     */
     protected function getTableViews()
    {
        $result = DB::select("SHOW  TABLES FROM `{$this->dbnames}`");
        foreach ($result as $v){
            $name = 'Tables_in_'.$this->dbnames;
            $tables[]=$v->$name;
        }
        return $tables;
    }

    /**
     * Created by PhpStorm.
     * function: createTableSql
     * Description:获取创建表sql
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param string $table
     * @return mixed
     *
     */
    protected function createTableSql($table='')
    {
        $result = DB::select("SHOW CREATE TABLE  `{$table}`");
        $name = "Create Table";
        return $result[0]->$name.';';
    }

    /**
     * Created by PhpStorm.
     * function: getAndInserTableData
     * Description: 导出sql和数据
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param string $table
     * @return string
     *
     */
    protected function getAndInserTableData($table='')
    {
        $result = DB::select("SHOW COLUMNS FROM `{$table}`");
        $field = '';//字段
        foreach ($result as $value)
        {
            $field .=  "`{$value->Field}`".',';
        }

        //拼装 (id,status,,,,,)
        $field = substr($field,0,-1);
        $lists = DB::table($table)->get();
        if ($lists)
        {

            $sql = "";
            foreach ($lists as $list)
            {
                $values = '';
               foreach ($list as $value){
                   $values .= "'$value'".',';
               }
                $values = substr($values,0,-1);
                $sql .= " INSERT INTO $table($field) VALUES ($values);\r\n";
            }

        }
        return $sql;
    }


    protected function sqlToFile($tables = [], $sqlcreate = [], $datasql =[])
    {
        $host = env('DB_HOST');
        $date = date('Y-m-d H:i:s');
        $sqlstr = "#MySQL 备份\r\n";
        $sqlstr .= "#Host: $host \r\n";
        $sqlstr .= "#Date: $date \r\n";
        $sqlstr .= "#Databases: $this->dbnames \r\n";
        $sqlstr .="#禁用外键约束\r\n";
        $sqlstr .= "SET FOREIGN_KEY_CHECKS=0;\r\n";
        $sqlstr .= "set names 'utf8'; \r\n";

        //表sql
        if (!empty($tables))
        {
            $i = 0;
            foreach ($tables as $table)
            {
                $sqlstr .="# Structure for table $table\r\n";
                $sqlstr .= " DROP TABLE IF EXISTS $table;\r\n";
                $sqlstr .= "$sqlcreate[$i]\r\n";

                //写入数据
                $sqlstr .= "# Data for table $this->dbnames\r\n";
                $sqlstr .= "$datasql[$i]\r\n";
                $i++;
            }
        }
        $filename = config('app.databaseurl').DIRECTORY_SEPARATOR.date('Y_m_dHis').'.sql';
        $result = file_put_contents($filename,$sqlstr);
        return $result;

    }


    /**
     * Created by PhpStorm.
     * function: restore
     * Description:获取备份sql文件
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @return array
     *
     */
    protected function getSqlFile()
    {

        $path = config('app.databaseurl');
        $filearr = $this->getfile($path);
        return $filearr;
    }

    /**
     * Created by PhpStorm.
     * function: getfile
     * Description:遍历数据目录
     * User: Xiaoxie
     * Email 736214763@qq.com
     * @param $path
     * @return array
     */
    protected function getfile($path){
        $arr = [];
        foreach(scandir($path) as $key=>$file)
        {
            if($file=='.'||$file=='..') continue;
            if(is_dir($path.DIRECTORY_SEPARATOR.$file))
            {
                $this->getfile($path.DIRECTORY_SEPARATOR.$file);
            } else {
                $arr[$key]['filename'] =$file;
                $arr[$key]['size'] = round(filesize($path.DIRECTORY_SEPARATOR.$file)/1000);
                $arr[$key]['time'] = date('Y-m-d H:i:s',fileatime($path.DIRECTORY_SEPARATOR.$file));
            }
        }
        return $arr;
    }

    protected function restore($sql)
    {
        $dbms='mysql';     //数据库类型
        $host=env('DB_HOST'); //数据库主机名
        $dbName= env('DB_DATABASE');   //使用的数据库
        $user=env('DB_USERNAME');     //数据库连接用户名
        $pass=env('DB_PASSWORD');         //对应的密码
        $dsn="$dbms:host=$host;dbname=$dbName";
        try {
            $dbh = new \PDO($dsn, $user, $pass); //初始化一个PDO对象

            $result = $dbh->query($sql);
            if ($result)
            {
                return true;
            }
            $dbh = null;
        } catch (PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
    }

    /*********************************************************
     *                                                       *
     *              MySQL 备份                                         *
     *                                                       *
     *                                                       *
     *                                                       *
     *                                                       *
     *                                                       *
     *                                                       *
     *********************************************************/

}