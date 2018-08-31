<?php
	$imgid=$_REQUEST["imgid"];
	// console.log($imgid);
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	$sql="select * from t_image where imgid = $imgid";
		$result = mysqli_query($conn, $sql);
		
		if ($row = mysqli_fetch_assoc($result)) {
			// echo $row["imgtype"];
			// 必须告诉浏览器如何解析当前响应的图片格式类型
			header("content-type: ".$row["imgtype"]);
			// 直接将图片内容输出即可
			echo $row["imgcontent"];
		} else {
			header("content-type: text/html; charset=utf-8");
			exit("查无此图片！");
		}
?>