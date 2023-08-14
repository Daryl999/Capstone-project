<?php

include "connection.php";

if (isset($_GET['id'])) {

	$id=$_GET['id'];
	$bday= $_POST['bday'];
	$age=  $_POST['age'];
	$gend= $_POST['gend'];
	$sstat=  $_POST['sstat'];
	$contact=  $_POST['contact'];
	$weight=   $_POST['weight'];
	$height=  $_POST['height'];

		$query = "UPDATE patientprofiletbl SET `bday`='$bday',
												`age`='$age',
												`gend`='$gend',
												`sstat`='$sstat',
												`contact`='$contact',
												`weight`='$weight',
												`height`='$height'
												WHERE `id`='$id' ";
		
            if ($query) {
                ?>
                <script>
               alert("Successfully Updated");
                window.location.href ='user-patient-dataview.php?patient_id=<?php echo $id;?>';
                </script>
                <?php
            }
            else{
                ?>
                <script>
                alert("Failed to Update");
                window.location.href = 'user-details-edit.php?patient_id=<?php echo $id;?>';
                </script>
                
                <?php
            }
            mysqli_query($con,$query);
}
?>