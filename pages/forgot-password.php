<?php if (session_status() == PHP_SESSION_NONE){ session_start(); } ?>
<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   // Load Composer's autoloader
   // require 'vendor/autoload.php';
  require_once('phpmailer/Exception.php');
  require_once('phpmailer/PHPMailer.php');
  require_once('phpmailer/SMTP.php');

	if(isset($_POST["recover"])){
        include('connection.php');
        $approved_email_address = $_POST["approved_email_address"];


        $sql = mysqli_query($con, "SELECT * FROM approvaltbl WHERE approved_email_address='$approved_email_address'");
        $query = mysqli_num_rows($sql);
        $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "No email found!, Please try another email. "?>");
            </script>
            <?php
        }else if($fetch["status"] == "Inactive"){
            ?>
               <script>
                   alert("Account Inactive, Check your email and verify account first.");
                   window.location.replace("index.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            // $token = bin2hex(random_bytes(50));
            $token = md5(rand('10000','99999'));
            $last_id = $fetch['id'];
            $url = 'http://'.$_SERVER[ 'SERVER_NAME'].'/pages/reset_password.php?id='. $last_id. '&token='.$token;
            // Set email format to HTML
            $output = '<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the link below to reset your password</p>
            '. $url.'
            <br><br>
            <p>Thank You,</p>
            <b>PESO Outsourcing</b>';

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['approved_email_address'] = $approved_email_address;

           

            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='pocpharmacy9@gmail.com';
            $mail->Password='xqjtjnqionxtsdcc';

            // send by h-hotel email
            $mail->setFrom('pocpharmacy9@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($approved_email_address);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body= $output;

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        alert("An email has been sent to you.");
                        window.location.replace("../index.php");
                    </script>
                <?php
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-1con" href="PMS.PNG" />

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
          <center><h2>Recover Password</h2></center>
          <hr>

          <form action='forgot-password.php' method='post'>
          <label class="lpass" for="approved_psw"><b>Email address</b></label><br>
          <input class="uname" type="text" placeholder="Username" name="approved_email_address" required ><br><br>
          <button  type="submit" name="recover" class="submitbtn">Recover</button><br>
          </form>
        </div>  
      </div><br>
    </div>
</body>
</html>