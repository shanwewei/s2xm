<?php
    header("content-type: text/html; charset=utf-8");
    $conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
    mysqli_query($conn, "set names utf8");
    $sql="select * from t_user where uname='".$_REQUEST["lname"]."'";
    
    $result=mysqli_query($conn, $sql);
    if(!empty($_SESSION["uname"])){
    	echo 1;   	
    }else if(!empty($_COOKIE["uname"]) && !empty($_COOKIE["upass"])){
    	$_SESSION["uname"] = $_COOKIE["uname"];
        $_SESSION["upass"] = $_COOKIE["upass"];
        echo 1;
    }else{
        if ($row=mysqli_fetch_assoc($result)) {
          if($row["upassword"]==$_REQUEST["lpass"]&&$_REQUEST["stay"]=="true"){
            echo 1;
             $_SESSION["uname"] = $_REQUEST["lname"];
             $_SESSION["upass"] = $_REQUEST["lpass"];
            setcookie("uname", $_REQUEST["lname"],time()+1000, "/");
            setcookie("upass", $_REQUEST["lpass"], time()+1000, "/");
          }else if($row["upassword"]==$_REQUEST["lpass"]){
                 echo 1;
             $_SESSION["uname"] = $_REQUEST["lname"];
             $_SESSION["upass"] = $_REQUEST["lpass"];
          }else{
             echo "密码错误，请重新输入";
          }
       
        } else {
        echo "用户名未注册，请先注册";
       }
    	

    }
?>