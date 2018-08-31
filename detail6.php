<?php
	$sellid=$_SESSION["simgid"];//sell的sid
	// echo $sellid;
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
		
	$sql = "select count(w_user_id) from t_watch where w_sell_id = $sellid";
	$result= mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	// print_r($row);
	echo $row["count(w_user_id)"];//当前sellid查询到的关注人数
?>