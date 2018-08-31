<?php
	header("content-type: text/plain; charset=utf-8");
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	mysqli_query($conn, "set names utf8");
	// $sql="select uname from t_user";
	// $result=mysqli_query($conn, $sql);
	$uname=$_REQUEST['uname'];
	$sql2="select * from t_user where uname='$uname'";
	$result2=mysqli_query($conn, $sql2);
    // $unames=[];
	// echo($_REQUEST["uname"]);
	if ($result2) {
		if(mysqli_num_rows($result2)){
			// $unames[] = $row2["uname"];
			echo 1;
		}
		// print_r($unames);
		

	} else{
		echo $sql2;
	}
    

?>