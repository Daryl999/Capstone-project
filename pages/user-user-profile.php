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
     <!-- for camera icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- modal view image -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Form CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <!-- input partner to button -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

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
.img-poc {
  width: 76%;
}

</style>

   </head>

   <?php 
  include "session.php";
  include 'admin-session.php'
  ?>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i></i>
      <span class="logo_name">Pharmacy</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="user-dashboard.php">
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
          
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <?php
                    require 'connection.php';
                    $email = $_SESSION['approved_email_address'];
                    $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM approvaltbl WHERE approved_email_address = '$email'"));
              
             ?>
                  <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                    <div class="upload">
                      <?php
                        $email = $user["approved_email_address"];
                        $name = $user["approved_fname"];
                        $image = $user["image"];
                      ?>
                      <img src="image/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>" style="border: 5px solid lightgray; ">
                      <div class="round">
                        <input type="hidden" name="email" value="<?php echo $approved_email_address; ?>">
                        <input type="hidden" name="name" value="<?php echo $approved_fname; ?>">
                        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
                        <i class = "fa fa-camera" style = "color: #fff;"></i>
                      </div>
                    </div>
                  </form>
                  <script type="text/javascript">
                    document.getElementById("image").onchange = function(){
                        document.getElementById("form").submit();
                    };
                  </script>
                  <?php
                  if(isset($_FILES["image"]["name"])){
                    $email = $_POST["approved_email_address"];
                    $name = $_POST["approved_fname"];

                    $imageName = $_FILES["image"]["name"];
                    $imageSize = $_FILES["image"]["size"];
                    $tmpName = $_FILES["image"]["tmp_name"];

                    // Image validation
                    $validImageExtension = ['jpg', 'jpeg', 'png'];
                    $imageExtension = explode('.', $imageName);
                    $imageExtension = strtolower(end($imageExtension));
                    if (!in_array($imageExtension, $validImageExtension)){
                      echo
                      "
                      <script>
                        alert('Invalid Image Extension');
                        document.location.href = 'user-user-profile.php';
                      </script>
                      ";
                    }
                    elseif ($imageSize > 1200000){
                      echo
                      "
                      <script>
                        alert('Image Size Is Too Large');
                        document.location.href = 'user-user-profile.php';
                      </script>
                      ";
                    }
                    else{
                      $email = $_SESSION['approved_email_address'];
                      $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
                      $newImageName .= '.' . $imageExtension;
                      $query = "UPDATE approvaltbl SET image = '$newImageName' WHERE approved_email_address = '$email'";
                      mysqli_query($con, $query);
                      move_uploaded_file($tmpName, 'image/' . $newImageName);
                      echo
                      "
                      <script>
                        alert('Updated successfully!');
                        document.location.href = 'user-user-profile.php';
                      </script>
                      ";
                    }
                  }
                  ?>
            <br>

    <?php
    include 'connection.php';
     
    $email = $_SESSION['approved_email_address'];

     $sql = mysqli_query($con, "SELECT * FROM approvaltbl WHERE approved_email_address='$email'");
     $row = mysqli_fetch_array($sql);

   ?>

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
                      <input type="text" class="form-control" placeholder="ID Number" value="<?php echo $row['approved_idnum']; ?>" readonly></div>
                    <div class="col-md-6"><label class="labels">Position</label>
                      <input type="text" class="form-control" value="<?php echo $row['approved_type']; ?>" readonly></div>
                </div>
            </div>
    <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>  -->
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Account Status</span><span class="border px-3 p-1 add-experience"><i></i>&nbsp;<?php echo $row['account_status']; ?></span></div><br>
            </div>
        </div>
    </div> 
        </div>
      </div>
    </div>
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