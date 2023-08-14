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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="application/javascript">

    function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;

           return true;
        }

  </script>

  <script type="text/javascript">
      function formatDate(date){
      var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      hours = '' + d.getHours(),
      year = d.getFullYear();

      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;

      return [year, month, day].join('-');

      }

      function getAge(dateString){
      var birthdate = new Date().getTime();
      if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')){
      // variable is undefined or null value
      birthdate = new Date().getTime();
      }
      birthdate = new Date(dateString).getTime();
      var now = new Date().getTime();
      // now find the difference between now and the birthdate
      var n = (now - birthdate)/1000;
      if (n < 604800){ // less than a week
      var day_n = Math.floor(n/86400);
      if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')){
      // variable is undefined or null
      return '';
      }else{
      if(day_n < 0) {return 0;}else{return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';}
      }
      } else if (n < 2629743){ // less than a month
      var week_n = Math.floor(n/604800);
      if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')){
      return '';
      }else{
      return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
      }
      } else if (n < 31562417){ // less than 24 months
      var month_n = Math.floor(n/2629743);
      if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')){
      return '';
      }else{
      return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
      }
      }else{
      var year_n = Math.floor(n/31556926);
      if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')){
      return year_n = '';
      }else{
      return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
      }
      }
      }

      function getAgeVal(pid){
      var birthdate = formatDate(document.getElementById("txtbirthdate").value);
      var count = document.getElementById("txtbirthdate").value.length;
      if (count=='10'){
      var age = getAge(birthdate);
      var str = age;
      var res = str.substring(0, 2);
      if (res =='-' || res =='0'){
      document.getElementById("txtbirthdate").value = "";
      document.getElementById("txtage").value = "";
      $('#txtbirthdate').focus();
      return false;
      }else{
      document.getElementById("txtage").value = age;
        if (res <= 17){
          document.getElementById("socstat").options.length = 0;
          $("#socstat").append(new Option("", ""));
          $("#socstat").append(new Option("Single", "Single"));
        }else{
          document.getElementById("socstat").options.length = 0;
          $("#socstat").append(new Option("", ""));
          $("#socstat").append(new Option("Single", "Single"));
          $("#socstat").append(new Option("Married", "Married"));
          $("#socstat").append(new Option("Separated", "Separated"));
          $("#socstat").append(new Option("Divorced", "Divorced"));
          $("#socstat").append(new Option("Widowed", "Widowed"));
        }
      }
      }else{
      document.getElementById("txtage").value = "";
      return false;
      }
      }
    </script>

   <style>
    {
        box-sizing: border-box;
    }
    /* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    /* css */
    table {
    margin-top: 3%;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .column {
    }
    label {
      font-size: 17px;
    }
    .img-poc {
      width: 76%;
    }
    .name b {
      color: #1cc88a;
    }
    .casenumber b {
      color: #1cc88a;
    }
    .details b {
      color: #1cc88a;
    }
    .patientprofile b {
      color: #1cc88a;
    }
    .form-control {
      width: 50%;
    }
    .gend2 {
      width: 50%
    }
    .sstat2 {
      width: 50%
    }
    .height2 {
      width: 50%
    }
    .diet2 {
      width: 50%
    }


  </style>


   </head>

   <?php 
  include "session.php";
  include 'admin-session.php'
  ?>
  
<body>

<?php
include 'connection.php';

if (isset($_session['patient_id'])) {
  $id = $_session['patient_id'];
  $query=mysqli_query($con,"SELECT * FROM patientprofiletbl WHERE id='$id'");
}
else{
  $id=$_GET['patient_id'];
  $query=mysqli_query($con,"SELECT * FROM patientprofiletbl WHERE id='$id'");
}
while($row=mysqli_fetch_array($query))
{
?>

  <div class="sidebar">
    <div class="logo-details">
      <i></i>
      <span class="logo_name">Pharmacy</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="user-patient-dataview.php?patient_id=<?php echo $row['id'];?>">
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
          <div class="title" align="center">Patient Medication Profile</div>
          <hr>
<div class="column">
  <div class="name"><br>
    <h3><b>PATIENT NAME</b></h3>
    <div class="labels">
      <h4>
      <label><?php echo $row['lname']; ?></label>
      <label>, <?php echo $row['fname']; ?></label>
      <label><?php echo $row['mname']; ?></label>
      </h4>    
    </div>
  </div>
</div>

<div class="column">
  <div class="casenumber"><br>
    <h3><b>HOSPITAL CASE NO.</b></h3>
    <div class="casenum">
      <h4>
      <label><?php echo $row['cnum']; ?></label>
      </h4>
    </div>
  </div>
</div>


  <form action="user-patient-profile-edit-action.php?id=<?php echo $row['id'];?>" method="POST">
<div class="column">
  <div class="details"><br>
    <h3><b>DETAILS</b></h3>
    <h5>BIRTHDAY</h5>
    <input name="bday" class="form-control " type="date" id="txtbirthdate" placeholder="mm/dd/yyyy" onchange="getAgeVal(0)" onchange="getAgeVal(0);" value="<?php echo $row['bday']; ?>" required>
    <h5>AGE</h5>
    <input name="age" class="form-control " id="txtage" readonly value="<?php echo $row['age']; ?>" required readonly>
    <h5>SEX</h5>
    <select class="gend2" type="text" name="gend" id="gend" placeholder="Enter" required>  
      <option value disabled selected>Select Gender</option>  
      <option <?php echo isset($row['gend']) && $row['gend'] == 'Male' ? 'selected' : '' ?>>Male</option>
            <option <?php echo isset($row['gend']) && $row['gend'] == 'Female' ? 'selected' : '' ?>>Female</option>  
    </select>
    <h5>MARITAL STATUS</h5>
    <select class="sstat2" id="socstat" type="text" name="sstat" required>  
      <option value disabled selected>Select Social Status</option>   
      <option <?php echo isset($row['sstat']) && $row['sstat'] == 'Single' ? 'selected' : '' ?>>Single</option>  
      <option <?php echo isset($row['sstat']) && $row['sstat'] == 'Married' ? 'selected' : '' ?>>Married</option>  
      <option <?php echo isset($row['sstat']) && $row['sstat'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>  
      <option <?php echo isset($row['sstat']) && $row['sstat'] == 'Separated' ? 'selected' : '' ?>>Separated</option>  
      <option <?php echo isset($row['sstat']) && $row['sstat'] == 'Divorced' ? 'selected' : '' ?>>Divorced</option> 
    </select>
    <h5>TEL/MOBILE NO.</h5>
    <input name="contact" class="form-control " value="<?php echo $row['contact']; ?>"  maxlength="11" minlength="11" onkeypress="return isNumberKey(event)">
    <h5>WEIGHT</h5>
    <input name="weight" class="form-control " value="<?php echo $row['weight']; ?>">
    <h5>HEIGHT</h5>
    <select class="height2" type="text" name="height"> 
      <option value disabled selected>Enter Height</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet' ? 'selected' : '' ?>> 1 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 2 inches' ? 'selected' : '' ?>>1 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 3 inches' ? 'selected' : '' ?>>1 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 4 inches' ? 'selected' : '' ?>>1 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 5 inches' ? 'selected' : '' ?>>1 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 6 inches' ? 'selected' : '' ?>>1 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 7 inches' ? 'selected' : '' ?>>1 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 8 inches' ? 'selected' : '' ?>>1 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 9 inches' ? 'selected' : '' ?>>1 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 10 inches' ? 'selected' : '' ?>>1 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '1 feet 11 inches' ? 'selected' : '' ?>>1 feet 11 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet' ? 'selected' : '' ?>> 2 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 2 inches' ? 'selected' : '' ?>>2 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 3 inches' ? 'selected' : '' ?>>2 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 4 inches' ? 'selected' : '' ?>>2 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 5 inches' ? 'selected' : '' ?>>2 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 6 inches' ? 'selected' : '' ?>>2 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 7 inches' ? 'selected' : '' ?>>2 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 8 inches' ? 'selected' : '' ?>>2 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 9 inches' ? 'selected' : '' ?>>2 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 10 inches' ? 'selected' : '' ?>>2 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '2 feet 11 inches' ? 'selected' : '' ?>>2 feet 11 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet' ? 'selected' : '' ?>> 3 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 2 inches' ? 'selected' : '' ?>>3 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 3 inches' ? 'selected' : '' ?>>3 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 4 inches' ? 'selected' : '' ?>>3 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 5 inches' ? 'selected' : '' ?>>3 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 6 inches' ? 'selected' : '' ?>>3 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 7 inches' ? 'selected' : '' ?>>3 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 8 inches' ? 'selected' : '' ?>>3 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 9 inches' ? 'selected' : '' ?>>3 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 10 inches' ? 'selected' : '' ?>>3 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '3 feet 11 inches' ? 'selected' : '' ?>>3 feet 11 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet' ? 'selected' : '' ?>> 4 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 2 inches' ? 'selected' : '' ?>>4 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 3 inches' ? 'selected' : '' ?>>4 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 4 inches' ? 'selected' : '' ?>>4 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 5 inches' ? 'selected' : '' ?>>4 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 6 inches' ? 'selected' : '' ?>>4 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 7 inches' ? 'selected' : '' ?>>4 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 8 inches' ? 'selected' : '' ?>>4 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 9 inches' ? 'selected' : '' ?>>4 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 10 inches' ? 'selected' : '' ?>>4 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '4 feet 11 inches' ? 'selected' : '' ?>>4 feet 11 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet' ? 'selected' : '' ?>> 5 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 2 inches' ? 'selected' : '' ?>>5 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 3 inches' ? 'selected' : '' ?>>5 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 4 inches' ? 'selected' : '' ?>>5 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 5 inches' ? 'selected' : '' ?>>5 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 6 inches' ? 'selected' : '' ?>>5 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 7 inches' ? 'selected' : '' ?>>5 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 8 inches' ? 'selected' : '' ?>>5 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 9 inches' ? 'selected' : '' ?>>5 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 10 inches' ? 'selected' : '' ?>>5 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '5 feet 11 inches' ? 'selected' : '' ?>>5 feet 11 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet' ? 'selected' : '' ?>> 6 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 2 inches' ? 'selected' : '' ?>>6 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 3 inches' ? 'selected' : '' ?>>6 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 4 inches' ? 'selected' : '' ?>>6 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 5 inches' ? 'selected' : '' ?>>6 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 6 inches' ? 'selected' : '' ?>>6 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 7 inches' ? 'selected' : '' ?>>6 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 8 inches' ? 'selected' : '' ?>>6 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 9 inches' ? 'selected' : '' ?>>6 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 10 inches' ? 'selected' : '' ?>>6 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '6 feet 11 inches' ? 'selected' : '' ?>>6 feet 11 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet' ? 'selected' : '' ?>> 7 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 2 inches' ? 'selected' : '' ?>>7 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 3 inches' ? 'selected' : '' ?>>7 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 4 inches' ? 'selected' : '' ?>>7 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 5 inches' ? 'selected' : '' ?>>7 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 6 inches' ? 'selected' : '' ?>>7 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 7 inches' ? 'selected' : '' ?>>7 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 8 inches' ? 'selected' : '' ?>>7 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 9 inches' ? 'selected' : '' ?>>7 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 10 inches' ? 'selected' : '' ?>>7 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '7 feet 11 inches' ? 'selected' : '' ?>>7 feet 11 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet' ? 'selected' : '' ?>> 8 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 2 inches' ? 'selected' : '' ?>>8 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 3 inches' ? 'selected' : '' ?>>8 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 4 inches' ? 'selected' : '' ?>>8 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 5 inches' ? 'selected' : '' ?>>8 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 6 inches' ? 'selected' : '' ?>>8 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 7 inches' ? 'selected' : '' ?>>8 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 8 inches' ? 'selected' : '' ?>>8 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 9 inches' ? 'selected' : '' ?>>8 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 10 inches' ? 'selected' : '' ?>>8 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '8 feet 11 inches' ? 'selected' : '' ?>>8 feet 11 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet' ? 'selected' : '' ?>> 9 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 2 inches' ? 'selected' : '' ?>>9 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 3 inches' ? 'selected' : '' ?>>9 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 4 inches' ? 'selected' : '' ?>>9 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 5 inches' ? 'selected' : '' ?>>9 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 6 inches' ? 'selected' : '' ?>>9 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 7 inches' ? 'selected' : '' ?>>9 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 8 inches' ? 'selected' : '' ?>>9 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 9 inches' ? 'selected' : '' ?>>9 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 10 inches' ? 'selected' : '' ?>>9 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '9 feet 11 inches' ? 'selected' : '' ?>>9 feet 11 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet' ? 'selected' : '' ?>> 10 feet</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 1 inches' ? 'selected' : '' ?>>10 feet 1 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 2 inches' ? 'selected' : '' ?>>10 feet 2 inches</option>
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 3 inches' ? 'selected' : '' ?>>10 feet 3 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 4 inches' ? 'selected' : '' ?>>10 feet 4 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 5 inches' ? 'selected' : '' ?>>10 feet 5 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 6 inches' ? 'selected' : '' ?>>10 feet 6 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 7 inches' ? 'selected' : '' ?>>10 feet 7 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 8 inches' ? 'selected' : '' ?>>10 feet 8 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 9 inches' ? 'selected' : '' ?>>10 feet 9 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 10 inches' ? 'selected' : '' ?>>10 feet 10 inches</option> 
      <option <?php echo isset($row['height']) && $row['height'] == '10 feet 11 inches' ? 'selected' : '' ?>>10 feet 11 inches</option>
    </select>

    <br><br>

  </div><br>
</div>

  <br>
<div class="column">
  <div class="patientprofile">
    <br>
    <h3><b>PATIENT PROFILE</b></h3>

    <div class="dates">
      <h5>DATE ADMITTED</h5>
      <input class="form-control" type="date" name="dadmit" id="dadmit" value="<?php echo $row['dadmit']; ?>" required><br>
      <h5>DATE DISCHARGE</h5>
      <input class="form-control" type="date" name="ddis" id="ddis" value="<?php echo $row['ddis']; ?>"><br>
    </div>
    <div class="others">
      <h5>WARD</h5>
        <select class="form-control" type="text" name="wrd" required>  
          <option value disabled selected>Select Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Emergency Room' ? 'selected' : '' ?>>Emergency Room</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Emergency Ward' ? 'selected' : '' ?>>Emergency Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Observation Unit Ward' ? 'selected' : '' ?>>Observation Unit Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Childrens Ward' ? 'selected' : '' ?>>Childrens Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'New Service Ward' ? 'selected' : '' ?>>New Service Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Male Service A Ward' ? 'selected' : '' ?>>Male Service A Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Spinal Ward' ? 'selected' : '' ?>>Spinal Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Rehab ward' ? 'selected' : '' ?>>Rehab ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Post Anesthesia Care Unit' ? 'selected' : '' ?>>Post Anesthesia Care Unit</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Male Traction Service Ward' ? 'selected' : '' ?>>Male Traction Service Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Male Service B Ward' ? 'selected' : '' ?>>Male Service B Ward</option> 
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Female Service Ward' ? 'selected' : '' ?>>Female Service Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Pay 3rd Ward' ? 'selected' : '' ?>>Pay 3rd Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Pay 4th East Ward' ? 'selected' : '' ?>>Pay 4th East Ward</option>
          <option <?php echo isset($row['wrd']) && $row['wrd'] == 'Philhealth Ward' ? 'selected' : '' ?>>Philhealth Ward</option>
        </select>
      <h5>ATTENDING PHYSICIAN</h5>
      <label><?php echo $row['aphy']; ?></label>
      <h5>ALLERGIES</h5>
      <input class="form-control" name="alerg" value="<?php echo $row['alerg']; ?>">
      <h5>DIET</h5>
      <select class="diet2"type="text" name="diet"> 
      <option value disabled selected>Enter diet</option>  
      <option <?php echo isset($row['diet']) && $row['diet'] == 'Low fat diet' ? 'selected' : '' ?>>Low fat diet</option>  
      <option <?php echo isset($row['diet']) && $row['diet'] == 'Low carb diet' ? 'selected' : '' ?>>Low carb diet</option>  
      <option <?php echo isset($row['diet']) && $row['diet'] == 'Low protein diet' ? 'selected' : '' ?>>Low protein diet</option>  
      <option <?php echo isset($row['diet']) && $row['diet'] == 'High fat diet' ? 'selected' : '' ?>>High fat diet</option>  
      <option <?php echo isset($row['diet']) && $row['diet'] == 'High carb diet' ? 'selected' : '' ?>>High carb diet</option>
      <option <?php echo isset($row['diet']) && $row['diet'] == 'High protein diet' ? 'selected' : '' ?>>High protein diet</option> 
      <option <?php echo isset($row['diet']) && $row['diet'] == 'Low Salt Diet' ? 'selected' : '' ?>>Low Salt Diet</option>
      <option <?php echo isset($row['diet']) && $row['diet'] == 'DAT (Diet as Tolerated)' ? 'selected' : '' ?>>DAT (Diet as Tolerated)</option> 
    </select>
      <h5>DIAGNOSIS</h5>
      <input class="form-control" name="diag" value="<?php echo $row['diag']; ?>">

    <br><br><br><br>
    
    </div>
  </div>
</div>
  <button type="submit" style="margin-left: 45%; background-color: #4CAF50; border-radius: 8px; border: 2px solid #4CAF50; color: white; padding: 5px 12px;" name="submit">Save</button>
  </form>

<?php 
} 
?>
<?php  
 $patient_id = $_GET['patient_id'];
 $connect = mysqli_connect("db5006392531.hosting-data.io", "dbu1468779", "@TDMSgroup9!", "dbs5321751"); 
 $sql = "SELECT * FROM prescriptiontbl WHERE patient_id = '$id'";
 $result = mysqli_query($connect, $sql);  
 ?> 

      <form>
      <table>
        <tr>
          <th>DATE</th>
          <th>NAME OF MEDICINE</th>
          <th>QUANTITY</th>
          <th>PRICE EACH</th>
          <th>TOTAL PRICE</th>
        </tr>
        <tr><?php
          $query = "SELECT * FROM prescriptiontbl WHERE patient_id='$id' GROUP BY patient_id, patient_dorder HAVING COUNT(patient_dorder) > 0 ORDER BY id"; 
          $result = mysqli_query($con, $query);
                
          ?>
                    
              
                    <div id="searchresult"></div>
                    <?php

          if(isset($_GET['patient_id'])){
            if(isset($_GET['order_date'])){
                  $input = $_GET['order_date'];
                  $id = $_GET['patient_id'];
                  $query = "SELECT * FROM prescriptiontbl WHERE patient_dorder='$input'AND patient_id = '$id' ORDER BY id"; 
                  $result = mysqli_query($con, $query);

                  if(mysqli_num_rows($result) > 0){
                  while ($row =mysqli_fetch_array($result)) {
                    # code...
          ?><tr>
              <td><?php echo $row["patient_dorder"];?></td>
              <td><?php echo $row["patient_nom"];?></td>  
              <td><?php echo $row["patient_qty"]; ?></td>
              <td><?php echo $row["patient_prc"];?></td>
              <?php  $total_price = $row["patient_qty"] * $row["patient_prc"];  ?>
              <td id="loop"><?php echo $total_price ?></td> 
            
            </tr>
            <?php
              }
            }else{
                echo "no value";
              }
            }else {
                  $input = $_GET['patient_id'];
                  $query = "SELECT * FROM prescriptiontbl WHERE patient_id='$input'AND patient_id = '$id' ORDER BY id"; 
                  $result = mysqli_query($con, $query);

                  if(mysqli_num_rows($result) > 0){
                  while ($row =mysqli_fetch_array($result)) {
                    # code...
          ?><tr>
              <td><?php echo date("M d,Y",strtotime($row["patient_dorder"])) ?></td>
              <td><?php echo $row["patient_nom"]; ?></td>  
              <td><?php echo $row["patient_qty"]; ?></td>  
              <td>₱ <?php echo number_format($row["patient_prc"],2) ?></td>   
              <?php  $total_price = $row["patient_qty"] * $row["patient_prc"];  ?>
              <td>₱ <?php echo number_format($total_price,2) ?></td>
            </tr>
            <?php
              $grand_total = $grand_total + $total_price;
              }
            }
            }
            ?>
              <td colspan="3"></td>
              <th>GRAND TOTAL</th>
              <th>₱ <?php echo number_format($grand_total,2) ?></th>
                </table>
                </form>
          <?php
          }
          ?>

        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
  //Sum Total
    $(function() {

       var TotalValue = 0;

       $("tr #loop").each(function(index,value){
         currentRow = parseFloat($(this).text());
         TotalValue += currentRow
       });

       document.getElementById('total').innerHTML = TotalValue;

});
</script>

<script type="text/javascript">
  n = new Date();
  y = n.getFullYear();
  m = n.getMonth() + 1;
  d = n.getDate();

  if(d<10){
    d='0'+d
  }
  if(m<10){
    m='0'+m
  }
  var today = y + "-" + m + "-" + d;
  document.getElementById("dadmit").setAttribute("min", today);
  document.getElementById("ddis").setAttribute("min", today);
  document.getElementById("txtbirthdate").setAttribute("max", today);
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