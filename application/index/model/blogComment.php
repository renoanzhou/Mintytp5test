<?php 
namespace app\index\model;
use think\Model;
class blogComment extends Model{
	protected $name = 'commenttest';
	protected $createTime = 'createDate';
	protected $updateTime = false;
	protected $autoWriteTimestamp = 'datetime';  //设置datetime格式
}	
 ?>
