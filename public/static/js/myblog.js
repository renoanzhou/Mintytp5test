 // $(document).ready(function(){  
 //    $("#submit").click(function(){
 //    var title = $("#title").val();
 //    var content=CKEDITOR.instances.content.getData();
 //    console.log(title);
 //    console.log(content);
 //     $.post("{:url('')}",{content:content,title:title},function(data){
 //        console.log(data);
 //        if(data=="1"){
 //          alert("添加成功");
 //          location.reload() 
 //        }else{
 //          alert("添加失败");
 //        }
 //      });
 //    })
 //  });
 //  $(document).ready(function(){
 //    $("#menuBtn").click(function(){
 //      if($("#sidebar").css("display")=="none"){
 //        $("#sidebar").css("display","block");
      
 //      }else{
 //         $("#sidebar").css("display","none");
 //      }
 //    })
 //  });
 
    function ajaxDelete(id){   //删除博客
    var id=id;
    $.post("deleteArticle",{id:id},function(data){    //容易出现post问题，应为路径问题
        if(data==true){
          alert("删除成功");
          location.reload() 
        }else{
          alert("删除失败");
        }
      });
  }
  function ajaxChange(id){
    var id=id;
    location.href="/tp5/public/index/admin/articleChange?id="+id;

  }

   $(document).ready(function(){  
    $("#submit").click(function(){
    var id =$("#articleId").text();//从网页文章号里获得id.
    var title = $("#title").val();
    var content=CKEDITOR.instances.content.getData();;
     $.post("articleChange1",{content:content,title:title,id:id},function(data){
          if(data==true){
            alert("修改成功");
          }
      });
    })
  })
  