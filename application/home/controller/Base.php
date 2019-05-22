<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Cache;
use think\Session;
use think\Loader;

class Base extends Controller
{
     function __construct()
    {
        self::authLogin();
    }
    public function authLogin()
    {
    	$adminid = Session::get('adminid');
        if (empty($adminid)) {
            $this->redirect('Login/index');
        }
        return view();

    }



    
}


