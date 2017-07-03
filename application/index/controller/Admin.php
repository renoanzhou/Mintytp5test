<?php 
namespace app\index\controller;
use think\Controller;
use think\Session;
use think\Request;
use Exception;
use think\view;
use app\index\model\Login;
class Admin extends Controller{
	// public function changepswp(){
	// 	return $this->fetch();
	// }
	public function login(){
		if(Session::has('username')){
			$this->success("已登录，跳转至管理页面",'tp5/public/index/admin/admin');
		}
		return $this->fetch();
	}
	public function logining(){

		$username=Request::instance()->param('username');
		$password=Request::instance()->param('password');
		$check=Login::login($username,$password);
		if($check){
			$this->success("修改成功",'tp5/public/index/admin/admin');
		}else{
			$this->error("有误");
		}
	}
	public function article(){

		if(!Session::has('username')){
			$this->error("出错！");
		}
		$this->assign('username',getUserName());
		return $this->fetch();
	}
	public function getUserName(){
		return Session::get('username.username');
	}
	public function addarticle(){
		if(!Session::has('username')){
			$this->error("出错！");
		}
	  $content=Request::instance()->param('content');
	   $title=Request::instance()->param('title');
	   $check = \app\index\model\Admin::addArticleToBb($content,$title);
	   return $check;
	}
	public function articleCharge(){
		if(!Session::has('username')){
			$this->error("出错！");
		}
		$data = \app\index\model\Admin::queryArticle();
		//两次for循环，将content的内容缩减为20字以内。
		// for($a=0;$a<count($data);$a++){
		// 	$arr =$data[$a]["content"];
		// 	$arr1;
		// 	for($i=0;$i<strlen($arr);$i++){
		// 		if($i<20){//修改$i<? 可以将content限定?字以内。
		// 	    $arr1[$i]=$arr[$i];}
		// 	}
		// 	$data[$a]["content"]=implode("",$arr1);
		// }
		$this->assign('username',Admin::getUserName());
		$this->assign('data',$data);
		return $this->fetch();
	}
	// public function changepsw(){
	// 	if(Session::get('username')==null){
	// 		$this->error("出错");
	// 	}
	// 	$oldpassword=input('post.oldpassword');
	// 	$username = $_SESSION['sess_user'];	
	// 	$newpassword1 = input('post.newpassword1');
	// 	$newpassword2 = input('post.newpassword2');
	// 	if(newpassword1!=newpassword2){
	// 		$this->error("新密码不一致");
	// 	}
	// 	$result=Admin::changepsw($username,$oldpassword,$newpassword1);
	// 	if($result){
	// 		$this->success("修改成功",'tp5/public/index/login/login');
	// 	}else{
			
	// 	}
	// }
	
	public function admin(){
		if(!Session::has('username')){
			$this->error("出错！");
		}
		$view = new View();
		$view->name ='' ;
		$view->assign('username',Admin::getUserName());
		dump(Admin::getUserName());
		return $view->fetch();
	}
	public function deleteArticle(){ //删除article，接受post
		if(!Session::has('username')){
			$this->error("出错！");
		}
		$id =Request::instance()->param('id');
		$check = \app\index\model\Admin::deleteArticle($id);
		if($check){
		  return true;
		}else{
		  return false;
		}
	}
	public function exitAdmin(){
		if(!Session::has('username')){
			$this->error("出错！");
		}
	  session(null);
	  $this->success("退出成功",'/tp5/public/index/admin/login');
	}
	public function articleChange(){ 
	  //修改article页面，负责从数据库拿数据并放入页面
		if(!Session::has('username')){
			$this->error("出错！");
		}
		$id = Request::instance()->param('id');
		$data=\app\index\model\Admin::articleChange($id);
		 $this->assign('content',$data[0]["content"]);
		 $this->assign('title',$data[0]["contentTitle"]);
		 $this->assign('username',getUserName());
		 $this->assign('id',$id);
		return $this->fetch();		
	}
	public function articleChange1(){//修改article,接收请求，并讲修改内容上传至数据库
		if(!Session::has('username')){
			$this->error("出错！");
		}
		$content=Request::instance()->param('content');
	   $title=Request::instance()->param('title');
	   $id=Request::instance()->param('id');
	   $check=\app\index\model\Admin::articleChange1($id,$content,$title);
	   if($check){
	     return true;
	   }else{
	   	$this->error("修改失败...");
	   }
	}

}