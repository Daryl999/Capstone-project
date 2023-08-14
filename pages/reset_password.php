<?php if (session_status() == PHP_SESSION_NONE){ session_start(); } ?>
<?php
    if(isset($_POST["reset"])){
        include('connection.php');

        $approved_psw = md5($_POST["approved_psw"]);
        $token = $_SESSION['token'];
        $approved_email_address = $_SESSION['approved_email_address'];


        // $hash = password_hash( $psw , PASSWORD_DEFAULT );
        // $new_pass = $hash;


        $sql = mysqli_query($con, "SELECT * FROM approvaltbl WHERE approved_email_address='$approved_email_address'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($approved_email_address){
            mysqli_query($con, "UPDATE approvaltbl SET approved_psw='$approved_psw' WHERE approved_email_address='$approved_email_address'");
            ?>
            <script>
                window.location.replace("../index.php");
                alert("<?php echo "your password has been succesfully reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
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
          <center><h2>Reset Password</h2></center>
          <hr>

          <form method='post'>
          <label class="lpass" for="approved_psw"><b>Password:</b></label><br>
          <input class="psw" type="password" placeholder="Password" name="approved_psw" id="id_password" onkeyup="userlength()" required ><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
          <small id="usermessage" class="form-text"></small><br><br>
          <button  type="submit" name="reset" class="submitbtn">Save</button><br>
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

<script>
    var userlength = function(){
      var str = document.getElementById('id_password');
      var str2 = str.value.length;
      if (str2 == ''){
                document.getElementById('usermessage').innerHTML = '';
            }else if (str2 >= 8){
        document.getElementById('usermessage').style.color = 'green';
        document.getElementById('usermessage').innerHTML = '';
      }else{
        document.getElementById('usermessage').style.color = 'red';
        document.getElementById('usermessage').innerHTML = 'Please enter at least 8 characters';
      }
    }

</script>

</body>
</html>