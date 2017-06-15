<?php 
namespace app\index\model;
use \think\Model;
use \think\Db;
class Blog extends Model {
	public static function blog(){
		
	}
	public static function getText(){
		$list = Db::table('test')->select();
		return $list;
	}
	public static function blog2($id){
		$list = Db::table('test')->where('id',$id)->select();
		return $list;
	}

}