<?php
  include('connection.php');

        $id = $_GET['id'];
        $token = $_GET['token'];
        $update = "UPDATE approvaltbl SET status = 'Active' WHERE id = '$id' AND token = '$token'";
        $result = mysqli_query($con, $update);

        if ($result) {
          // echo 'Registration Successful! You can now <a href="../signup_jobseeker/login.php">login</a>.';
          header("Location:../index.php");

        }else {
          echo "Verification failed!";
        }
?>