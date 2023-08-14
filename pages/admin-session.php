<?php
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
include 'connection.php';

	if (isset($_SESSION['approved_type'])) {
		$type = $_SESSION['approved_type'];

		if($type == 'Admin') {
			echo "<script>alert('Out of limit.')</script>";
			$session = "admin-dashboard.php";
			echo("<script>location.href='$session'</script>");
		}
	}else {
		echo "<script>alert('Login first before entering the page.')</script>";
		$session = "../orthoc/index.php";
		echo("<script>location.href='$session'</script>");
	}
?>