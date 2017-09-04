<?php 
namespace app\index\Model;
use think\Model;
use think\Db;

class BaseModel extends Model{
	public function addData($data){
		$id = $this->add($data);
		return $id;
	}

	public function editData($map,$data){
		$result = $this->where($map)->save($data);
	}
}

 ?>
