<?php
 	class Message{
 		public $title;
 		public $subtitle;
 		public $cond;
 		public $curr;
 		public $price;
 		public $payment;
 		public $desc;
 		public $date;
 		function Message($title,$subtitle,$cond,$curr,$price,$payment,$desc,$date){
 			$this->title=$title;
 			$this->subtitle=$subtitle;
 			$this->cond=$cond;
 			$this->curr=$curr;
 			$this->price=$price;
 			$this->payment=$payment;
 			$this->desc=$desc;
 			$this->date=$date;
 		}
 	}
	$conn = mysqli_connect("localhost:3306", "root", "123456", "itany");
		$sid=$_SESSION["simgid"];
	$sql = "select * from t_sell where sid= $sid";
	$result = mysqli_query($conn, $sql);
	if($row=mysqli_fetch_assoc($result)){
		// print_r($row);
		echo json_encode(new Message($row["title"],$row["subtitle"],$row["cond"],$row["curr"],$row["price"],$row["payment"],$row["s_des"],$row["pub_date"]));
		
	}
?>