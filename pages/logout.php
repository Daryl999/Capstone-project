<?php
Session_start();
// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 
// echo "<script type='text/javascript'>alert('Successfully Login');</script>";
echo"<script>document.location='login.php';</script>";
?>