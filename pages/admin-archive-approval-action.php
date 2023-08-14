<?php
include 'connection.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query = "UPDATE approvaltbl SET account_status = 'Not Verified' WHERE id = '$id'";
  $stat = mysqli_query($con,$query); ?>
    <script>
      alert("Record successfully restore.");
      window.location.href='admin-archive-approval.php';
    </script>
<?php } ?>
