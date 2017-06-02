<?php 
namespace app\index\model;

class Admin extends \think\Model
{
	
	public function changepsw($username,$oldpassword,$newpassword){
		$result = db::where('password',$oldpassword);
		if($result){
			unset($_SESSION);

			$where['username']=$username;
			$where['password']=$oldpassword;
			db('user')->where($where)->update(['password' => $newpassword]);
			return true;
		}else{
			return false;
		}
	}
}	
 ?>
