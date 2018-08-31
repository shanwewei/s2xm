<?php
  $imgid=$_SESSION["simgid"];
 	// echo $imgid;
		$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
		
		$sql1 = "select * from t_image where s_img_id = $imgid";
		$result1 = mysqli_query($conn, $sql1);
		$imgs=[];//当前$imgid用户的所有图片编号
		if($result1){
			while($row1=mysqli_fetch_assoc($result1)){
				$imgs[]=$row1["imgid"];
			}
			echo json_encode($imgs);
		}
?>