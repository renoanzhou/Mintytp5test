  function checklogin(){   //验证账号密码
      var un =document.getElementById("un").value;
      var pw =document.getElementById("ps").value;
      console.log(un);
      console.log(pw);
    $.post("/tp5/index/adminlogin/checklogin",{un:un,pw:pw},function(data){    //容易出现post问题，应为路径问题
        console.log("test");
        if(data==false){
           console.log("test");
            document.getElementById("wrongTips").style.display="block"; 
           setTimeout('a()',3000);
           
        }
      });
  }
  function a(){
        document.getElementById("wrongTips").style.display="none"; 
    }