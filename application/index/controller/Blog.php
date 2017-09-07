<?php 
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\index\model\blogComment as Comment;
use app\index\model\blogContent as Content;
class Blog extends Controller {

	public function index(){
		$list = Content::all(); //使用blogContent的all方法获取所有blog内容
        $this->assign('list',$list);
		return $this->fetch();
	}
	public function blog(){           //blog具体内容页面的渲染
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
       
        return $this->fetch('blog1');
	}

	public function commitComment(){    //提交评论
		$data['dataId']=input('dataId');
        $data['content'] = input('commentTextarea');
        // dump($data['dataId']); 测试
        // dump($data['content']);
        // dump($data['createDate']);
        $comment =new Comment;  //使用blogComment ，增加数据
        $comment ->dataId = $data['dataId'];
        $comment ->content = $data['content'];
        if($comment->save()){
        $this->success('新增成功',url('index/blog/blog',array('dataId'=>$data['dataId'])));
        }else{
            echo "<script>alert(\"发表失败!\")</script>";
        }
	}
	public function download(){
		return $this->fetch();
	}
}


 ?>