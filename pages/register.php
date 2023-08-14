<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-1con" href="PMS.PNG" />
  <!-- eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

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
  
  <script type="application/javascript">

    function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;

           return true;
        }

  </script>
</head>
<body>
  
  <?php include 'connection.php';?>

    <form method="POST" enctype="multipart/form-data">
<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    // require 'vendor/autoload.php';
    require_once('phpmailer/Exception.php');
  require_once('phpmailer/PHPMailer.php');
  require_once('phpmailer/SMTP.php');

if (isset($_POST['submit'])) { //1
    include 'connection.php';

    $EMAIL = 'pocpharmacy9@gmail.com';
    $PASSWORD = 'xqjtjnqionxtsdcc';

    $approved_fname = $_POST["approved_fname"];
    $approved_lname = $_POST["approved_lname"];
    $approved_idnum = $_POST["approved_idnum"];
    $approved_contact = $_POST["approved_contact"];
    $approved_email_address = $_POST["approved_email_address"];
    $approved_psw = md5($_POST["approved_psw"]);
    $approved_type = $_POST["approved_type"];
    $token = md5(rand('10000','99999'));
    $status= 'Inactive';
    $account_status= 'Not Verified';
    $image = 'default.png';

    $checkuser = "SELECT * from approvaltbl  where approved_email_address='$approved_email_address' || approved_idnum='$approved_idnum' ";
    $result=mysqli_query($con, $checkuser);
    $count=mysqli_num_rows($result);

    $checkuser1 = "SELECT * from approvaltbl  where approved_email_address='$approved_email_address' AND approved_idnum='$approved_idnum' ";
    $result1=mysqli_query($con, $checkuser1);
    $count1=mysqli_num_rows($result1);

    $sql = "INSERT INTO approvaltbl 
                            (approved_fname, 
                             approved_lname, 
                             approved_idnum,
                             approved_contact,
                             approved_email_address,
                             approved_psw,
                             approved_type,
                             token,
                             status,
                             account_status,
                             image) 
                    VALUES ('".$approved_fname."', 
                            '".$approved_lname."',
                            '".$approved_idnum."',
                            '".$approved_contact."',
                            '".$approved_email_address."',
                            '".$approved_psw."',
                            '".$approved_type."',
                            '".$token."',
                            '".$status."',
                            '".$account_status."',
                            '".$image."')";

              // move_uploaded_file($fileTmpName1,$path);

    if ($count1>0) { // 2.5
                   echo "<script>alert('Registration Failed, Email and ID number is already used!')</script>";
                   echo "<script>window.history.back(-1);</script>";
                   echo("<script>location.href='register.php'</script>");
              } // 2.5   
    else if ($count>0) { // 2.5
                   echo "<script>alert('Registration Failed, Email or ID number is already used!')</script>";
                   echo "<script>window.history.back(-1);</script>";
                   echo("<script>location.href='register.php'</script>");
              } // 2.5       
    else{ // 3
          if($con->query($sql))
        {
              $last_id = mysqli_insert_id($con);
              $url = 'http://'.$_SERVER[ 'SERVER_NAME'].'/pages/email_verification.php?id='. $last_id. '&token='.$token;
                                                              // Set email format to HTML
              $output = '<div><h2>Hello, '. $approved_fname.' </h2>
                <h3>Thank you for registering for an account on Therapeutic Drug Management System</h3> 
                <p>Before we get started, we just need to confirm that this is you.
                <br>Click the link below to verify your email address:</p> 
                <br>'. $url.'<br><br></div>
                <p>Thank You, wait for the approval of your account.</p><b>Therapeutic Drug Management System</b>';
              $mail = new PHPMailer(true);
              try { //try start
              //Server settings
              $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = $EMAIL;                     //SMTP username
              $mail->Password   = $PASSWORD;                              //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

              //Recipients
              $mail->setFrom($EMAIL, 'Therapeutic Drug Management System');
              $mail->addAddress($approved_email_address, $approved_fname);     //Add a recipient
              // $mail->addAddress('ellen@example.com');               //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');

              // //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

              //Content
              $mail->isHTML(true);    

              //Set email format to HTML
              $mail->Subject = 'Registration Confirmation';
              $mail->Body    = $output;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

              $mail->send();
              // echo 'Registration successful! Please verify your email';
              echo "<script>alert('Registration Successful, Check Email to verify.')</script>";
                       
                ?> 

                  <script type="text/javascript">
                      window.location.href = '../index.php';
                   </script>
                <?php

            } //try end
            catch (Exception $e) {
               echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
            }
        }
        else
        {
              echo "<script>alert('Something went wrong while adding')</script>";
        }
    } // 3
    
} // 1
else if (isset($_POST['update'])){ // A
    $EMAIL = 'pocpharmacy9@gmail.com';
    $PASSWORD = 'xqjtjnqionxtsdcc';

    $id=$_GET['id'];
    $approved_fname = $_POST["approved_fname"];
    $approved_lname = $_POST["approved_lname"];
    $approved_idnum = $_POST["approved_idnum"];
    $approved_contact = $_POST["approved_contact"];
    $approved_email_address = $_POST["approved_email_address"];
    $approved_psw = $_POST["approved_psw"];
    $approved_type = $_POST["approved_type"];

    $checkuser1 = "SELECT * from approvaltbl  where approved_email_address='$approved_email_address' AND approved_psw='$approved_psw' ";
    $result1=mysqli_query($con, $checkuser1);
    $count1=mysqli_num_rows($result1);

    $sql = "UPDATE approvaltbl SET
                            approved_fname='$approved_fname', 
                             approved_lname='$approved_lname', 
                             approved_idnum='$approved_idnum',
                             approved_contact='$approved_contact',
                             approved_email_address='$approved_email_address',
                             approved_psw='$approved_psw',
                             approved_type='$approved_type' WHERE id=$id ";
                             
              // move_uploaded_file($fileTmpName1,$path);

    if ($count1>0) { // 2.5
                   if($con->query($sql))
        {
              // $last_id = mysqli_insert_id($con);
              // $url = 'http://'.$_SERVER[ 'SERVER_NAME'].'/tdms/pages/email_verification.php?id='. $last_id. '&token='.$token;
                                                              // Set email format to HTML
              $output = '<div><h2>Hello, '. $approved_fname.' </h2>
                <h3>Your registration on Therapeutic Drug Management System is now updated</h3>
                <br><br>
                <p>Thank You, wait for the approval of your account.</p><b>Therapeutic Drug Management System</b>';
              $mail = new PHPMailer(true);
              try { //try start
              //Server settings
              $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = $EMAIL;                     //SMTP username
              $mail->Password   = $PASSWORD;                              //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

              //Recipients
              $mail->setFrom($EMAIL, 'Therapeutic Drug Management System');
              $mail->addAddress($approved_email_address, $approved_fname);     //Add a recipient
              $mail->addAddress($EMAIL);     //Add a recipient
              // $mail->addAddress('ellen@example.com');               //Name is optional
              // $mail->addReplyTo('info@example.com', 'Information');
              // $mail->addCC('cc@example.com');
              // $mail->addBCC('bcc@example.com');

              // //Attachments
              // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
              // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

              //Content
              $mail->isHTML(true);    

              //Set email format to HTML
              $mail->Subject = 'Registration updated';
              $mail->Body    = $output;
              // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

              $mail->send();
              // echo 'Registration successful! Please verify your email';
              echo "<script>alert('Registration updated successfully, Check Email for notification')</script>";
                       
                ?> 

                  <script type="text/javascript">
                      window.location.href = '../index.php';
                   </script>
                <?php

            } //try end
            catch (Exception $e) {
               echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
            }
        }
              } // 2.5        
    else{ // 3
          echo "<script>alert('Email address or ID number did not match previous record.')</script>";
        
    } // 3
} // A
 ?>
    <div class="box">
      <div class="container">
        <div id="content1">
      <h1>REGISTER</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <div class="row py-2">
        <?php 
      if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM approvaltbl WHERE id='$id'");
        $row = mysqli_fetch_array($query);
        ?>
        <div class="col-md-6"> 
        <label for="fname"><b>First Name</b></label><br>
        <input type="text" placeholder="First Name" value="<?php echo $row['approved_fname']; ?>" name="approved_fname" maxlength="18" required><br><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="lname"><b>Last Name</b></label><br>
        <input type="text" placeholder="Last Name" value="<?php echo $row['approved_lname']; ?>" name="approved_lname" maxlength="18" required><br><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="idnum"><b>ID Number</b></label><br>
        <input type="text" placeholder="ID Number" value="<?php echo $row['approved_idnum']; ?>" name="approved_idnum" id="idnum" onkeyup="userlengths()" onkeypress="return isNumberKey(event)" minlength="8" maxlength="8" required>
        <small id="usermessages" class="form-text"></small><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="contact"><b>Contact Number</b></label><br>
        <input type="text" placeholder="Contact" value="<?php echo $row['approved_contact']; ?>" name="approved_contact" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required><br><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="gmail"><b>Email Address</b></label><br>
        <input type="text" placeholder="Email Address" value="<?php echo $row['approved_email_address']; ?>" name="approved_email_address" maxlength="28" id="username" onkeyup="userslength()" minlength="8" required readonly>
        <small id="usersmessage" class="form-text"></small>
        <!-- <div id="searchresult"></div> --><br><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="psw"><b>Password</b></label>
        <input type="Password" placeholder="Password" value="<?php echo $row['approved_psw']; ?>" name="approved_psw" id="Password" onkeyup="userlength()" minlength="8" required readonly>
        <small id="usermessage" class="form-text"></small>
        <br><br>
      </div>
      <div class="row py-2">
       <div class="col-md-12">
          <label for="address"><b>Position</b></label> 
         <select type="hidden" id="categ" name="approved_type" required>
            <option selected></option>
            <option <?php echo isset($row['approved_type']) && $row['approved_type'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
            <option <?php echo isset($row['approved_type']) && $row['approved_type'] == 'Pharmacist' ? 'selected' : '' ?>>Pharmacist</option>
            <option <?php echo isset($row['approved_type']) && $row['approved_type'] == 'Administrative Aide' ? 'selected' : '' ?>>Administrative Aide</option>
          </select>       
        </div>
      </div>

      <button type="submit" name="update" class="submitbtn">Submit</button>
        
      <?php
      } else {
      ?>
        <div class="col-md-6"> 
        <label for="fname"><b>First Name</b></label><br>
        <input type="text" placeholder="First Name" name="approved_fname" maxlength="18" required><br><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="lname"><b>Last Name</b></label><br>
        <input type="text" placeholder="Last Name" name="approved_lname" maxlength="18" required><br><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="idnum"><b>ID Number</b></label><br>
        <input type="text" placeholder="ID Number" name="approved_idnum" id="idnum" onkeyup="userlengths()" onkeypress="return isNumberKey(event)" minlength="8" maxlength="8" required>
        <small id="usermessages" class="form-text"></small><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="contact"><b>Contact Number</b></label><br>
        <input type="text" placeholder="Contact" name="approved_contact" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required><br><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="gmail"><b>Email Address</b></label><br>
        <input type="text" placeholder="Email Address" name="approved_email_address" maxlength="35" id="username" onkeyup="userslength()" minlength="8" required>
        <small id="usersmessage" class="form-text"></small>
        <!-- <div id="searchresult"></div> --><br><br>
      </div>
      <div class="col-md-6 pt-md-0 pt-3">
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Password" name="approved_psw" id="id_password" minlength="8" onkeyup="userlength()" required ><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
        <small id="usermessage" class="form-text"></small>
        <br><br>
      </div>
      <div class="row py-2">
       <div class="col-md-12">
          <label for="address"><b>Position</b></label> 
         <select type="hidden" id="categ" name="approved_type" required>
                <option disabled selected></option>
                <option value="Admin">Admin</option>
                <option value="Pharmacist">Pharmacist</option>
                <option value="Administrative Aide">Administrative Aide</option>
              </select>
       
        </div>
      </div>

      <button type="submit" name="submit" class="submitbtn">Submit</button>
        
      <?php
      }
      ?>
      
        <div class="container signin">
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
          </div>
        </div>
      </div>
    </div>  
    </form>
   
<script>
    var userlengths = function(){
      var str = document.getElementById('idnum');
      var str2 = str.value.length;
      if (str2 == ''){
                document.getElementById('usermessages').innerHTML = '';
            }else if (str2 >= 8){
        document.getElementById('usermessages').style.color = 'green';
        document.getElementById('usermessages').innerHTML = '';
      }else{
        document.getElementById('usermessages').style.color = 'red';
        document.getElementById('usermessages').innerHTML = 'Please enter at least 8 characters';
      }
    }

</script>
    
<script>
    var userslength = function(){
      var str = document.getElementById('username');
      var str2 = str.value.length;
      if (str2 == ''){
                document.getElementById('usersmessage').innerHTML = '';
            }else if (str2 >= 8){
        document.getElementById('usersmessage').style.color = 'green';
        document.getElementById('usersmessage').innerHTML = '';
      }else{
        document.getElementById('usersmessage').style.color = 'red';
        document.getElementById('usersmessage').innerHTML = 'Please enter at least 8 characters';
      }
    }

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