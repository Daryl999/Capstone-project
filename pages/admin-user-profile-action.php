<?php
include 'connection.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query = "UPDATE approvaltbl SET account_status = 'Archive' WHERE id = '$id'";
  $stat = mysqli_query($con,$query); ?>
    <script>
      alert("Record successfully archive.");
      window.location.href='admin-approval.php';
    </script>
<?php } ?>
