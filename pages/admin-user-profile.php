<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>


<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <title>Therapeutic Drug Management</title>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" type="image/x-1con" href="PMS.PNG" />

     <!-- modal view image -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Form CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <!-- button in input boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    

<style type="text/css">
  .upload{
  width: 125px;
  position: relative;
  margin: auto;
}

.upload img{
  border-radius: 50%;
  border: 8px solid #DCDCDC;
}

.upload .round{
  position: absolute;
  bottom: 0;
  right: 0;
  background: gray;
  width: 32px;
  height: 32px;
  line-height: 33px;
  text-align: center;
  border-radius: 50%;
  overflow: hidden;
}

.upload .round input[type = "file"]{
  position: absolute;
  transform: scale(2);
  opacity: 0;
}

input[type=file]::-webkit-file-upload-button{
    cursor: pointer;
}

</style>
<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    // require 'vendor/autoload.php';
    require_once('phpmailer/Exception.php');
    require_once('phpmailer/PHPMailer.php');
    require_once('phpmailer/SMTP.php');
?>
<?php
if (isset($_POST['verify'])) { //1
    include 'connection.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM approvaltbl WHERE id = '$id' ";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);

    $EMAIL = 'pocpharmacy9@gmail.com';
    $PASSWORD = 'xqjtjnqionxtsdcc';

    $approved_email_address = $row['approved_email_address'];
    $approved_fname = $row['approved_fname'];
    $approved_type = $row['approved_type'];
    $account_status = $row['account_status'];

    if ($row['status'] == 'Inactive') {
      echo "<script>alert('Failed in Verifying Account! Email address is Inactive.')</script>";
    }
    else {

    $update = "UPDATE approvaltbl SET account_status = 'Verified' WHERE id = '$id' ";
    $stat = mysqli_query($con,$update);

      // generate token by binaryhexa 
      // $token = bin2hex(random_bytes(50));
      // $token = md5(rand('10000','99999'));
      // $last_id = mysqli_insert_id($con);
      // $url = 'http://'.$_SERVER[ 'SERVER_NAME'].'/reset_pw.php?id='. $last_id. '&token='.$token;
      // Set email format to HTML
      $output = '<b>Dear  '. $approved_fname.' </b>
      <h3>Your Account is Verified by the Admin</h3>
      <br><br>
      <p>Thank You,</p>
      <b>Therapeutic Drug Management System</b>';

      //session_start ();
      // $_SESSION['token'] = $token;
      // $_SESSION['email'] = $email;

      $mail = new PHPMailer;

      $mail->isSMTP();
      $mail->Host='smtp.gmail.com';
      $mail->Port=587;
      $mail->SMTPAuth=true;
      $mail->SMTPSecure='tls';

      // h-hotel account
      $mail->Username=$EMAIL;
      $mail->Password=$PASSWORD;

      // send by h-hotel email
      $mail->setFrom($EMAIL, 'Notification');
      // get email from input
      $mail->addAddress($approved_email_address);
      //$mail->addReplyTo('lamkaizhe16@gmail.com');

      // HTML body
      $mail->isHTML(true);
      $mail->Subject="Account Verification";
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
                  alert("Account is now Verified! An email has been sent to user.");
                  window.location.replace("admin-approval.php");
              </script>
          <?php
      }

    }
  }

  if (isset($_POST['decline'])) { //1
    include 'connection.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM approvaltbl WHERE id = '$id' ";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);

    $EMAIL = 'pocpharmacy9@gmail.com';
    $PASSWORD = 'xqjtjnqionxtsdcc';

    $email = $_GET['approved_email_address'];
    $approved_email_address = $row['approved_email_address'];
    $approved_fname = $row['approved_fname'];
    $approved_type = $row['approved_type'];
    $account_status = $row['account_status'];
    $remarks = $_POST['remarks'];

    $update = "UPDATE approvaltbl SET account_status = 'Not Verified' WHERE id = '$id'";
    $stat = mysqli_query($con,$update);

    if ($stat == true) {
      if (empty($remarks)) {
        echo "<script>alert('remarks field is required')</script>";
      } else {
        // generate token by binaryhexa 
        // $token = bin2hex(random_bytes(50));
        // $token = md5(rand('10000','99999'));
        $last_id = mysqli_insert_id($con);
        $url = 'http://'.$_SERVER[ 'SERVER_NAME'].'/pages/register.php?id='. $id;
        // Set email format to HTML
        $output = '<b>Dear  '. $approved_fname.' </b>
        <h3>Your Account is Declined by the Admin</h3>
        <p>'. $remarks.'</p>
        <p>Click the link below to submit requirements:</p>
        <br><br>
        <br>'. $url.'<br><br>
        <p>Thank You,</p>
        <b>Therapeutic Drug Management System</b>';

        //session_start ();
        // $_SESSION['token'] = $token;
        // $_SESSION['email'] = $email;

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        // h-hotel account
        $mail->Username=$EMAIL;
        $mail->Password=$PASSWORD;

        // send by h-hotel email
        $mail->setFrom($EMAIL, 'Notification');
        // get email from input
        $mail->addAddress($approved_email_address);
        //$mail->addReplyTo('lamkaizhe16@gmail.com');

        // HTML body
        $mail->isHTML(true);
        $mail->Subject="Declined Account";
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
                    alert("Account is now Declined! An email has been sent to user.");
                    window.location.replace("admin-approval.php");
                </script>
            <?php
        }

      }
      
    }
    else{
      echo "<script>alert('Failed in Declining Account!')</script>";
    }


  }
  ?>

  <style>
    
    .img-poc {
      width: 76%;
    }
  </style>
   </head>

   <?php 
  include "session.php";
  include 'user-session.php'
  ?>
  
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i></i>
      <span class="logo_name">Pharmacy</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin-approval.php">
            <i class=' bx bx-undo' ></i>
            <span class="links_name">Return</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
      </div>
      <div class="title">
        <img class="img-poc" src="POC_Name.png">
      </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title" align="center">User Profile</div>
    
    <?php
    include 'connection.php';
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query="SELECT * FROM approvaltbl WHERE id='$id' ";
      $result = mysqli_query($con,$query);
    }
      while ($row = mysqli_fetch_array($result)) {
    ?>

    <form action="admin-user-profile.php?id=<?php echo $row['id']; ?>" method="POST">
      <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img class="rounded-circle mt-5" width="150px" src="image/<?php echo $row['image']; ?>">
    
            <span class="font-weight-bold"><?php echo $row['approved_fname']; ?> <?php echo $row['approved_lname']; ?></span>
            </div>

        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div> -->
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label>
                      <input type="text" class="form-control" value="<?php echo $row['approved_fname']; ?>" readonly></div>
                    <div class="col-md-6"><label class="labels">Surname</label>
                      <input type="text" class="form-control" value="<?php echo $row['approved_lname']; ?>" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email Address</label>
                      <input type="text" class="form-control" value="<?php echo $row['approved_email_address']; ?>" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label>
                      <input type="text" class="form-control" value="<?php echo $row['approved_contact']; ?>" readonly></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">ID Number</label>
                      <input type="text" class="form-control" placeholder="ID Number" value="<?php echo $row['approved_idnum']; ?>" readonly>
                    </div>
                    <div class="col-md-6"><label class="labels">Position</label>
                      <input type="text" class="form-control" placeholder="ID Number" value="<?php echo $row['approved_type']; ?>" readonly>
                    </div>
                </div>
            </div>
          <div class="mt-5 text-center">
            <?php 
            $account_status = $row['account_status'];
            if ($account_status == 'Not Verified') {
            ?>
              <button class="btn btn-primary profile-button"  type="submit" name="verify">Verify</button>
              <button class="btn btn-danger profile-button"  type="submit" name="decline">Decline</button>
              <a href="admin-user-profile-action.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to archive this record?');" class="btn btn-warning text-light">Archive</a>
            <?php } else if ($account_status == 'Verified') { ?>
              <a href="admin-user-profile-action.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to archive this record?');" class="btn btn-warning text-light">Archive</a>
            <?php } ?>
          </div><br>
          <div class="col-md-12">
            <label class="labels">Remarks</label>
            <textarea class="form-control" name="remarks"></textarea>
          </div><br>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                  <span>Account Status</span>
                    <span class="border px-3 p-1 add-experience">
                      <i class="fa fa-plus"></i>&nbsp;<?php echo $row['account_status']; ?>
                    </span>
                </div><br>
            </div>
        </div>
      </div> 
    </form>

    <!-- Modal -->
    <div class="modal fade" id="com_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Company ID</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img style="height: 100%; width: 100%;" src="files/<?php echo $row['com_id']; ?>">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="com_id_selfie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Company ID with Selfie</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img style="height: 100%; width: 100%;" src="files/<?php echo $row['com_id_selfie']; ?>">
          </div>
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </section>

  <!-- Adding scripts to use bootstrap modal -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"      crossorigin="anonymous">
  </script>

<script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>