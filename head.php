<?php
	if(empty($_SESSION["uname"])&&empty($_COOKIE["uname"])){
		echo 0;
	}else{
		if(empty($_SESSION["uname"])){
			echo $_COOKIE["uname"];
			$_SESSION["uname"] = $_COOKIE["uname"];
		}else{
			echo $_SESSION["uname"];
		}
	}
?>