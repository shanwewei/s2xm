<?php
	// header("content-type: text/html; charset=utf-8");
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	mysqli_query($conn, "set names utf8");
	$sql1="select id from t_user where uname='".$_SESSION["uname"]."'";
	$result1=mysqli_query($conn, $sql1);
	$row1=mysqli_fetch_assoc($result1);
	// echo $row1["id"];
	// echo $_REQUEST["desc"];
	// print_r($_REQUEST);
	date_default_timezone_set("Asia/Shanghai");
	$sql2="insert into t_sell(title,subtitle,cond,curr,price,payment,s_des,pub_date,uid) values
			('".$_REQUEST["title"]."','".$_REQUEST["subtitle"]."','".$_REQUEST["cond"]."','".$_REQUEST["curr"]."','".$_REQUEST["price"]."','".$_REQUEST["payment"]."','".$_REQUEST["desc"]."','".date('Y-m-d H:i:s')."','".$row1["id"]."')";
	$result2=mysqli_query($conn, $sql2);
	if($result2){
		echo "插入成功";
	}
    $sid = mysqli_insert_id($conn);
	//图片
	print_r($_FILES);
	foreach ($_FILES as $file) {
		// 1、获取要读取的文件路径（包括完整的目录和文件名）
		if($file["name"]){
			$target = $file["tmp_name"];
		// 2、打开文件（返回文件指针，用于引用文件系统中的某个文件）
		//	rb模式: read binary 只读二进制方式打开该文件（性能更好）
		$fp = fopen($target, "rb");
		// 3、获得文件大小（返回文件字节数）
		$size = filesize($target);
		// 4、根据文件指针读取相应大小的字节内容
		$content = fread($fp, $size);
		// 5、转义字符串中与MySQL特殊字符（'\%_.这类查询关键字符）冲突的字符
		$content = addslashes($content);
		// 6、直接将这个字符串内容插入到数据库中对应的mediumblob列中
		
		$sql3 = "insert into t_image(imgtype, imgcontent,s_img_id) values('".$file["type"]."', '$content',$sid)";
		
		$result3 = mysqli_query($conn, $sql3);
		
		if ($result3){

			echo "success";
			setcookie("simgid",$sid ,time()+1000, "/");
			$_SESSION["simgid"] = "$sid";
			header("location: details.html");
		}else{
			echo 0;
		}
		}
		
	}
?>