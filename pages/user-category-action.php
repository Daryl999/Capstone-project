<?php

include "connection.php";

if (isset($_POST['submit'])) {

	$categoryname= $_POST['categoryname'];

$dup=mysqli_query ($con, "select * from categorytbl where categoryname='$categoryname'");
if(mysqli_num_rows($dup)>0){
	echo "<script>alert('The data you input is already exist.')</script>";
	echo "<script>document.location='user-category.php';</script>";
}
else{

		$query = "INSERT INTO `categorytbl` (`categoryname`)

		VALUES ('$categoryname')";

			if($query){
				echo "<script>alert('New Category Successfully Saved!')</script>";
				echo "<script>document.location='user-category.php';</script>";
			}	else {
					echo "Failed";
			 }

mysqli_query ($con,$query);
}
}
?>