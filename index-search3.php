<?php
   	class Result{
   		public $data;// 分页数据（数组）
   		public $pageno;// 当前第几页
   		public $pagetotal;// 一共分多少页
   		public $pagesize;	// 每页分多少行
   		function Result($data, $pageno, $pagetotal, $pagesize){
			$this->data = $data;
			$this->pageno = $pageno;
			$this->pagetotal = $pagetotal;
			$this->pagesize = $pagesize;
		}
   	}

   	$pageno=isset($_REQUEST["pageno"])?$_REQUEST["pageno"]:1;
   	$pagesize=2;


    $keyword=isset($_SESSION["keyword"])?$_SESSION["keyword"]:"";
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
	$sql2="select imgid,t_sell.*  from t_sell,t_image where t_sell.title like '%$keyword%' and t_sell.sid=t_image.s_img_id group by t_image.s_img_id limit ".($pageno-1)*$pagesize.", ".$pagesize;
	$result2=mysqli_query($conn, $sql2);
	$data=[];
	while($row2=mysqli_fetch_assoc($result2)){
			$data[]=$row2;
	}
    // echo json_encode($data);
	$sql3="select ceil(count(1)/$pagesize) from t_sell where t_sell.title like '%$keyword%'";
    $result3=mysqli_query($conn,$sql3);
    $row3=mysqli_fetch_array($result3);
    $pagetotal=$row3[0];//
    // echo $pagetotal;一共分多少页
    

    // 释放数据库连接资源
	mysqli_close($conn);

	$result=new Result($data,(int)$pageno,(int)$pagetotal, (int)$pagesize);
	echo json_encode($result);
?>