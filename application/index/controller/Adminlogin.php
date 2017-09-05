<?php 
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\model\blogUser as User;
class Adminlogin extends Controller{
	public function login(){

		if(Session::has('username')){
			$this->success("已登录，跳转至管理页面",'tp5/public/index/admin/index');
		}
		return $this->fetch();
	
	}
	public function adminlogin(){
		
	}
	public function checkLogin(){ //验证账号密码
		$un = input('post.un');
    	$pw = input('post.pw');
    	$user = User::get($un); //查询
    	if($user!=null){
    		if($user->password==$pw){
    		  unset($user->password);//清空密码
    		  session("username",$user);
    		  $this->success("登录成功",'tp5/public/index/admin/index');
    		}else{
    		  $this->error("用户名或密码错误","login");	
    		}
    	}else{
    		// $this->error("用户名或密码错误","login");
    		// echo "<script>alert(\"aa\")</script>";
    		return false;
    	}
	}

}	
 ?>
