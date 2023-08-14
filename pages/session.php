<?php if (session_status() == PHP_SESSION_NONE){ session_start(); }
include 'connection.php';

	if(isset($_SESSION['approved_type'])) {

	}	else {
		echo "<script>alert('Login first before entering the page.')</script>";
		$session = "../index.php";
		echo("<script>location.href='$session'</script>");
	}
?>