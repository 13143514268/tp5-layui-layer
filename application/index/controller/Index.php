<?php
namespace app\index\controller;
use think\Loader;
use think\Db;
class Index
{
    public function index()
    {

        $password = md5('123456'.'mytest');
        $insert = ['username'=>'admin','password'=>$password,'rank'=>1,'c_time'=>time(),'u_time'=>time(),'create_time'=>date('Y-m-d H:i:s',time()),'update_time'=>date('Y-m-d H:i:s',time())];
        $one = Db::table('sys_admin_user')->where(['username'=>'admin'])->find();
        if ($one) {
            echo "该账户名已存在请重新选择";
        }else{
            $res = Db::table('sys_admin_user')->insert($insert);
            if ($res) {
                echo "插入成功";
            }
        }
        exit;
       echo "string === index";
    }

    public static function test()
    {
    	// echo "string";exit;
    	// $this->redirect('/index/');
    	Loader::action('Index/index');
    	// return 'The test can call';
    }

}
