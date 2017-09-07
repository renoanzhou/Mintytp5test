<?php 
namespace app\index\model;
use think\Model;

class blogContent extends Model{
	protected $name = 'test';
	protected $autoWriteTimestamp = 'datetime';//设置为datetime格式
	 //自动往数据库填入DATetime格式的时间。
	//需要设置全局文件才能更新时间，在model里设置会出问题。
	 protected $createTime = 'createDate';  //数据库字段不为createtime时，自定义。

}


 ?>