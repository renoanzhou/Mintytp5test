<?php 
namespace app\index\model;
use think\Model;

class blogContent extends Model{
	protected $name = 'test';
	protected $autoWriteTimestamp = 'datetime';//设置为datetime格式
	 //自动往数据库填入DATetime格式的时间。
	protected $autoWriteTimestamp = false;

	 protected $createTime = 'createDate';  //数据库字段不为createtime时，自定义。

}


 ?>