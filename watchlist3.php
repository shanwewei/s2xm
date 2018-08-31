<?php
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	$uname=$_SESSION["uname"];
	mysqli_query($conn, "set names utf8");
	$sql1="select * from t_user where uname='$uname'";
	$result1=mysqli_query($conn, $sql1);
	$row1=mysqli_fetch_assoc($result1);//当前用户的信息
	$uid=$row1["id"];//当前用户的uid
	// echo $uid;
	$sql = "delete from t_watch where w_user_id=$uid and w_sell_id=".$_REQUEST["sid"];
	$result = mysqli_query($conn, $sql);
	if($result){
		echo 0;
	}
?>