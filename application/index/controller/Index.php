<?php
namespace app\index\controller;
use think\Input;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\blogComment as Comment;
use app\index\model\blogContent as Content;
class Index extends Controller
{

    public function index()
    {
        return $this->fetch();
    }
    public function blog(){
        $list = Content::all(); //使用blogContent的all方法获取所有blog内容
        $this->assign('list',$list);
//-------------------------------------------------------
// $list = \app\index\model\Blog::getText(); //旧方法已放弃
//          $test = "<script type=\"text/javascript\">
    
//     var test =document.getElementById(\"content\").getElementsByTagName(\"img\");
//     for(var i=0;i<test.length;i++){
//       test[i].style.height=\"100\";
//       test[i].style.width=\"100\";
// }
// alert(\"aaaas\");
// </script>";
//         $this->test1 =$test; 
//         $this->assign('test',$test);
// ----------------------------------------------------------
    	return $this->fetch('blog');
    }
     public function blog2(){    
        $dataId=Request::instance()->param('dataId');
        if(!isset($dataId)){
           $this->error("非法的拓展名！！");
        }
         $commentList = Comment::all(['dataId'=>$dataId]);//使用blogComment的all方法获得对应dataId的博客的评论。
         $content = Content::all(['dataId'=>$dataId]); //使用blogContent的all方法获得对应dataId的博客的内容和标题。
         //----------------------------------------------------------------------------------
         // $list = \app\index\model\Blog::blog2($dataId);  //旧方法 准备改动
         // $commentList = \app\index\model\Blog::comment($dataId);//旧方法 准备改动
         //------------------------------------------------------------------------------------
        $this->assign('dataId',$dataId);
        $this->assign('content',$content);
        $this->assign('commentList',$commentList);
       
        return $this->fetch('blog2');
    }
    public function commitComm(){
        $data['dataId']=input('dataId');
        $data['content'] = input('commentTextarea');
        $data['createDate']=date('Y-m-d H:i:s');
        // dump($data['dataId']); 测试
        // dump($data['content']);
        // dump($data['createDate']);
        $comment =new Comment;  //使用blogComment ，增加数据
        $comment ->dataId = $data['dataId'];
        $comment ->content = $data['content'];
        $comment ->createDate = $data['createDate'];
        if($comment->save()){
        $this->success('新增成功',url('index/index/blog2',array('dataId'=>$data['dataId'])));
        }else{
            echo "<script>alert(\"发表失败!\")</script>";
        }
    }

    // $check =  \app\index\model\Blog::submitComm($data); 旧方法 已放弃
    public function diary(){
    	 return $this->fetch('Diary');
    }
    
}
