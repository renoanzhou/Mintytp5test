<?php 
namespace app\index\model;
use \think\Model;
class Login extends Model {
	public static function login($username,$password){
		$where['username'] = $username;
		$where['password'] = $password;

		$user = Db('user')->where($where)->find();
		if($user){
			unset($user["password"]);
			session("sess_user",$user);
			return true;
		}else{
			return false;
		}
	}

}
