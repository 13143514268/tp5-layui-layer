<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Cache;
use think\Session;
class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public static function dologin()
    {
    	$post = input('post.');
    	empty($post['username'])?exit(json_encode(['num'=>0,'msg'=>'username cant not be null'])):1;
    	empty($post['password'])?exit(json_encode(['num'=>0,'msg'=>'password cant not be null'])):1;
    	$password = md5($post['password'].'mytest');
    	$admin_user=  Db::table('sys_admin_user')->where(['username'=>$post['username'],'password'=>$password])->find();
    	if ($admin_user) {
    		Session::set('adminid',$admin_user['id']);
    		$data = ['num'=>1,'msg'=>'success'];
    	}else{
    		$data = ['num'=>0,'msg'=>'error'];
    	}
    	return json_encode($data);
    }

}



