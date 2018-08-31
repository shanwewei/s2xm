   var ip1;
    var ip2;
    var ip3;
 $(function () {
     $('#myTab a:last').tab('show');
    })
 function checkall(){
    if(ip1&&ip2&&ip3){
        $(".register").removeClass("disabled");
       
    }else{
         $(".register").addClass("disabled");
       
    }
}
function check1(){
    var reg=/^[a-z]|\d{6,10}$/;
    var user=document.getElementById("user");
      ip1=reg.test(user.value);
    console.log(ip1);
       $.ajax({
        url:"login2.php",
        type:"get",
        data:{
            uname:user.value
        },
        success:function(result){
            if(result==1){
                $("#kong").html("用户名重复，请重新输入");
            }
        }
    });
     
    if(user.value==""){
    	$("#kong").html();
    	$("#kong").html("用户名不能为空");
    }else if(user.value.length<6 || user.value.length>10){
    	$("#kong").html();
    	$("#kong").html("用户名长度为6-10个字符");
    }else{
    	$("#kong").html("<span class='glyphicon glyphicon-ok' style='color:green'>用户名</span>");
    }

      checkall();
}
function qing1(){
    $("#kong1").html("");
}
function qing2(){
    $("#kong2").html("");
}
function qing3(){
    $("#kong3").html("");
}
function check2(){
      var pass=document.getElementById("pass");
      var reg=/^\d{6,10}$/;
      ip2=reg.test(pass.value);
    // console.log(ip2);
    if(pass.value==""){
        $("#kong2").html();
        $("#kong2").html("密码不能为空");
    }else if(!reg.test(pass.value)){
        $("#kong2").html();
        $("#kong2").html("密码长度为6-10个数字");
    }else{
        $("#kong2").html("<span class='glyphicon glyphicon-ok' style='color:green'>密码</span>");
    }
      checkall();
}
function check3(){
      var phone=document.getElementById("phone");
       var reg=/^\d{11}$/;
       ip3=reg.test(phone.value);
      console.log(ip3);
    if(phone.value==""){
        $("#kong3").html();
        $("#kong3").html("手机号码不能为空");
    }else if(!reg.test(phone.value)){
        $("#kong3").html();
        $("#kong3").html("请输入有效的手机号码");
    }else{
        $("#kong3").html("<span class='glyphicon glyphicon-ok' style='color:green'>手机号码</span>");
    }
     checkall();
}

function register(){   
    $.ajax({
        url:"login.php",
        data:{
            uname:$("#user").val(),
            upass:$("#pass").val(),
            ugender:$("#male")[0].checked?"m":"f",
            uphone:$("#phone").val()
        },
        success:(result)=>{
            alert(result);
        }
    })
}

//login
function login2(){
    $("#lkong1").html("");
}
function login3(){
    $("#lkong2").html("");
}

function login(){
    $.ajax({
        url:"login4.php",
        data:{
            lname:$("#lname").val(),
            lpass:$("#lpass").val(),
            stay:$("#st").prop("checked")?"true":"false"
        },
        success:(result)=>{
            // console.log(result);
            if(result=="1"){
                 window.location="watchlist.html"; 
            }else{
                // console.log(result);
                 $("#lkong1").html("");
                $("#lkong1").html(result);
            }
            
        }
    })
}

$(function(){
    $.ajax({
        url:"head.php",
        success:(result)=>{
            console.log(result);
            if(result!=="0"){
                window.location="watchlist.html";
            }
        }
    })
})















