<?php
if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
include 'connection.php';

if(isset($_SESSION['approved_type'])) {
  $register_type = $_SESSION['approved_type'];
    if ($register_type == 'Admin') {
      echo("<script>location.href='admin-dashboard.php'</script>");
    }else if ($register_type == 'Pharmacist' || $register_type == 'Administrative Aide') {
      echo("<script>location.href='user-dashboard.php'</script>");
    }
  }

if (isset($_POST["submit"])) {

  $approved_email_address=$_POST['approved_email_address'];
  $approved_psw = md5($_POST['approved_psw']);

  $query="SELECT * FROM approvaltbl WHERE approved_email_address='$approved_email_address' AND approved_psw='$approved_psw' AND status = 'Inactive' ";
  $run_admin=mysqli_query($con,$query);
  $count = mysqli_num_rows($run_admin);

  $query1="SELECT * FROM approvaltbl WHERE approved_email_address='$approved_email_address' AND approved_psw='$approved_psw' AND status = 'Active'  AND account_status = 'Not Verified' ";
  $run_admin1=mysqli_query($con,$query1);
  $count1 = mysqli_num_rows($run_admin1);

  $query2="SELECT * FROM approvaltbl WHERE approved_email_address='$approved_email_address' AND approved_psw='$approved_psw' AND status = 'Active'  AND account_status = 'Verified' ";
  $run_admin2=mysqli_query($con,$query2);
  $count2 = mysqli_num_rows($run_admin2);
  $fetch=mysqli_fetch_array($run_admin2);

  $sql = "SELECT * FROM approvaltbl WHERE approved_email_address!='$approved_email_address' AND approved_psw!='$approved_psw'";


  if ( $count > 0) {
    echo "<script>alert('Verify your email first!')</script>";
    ?> 
      <script type="text/javascript">
         window.location.href = '../index.php';
      </script>
    <?php
  }
  else if ( $count1 > 0) {
    echo "<script>alert('Wait for the admin to verify your account!')</script>";
    ?> 
      <script type="text/javascript">
         window.location.href = '../index.php';
      </script>
    <?php
  }
  else if ( $count2 > 0) {
    if ($fetch["approved_type"] == "Administrative Aide") {
      $_SESSION['approved_type'] = $fetch['approved_type'];
      $_SESSION['approved_email_address'] = $_POST['approved_email_address'];
      $_SESSION['approved_email_address'] = $fetch['approved_email_address'];
      $name = $fetch['approved_fname'];
      echo "<script>alert('Welcome $name')</script>";
      ?> 
        <script type="text/javascript">
            window.location.href = 'user-dashboard.php';
        </script>
      <?php
    }
    if ($fetch["approved_type"] == "Admin") {
      $_SESSION['approved_type'] = $fetch['approved_type'];
      $_SESSION['approved_email_address'] = $_POST['approved_email_address'];
      $_SESSION['approved_email_address'] = $fetch['approved_email_address'];
      echo "<script>alert('Welcome Admin!')</script>";
      ?> 
        <script type="text/javascript">
           window.location.href = 'admin-dashboard.php';
        </script>
      <?php
    }
    if ($fetch["approved_type"] == "Pharmacist") {
      $_SESSION['approved_type'] = $fetch['approved_type'];
      $_SESSION['approved_email_address'] = $_POST['approved_email_address'];
      $_SESSION['approved_email_address'] = $fetch['approved_email_address'];
      $name = $fetch['approved_fname'];
      echo "<script>alert('Welcome $name')</script>";
      ?> 
        <script type="text/javascript">
            window.location.href = 'user-dashboard.php';
        </script>
      <?php
    }
  }
  else if ( $sql == true){
    echo "<script>alert('Invalid email or password.')</script>";
    }
  else{
    echo "<script>alert('Login Failed!.')</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-1con" href="PMS.PNG" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <style type="text/css">
    
/*REGISTER & LOGIN*/

body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: linear-gradient(180deg,#1cc88a 10%,#13855c 100%);
}

* {box-sizing: border-box}

.box {
  margin-left: 25%;
  margin-right: 25%;
  margin-top: 1%;
}
/* Add padding to containers */
.container {
  padding: 5%;
  border-radius: 1rem;
  background: #ffffff;
}

select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.submitbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.submitbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
  padding-top: 1%;
}

img {
  margin-left: 43%;
  height: 74px;
  margin-bottom: -15px;
}

h3 {
  text-align: center;
}
h4 {
  text-align: center;
}

/*REGISTER & LOGIN*/

  </style>
</head>
<body>
    <div class="box">
      <div class="container">
        <div id="content1">
          <img src="POC.png"><br><br>
          <h3>Therapeutic Drug Management System</h3>
          <h4>Philippine Orthopedic Center</h4><br>
          <hr>

          <form action='login.php' method='post'>

          <label class="luname" for="approved_email_address"><b>Username:</b></label><br>
          <input class="uname" type="text" placeholder="Username" name="approved_email_address" required ><br><br>

          <label class="lpass" for="approved_psw"><b>Password:</b></label><br>
          <input class="psw" type="password" placeholder="Password" name="approved_psw" id="id_password" required ><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i><br><br>

          <button  type="submit" name="submit" class="submitbtn">Login</button><br>
          <center><a class="link" href="forgot-password.php">Forgot password?</a></center><br>
          
          <div class="container signin">
            <p>Don't have an Account? <a class="link" href="register.php">Create an Account</a>.</p>
          </div>
          
          </form>
        </div>  
      </div><br>
    </div>

<script>
const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>

</body>
</html>