<?php
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	
	// 获取要读取图片的id
	$imgid = (int)$_REQUEST["imgid"];
	
	$sql = "select imgtype, imgcontent from t_image where imgid = $imgid";
		
	$result = mysqli_query($conn, $sql);
		
	if ($row = mysqli_fetch_assoc($result)) {
		header("content-type: ".$row["imgtype"]);
		
		// 2、将数据库中的图片字符串转为图片资源格式
		$image = imagecreatefromstring($row["imgcontent"]);
	
		// 3、获得原始图片的宽高
		$image_w = imagesx($image);
		$image_h = imagesy($image);
		
		// 4、根据宽高按比例缩放
		
		// 定义最大的边长为200像素
		$max_edge = 100;
		
		// 判断是否需要缩放
		// 计算出缩略图片的宽高
		if ($image_w >= $max_edge || $image_h >= $max_edge) {
			// 判断到底是图片最高200，还是图片最宽200
			if ($image_w >= $image_h) {
				// 图片最宽就是200
				$thumbnail_w = $max_edge;
				// 图片的高按200比例缩放
				$thumbnail_h = $max_edge/$image_w * $image_h;
			} else {
				// 图片最高就是200
				$thumbnail_h = $max_edge;
				// 图片的宽按200比例缩放
				$thumbnail_w = $max_edge/$image_h * $image_w;
			}
		}
		
		// 5、通过缩略图的宽和高，构造出一幅空白的图片资源对象（用于后面在上面绘制图像）
		$thumbnail = imagecreatetruecolor($thumbnail_w, $thumbnail_h);
		
		// 6、通过缩放函数imagecopyresampled实现缩略图构建
		// 将原图$image的宽$image_w和高$image_h从原点（0，0）缩小绘制到缩略图$thumbnail的原点（0，0），宽度缩小到$thumbnail_w，高度缩小到$thumbnail_h
		imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $thumbnail_w, $thumbnail_h, $image_w, $image_h);
		
		// 7、通过对应的图片构建函数，将缩略图输出到浏览器
		/*
		 * imagepng	输出png格式图片
		 * imagejpeg	输出jpeg格式图片
		 * imagegif	输出gif格式图片
		 */
		switch($row["imgtype"]) {
			case "image/jpeg":
				imagejpeg($thumbnail);
				break;
			case "image/gif":
				imagegif($thumbnail);
				break;
			case "image/png":
				imagepng($thumbnail);
				break;
		}
	}
?>