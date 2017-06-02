<?php 
namespace app\index\controller;
use think\Controller;
use think\Session;
class Admin extends Controller{
	public function admin(){
		return $this->fetch();
	}
	public function changepswp(){
		return $this->fetch();
	}
	public function changepsw(){
		if(Session::get('username')==null){
			$this->error("出错");
		}
		$oldpassword=input('post.oldpassword');
		$username = $_SESSION['sess_user'];	
		$newpassword1 = input('post.newpassword1');
		$newpassword2 = input('post.newpassword2');
		if(newpassword1!=newpassword2){
			$this->error("新密码不一致");
		}
		$result=Admin::changepsw($username,$oldpassword,$newpassword1);
		if($result){
			$this->success("修改成功",'tp5/public/index/login/login');
		}else{
			
		}
	}
}