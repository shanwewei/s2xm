<?php
	$uname=$_SESSION["uname"];
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	mysqli_query($conn, "set names utf8");
	$sql1="select * from t_user where uname='$uname'";
	$result1=mysqli_query($conn, $sql1);
	$row1=mysqli_fetch_assoc($result1);//当前用户的信息
	// print_r($row);
	$uid=$row1["id"];
	//查询当前uid的关注的商品
	
	$sql2="select imgid,title,subtitle,cond,curr,price,payment,s_des,pub_date,uid,sid
	 from t_sell,t_watch,t_image where t_watch.w_user_id =$uid and t_watch.w_sell_id=t_sell.sid
	 and t_image.s_img_id=t_sell.sid group by t_sell.sid";
	$result2=mysqli_query($conn, $sql2);
	while($row2=mysqli_fetch_assoc($result2)){
			$data[]=$row2;
	}
    echo json_encode($data);
?>
