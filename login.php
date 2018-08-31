<?php
	header("content-type: text/plain; charset=utf-8");
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	mysqli_query($conn, "set names utf8");
	// print_r($_REQUEST);
	$sql="insert into t_user(uname,upassword,ugender,uphone) values('".$_REQUEST["uname"]."','".$_REQUEST["upass"]."','".$_REQUEST["ugender"]."','".$_REQUEST["uphone"]."')";
	$result=mysqli_query($conn, $sql);
	if ($result) {
		echo "注册成功,请登录";
	} else {
		echo "注册失败";
	}
?>