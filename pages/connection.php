<?php
 if (session_status() == PHP_SESSION_NONE){ 
    session_start(); 
 }
$host='localhost';
$username='root';
$password='';
$database='dbs5321751';

//Create a Connection
// mysqli_query - Opens a new connection to the MySQL server
$con = mysqli_connect($host,$username,$password,$database);


//Check connection
// mysqli_connect_errno - Returns the error code from the last connection error
//mysqli_connect_error - Returns the error description from the last connection error
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL:". mysqli_connect_error();
}
?>