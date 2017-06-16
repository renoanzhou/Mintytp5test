<?php 
namespace app\index\model;
use \think\Model;
use \think\Db;


class Blog extends Model {
	protected $autoWriteTimestamp = 'datetime';
	protected $createTime = 'createDate';
	public static function blog(){
		
	}
	public static function getText(){
		$list = Db::table('test')->select();
		return $list;
	}
	public static function blog2($dataId){
		$list = Db::table('test')->where('dataId',$dataId)->select();
		return $list;
	}
	public static function comment($dataId){
		$commentList = Db::table('commenttest')->where('dataId',$dataId)->select();
		return $commentList;
	}
	public static function submitComm($data){
		$check=db('commenttest')->insert($data);
		return $check;
	}

}