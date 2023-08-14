<?php
include 'connection.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $result=$con->query("DELETE from approvaltbl WHERE id='$id'");

  if($result){
    ?>
    <script>
      alert("Account successfully deleted.");
      window.location.href='admin-archive-approval.php';
    </script>
    <?php
  } else {
    ?>
    <script>
      alert ("Failed to Delete");
      window.location.href='admin-archive-approval.php';
    </script>
    <?php
  }
}
?>
