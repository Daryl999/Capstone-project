<?php

include "connection.php";

if (isset($_POST['submit'])) {

	$lname= $_POST['lname'];
	$fname= $_POST['fname'];
	$mname=  $_POST['mname'];
	$wrd=  $_POST['wrd'];
	$cnum= $_POST['cnum'];
	$weight=   $_POST['weight'];
	$height=  $_POST['height'];
	$diet=  $_POST['diet'];
	$sstat=  $_POST['sstat'];
	$dadmit= $_POST['dadmit'];
	$bday= $_POST['bday'];
	$age=  $_POST['age'];
	$contact=  $_POST['contact'];
	$gend= $_POST['gend'];
	$ddis= $_POST['ddis'];
	$diag=  $_POST['diag'];
	$alerg=   $_POST['alerg'];
	$aphy=  $_POST['aphy'];

$dup=mysqli_query ($con, "select * from patientprofiletbl where cnum='$cnum'");
if(mysqli_num_rows($dup)>0){
	echo "<script>alert('The data you input is already exist.')</script>";
	echo "<script>window.history.back(-1);</script>";
	echo "<script>document.location='admin-patient-profile1.php';</script>";
}
else{

		$query = "INSERT INTO `patientprofiletbl` (
												`lname`,
												`fname`,
												`mname`,
												`wrd`,
												`cnum`,
												`weight`,
												`height`,
												`diet`,
												`sstat`,
												`dadmit`,
												`bday`,
												`age`,
												`contact`,
												`gend`,
												`ddis`,
												`diag`,
												`alerg`,
												`aphy`)

		VALUES ('$lname','$fname','$mname','$wrd','$cnum','$weight','$height','$diet','$sstat','$dadmit','$bday','$age','$contact','$gend','$ddis','$diag','$alerg','$aphy')";
		$result = mysqli_query ($con,$query);

			if($result){
				echo "<script>document.location='admin-patient-profile2.php';</script>";
			}	else {
					echo "Failed";
			 }

	
}
}
?>