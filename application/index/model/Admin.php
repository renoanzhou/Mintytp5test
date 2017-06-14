<?php 
namespace app\index\model;
use think\Db;
class Admin extends \think\Model
{
	
	public static function changepsw($username,$oldpassword,$newpassword){
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
	public static function showmsg(){
		$lists=db::name('user')->where([])->order('username desc')->paginate(2);
		return $lists;
	}
}	
 ?>
