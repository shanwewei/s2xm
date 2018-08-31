<?php
	$sellid=$_SESSION["simgid"];//sell的sid
	$uname=$_SESSION["uname"];
	// echo $uname;
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
		
	$sql = "select id from t_user where uname = '$uname'";
	$result= mysqli_query($conn, $sql);
	if($result){
		$row=mysqli_fetch_assoc($result);
		// echo $row["uid"];	
		$uid=$row["id"];			//当前sellid对应的uid
		// print_r($row);
	}
	
	$sql2="select * from t_watch where w_sell_id=$sellid and w_user_id=$uid";
	$result2= mysqli_query($conn, $sql2);
	if($row=mysqli_fetch_assoc($result2)){
		echo 0;    
	}else{
		echo 1;
	}
?>