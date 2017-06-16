<?php
namespace app\index\controller;
use think\Input;
use think\Controller;
use think\Db;
use think\Request;
class Index extends Controller
{

    public function index()
    {
        return $this->fetch();
    }
    public function blog(){
        $list = \app\index\model\Blog::getText();
        $this->assign('list',$list);
    	return $this->fetch('blog');
    }
     public function blog2(){    
        $dataId=Request::instance()->param('dataId');
        if(!isset($dataId)){
           $this->error("非法的拓展名！！");
        }
        $list = \app\index\model\Blog::blog2($dataId);
        $commentList = \app\index\model\Blog::comment($dataId);
        $this->assign('dataId',$dataId);
        $this->assign('list',$list);
        $this->assign('commentList',$commentList);
        return $this->fetch('blog2');
    }
    public function commitComm(){
        $data['dataId']=input('dataId');
        $data['content'] = input('commentTextarea');
        $data['createDate']=date('Y-m-d H:i:s');
        dump($data['dataId']);
        dump($data['content']);
        dump($data['createDate']);
        $check =  \app\index\model\Blog::submitComm($data);
        if($check){
        $this->success('新增成功',url('index/index/blog2',array('dataId'=>$data['dataId'])));
        }else{
            echo "<script>alert(\"发表失败!\")</script>";
        }
    }
    public function diary(){
    	 return $this->fetch('Diary');
    }
    
}
