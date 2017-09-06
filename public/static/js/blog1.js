$(document).ready(function(){  
    $("#submit").click(function(){
    var title = $("#title").val();
    var content=CKEDITOR.instances.content.getData();
    console.log(title);
    console.log(content);
     $.post("addarticle",{content:content,title:title},function(data){
        console.log(data);
        if(data=="1"){
          alert("添加成功");
          location.reload() 
        }else{
          alert("添加失败");
        }
      });
    })
  });
  $(document).ready(function(){
    $("#menuBtn").click(function(){
      if($("#sidebar").css("display")=="none"){
        $("#sidebar").css("display","block");
      
      }else{
         $("#sidebar").css("display","none");
      }
    })
  });