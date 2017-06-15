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
        $id=Request::instance()->param('id');
        $list = \app\index\model\Blog::blog2($id);
        $this->assign('list',$list);
        return $this->fetch('blog2');
    }
    public function diary(){
    	 return $this->fetch('Diary');
    }
    public function test(){
    	$message = \app\index\model\Admin::showmsg();
    	// dump($list);
    	$mess1='aaa';
    	 $this->assign('aaa',$message);
    	return $this->fetch();
    }
}
