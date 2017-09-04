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
		$lists=db::name('test')->where([])->order('dataId desc')->paginate(10);
		return $lists;
	}
	// public static function addArticleToBb($content,$title){

	// 	$data["dataId"] = time();
	// 	$data["content"] = $content;
	// 	$data["contentTitle"] = $title; 
	// 	// $data = new Content;
	// 	// $data->dataID = time();
	// 	// $data->content = $content;
	// 	// $data->contentTitle = $title;

	// 	$check=Db::table('test')->insert($data);
	// 	return $check;
	// }
	public static function queryArticle(){
		$data=db::name('test')->where([])->order('dataId desc')->paginate(10);
		return $data;
	}
	public static function limitNum($number,$data,$element){
		for($a=0;$a<9;$a++){
			$arr =$data[$a]["content"];
			unset($arr1);
			for($i=0;$i<strlen($arr);$i++){
				if($i<$number&&$number<strlen($arr)){//修改$i<? 可以将element限定?字以内。
			    $arr1[$i]=$arr[$i];
				}else if($i<strlen($arr)&&$number>strlen($arr)){
				 $arr1[$i]=$arr[$i];
				}
			}
			if($number<strlen($arr)){//加上省略号
				$arr1[$number]="...";
			}
			$data[$a][$element]=implode("",$arr1);
		}
		return $data;
		}
	public static function deleteArticle($id){
		$check=db('test')->where('dataId',$id)->delete();
		return $check;
	}
	public static function articleChange($id){ //从数据库获得修改前的内容
	  $data = Db::query("select content,contentTitle from test where dataId='{$id}'");
	  return $data;
	}
	public static function articleChange1($id,$content,$title){//修改内容上传至数据库
		$check=db('test')->where('dataId',$id)->update(['content' => $content,'contentTitle' => $title]);
		return $check;
	}

	}	
 ?>
