<?php
namespace app\index\controller;
use think\Input;
use think\Controller;
use think\View;
use Captcha;
use app\index\Model\Goods;
class Login extends Controller
{
    public function login()
    {
        return $this->fetch();
    }
    public function logining(){
    	$username = input('post.username');
    	$password = input('post.password');

    	$check = \app\index\model\Login::login($username,$password);
    	if($check){
    		header('Location:/tp5/public/index/admin/admin');
            exit();
    	}else{
    		return $this->error("用户名错误或密码错误","Login/login");
    	}
    }
    public function test(){
        $a['goodsname'] = "test";
        $a['price'] = 1.2;


        $goods = new Goods;
        $goods->goodsname='test';
        $goods->price='1.1';
        $goods->save();
        return $this->fetch();
    }
}
