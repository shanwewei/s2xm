<?php
	$sellid=$_SESSION["simgid"];//sell的sid
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	$uname=$_SESSION["uname"];
	$sql = "select id from t_user where uname = '$uname'";
	$result= mysqli_query($conn, $sql);
	if($result){
		$row=mysqli_fetch_assoc($result);
		// print_r($row);
		$uid=$row["id"];			
	}
	
	$sql2="select * from t_watch where w_sell_id=$sellid and w_user_id=$uid";
	$result2= mysqli_query($conn, $sql2);
	if($row=mysqli_fetch_assoc($result2)){
		echo 0;    //用户已经关注过
	}else{
		$sql3="insert into t_watch(w_user_id,w_sell_id) values($uid,$sellid)";
		$result3= mysqli_query($conn, $sql3);
		if($result3){
			echo 1;
		}
	}
?>