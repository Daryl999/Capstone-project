<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<?php
$now = new DateTime();
$now->setTimezone(new DateTimeZone('Asia/Manila'));
?>
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
    <!-- dropdown -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- link for textbox design -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- spacing of table -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
          <a href="admin-dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="admin-patient-profile1.php" class="active">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Patient Profile</span>
          </a>
        </li>
        <li>
          <a href="admin-patient-record.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Patient Record</span>
          </a>
        </li>
        <li>
          <a href="admin-inventory.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Inventory</span>
          </a>
        </li>
        <li>
          <a href="admin-sales-report.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Sales Report</span>
          </a>
        </li>
        <li>
          <a href="admin-approval.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Approve User</span>
          </a>
        </li>
        <li>
          <a href="admin-add-doctor.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Add Doctor</span>
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
        <div class="w3-container">
          <div class="w3-dropdown-click">
            <button onclick="myFunction()" class="w3-button w3-green" style="border-radius: 0.25rem;">Logout</button>
            <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
              <a href="user-profile.php" class="w3-bar-item w3-button">Profile</a>
              <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
            </div>
          </div>
        </div>
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title" align="center">Patient Medication Profile</div><br>
            
<form action="admin-patient-profile1-action.php" method="post">
  <table class="w3-table">
  <tr>
    <td>
      <label>Last Name</label>
      <input class="form-control" type="text" name="lname" placeholder="Last name" required>
    </td>
    <td>
      <label>First Name</label>
      <input class="form-control" type="text" name="fname" placeholder="First name" required>
    </td>
    <td>
      <label>Middle Name</label>
      <input class="form-control" type="text" name="mname" placeholder="Middle name">
    </td>
    <td>
      <label>Ward</label>
      <select class="form-control" type="text" name="wrd" required>  
        <option value disabled selected>Select Ward</option>  
        <option value="Emergency Room">Emergency Room</option>  
        <option value="Emergency Ward">Emergency Ward</option>  
        <option value="Observation Unit Ward">Observation Unit Ward</option>  
        <option value="Childrens Ward">Childrens Ward</option>  
        <option value="New Service Ward">New Service Ward</option>  
        <option value="Male Service A Ward">Male Service A Ward</option>  
        <option value="Spinal Ward">Spinal Ward</option>  
        <option value="Rehab ward">Rehab ward</option>
        <option value="Post Anesthesia Care Unit">Post Anesthesia Care Unit </option> 
        <option value="Male Traction Service Ward">Male Traction Service Ward</option> 
        <option value="Male Service B Ward">Male Service B Ward</option> 
        <option value="Female Service Ward">Female Service Ward</option>
        <option value="Pay 3rd Ward">Pay 3rd Ward</option>
        <option value="Pay 4th East Ward">Pay 4th East Ward</option>
        <option value="Philhealth Ward">Philhealth Ward</option>
      </select>
    </td>
    <td>
      <label>Case Number</label>
      <input class="form-control" type="text" name="cnum" placeholder="Case number" minlength="7" maxlength="7" onkeypress="return isNumberKey(event)" required>
    </td>
  </tr>
  <tr>
    <td>
      <label>Weight</label>
      <input class="form-control" type="text" name="weight" placeholder="Weight">
    </td>
    <td>
      <label>Height</label>
      <select class="form-control" type="text" name="height">
        <option value disabled selected>Height</option> 
        <option value="1 feet"> 1 feet</option> 
        <option value="1 feet 2 inches">1 feet 2 inches</option>
        <option value="1 feet 3 inches">1 feet 3 inches</option>
        <option value="1 feet 4 inches">1 feet 4 inches</option>
        <option value="1 feet 5 inches">1 feet 5 inches</option>
        <option value="1 feet 6 inches">1 feet 6 inches</option>
        <option value="1 feet 7 inches">1 feet 7 inches</option>
        <option value="1 feet 8 inches">1 feet 8 inches</option>
        <option value="1 feet 9 inches">1 feet 9 inches</option>
        <option value="1 feet 10 inches">1 feet 10 inches</option>
        <option value="1 feet 11 inches">1 feet 11 inches</option>
        <option value="2 feet"> 2 feet</option> 
        <option value="2 feet 1 inches">2 feet 1 inches</option>
        <option value="2 feet 2 inches">2 feet 2 inches</option>
        <option value="2 feet 3 inches">2 feet 3 inches</option>
        <option value="2 feet 4 inches">2 feet 4 inches</option>
        <option value="2 feet 5 inches">2 feet 5 inches</option>
        <option value="2 feet 6 inches">2 feet 6 inches</option>
        <option value="2 feet 7 inches">2 feet 7 inches</option>
        <option value="2 feet 8 inches">2 feet 8 inches</option>
        <option value="2 feet 9 inches">2 feet 9 inches</option>
        <option value="2 feet 10 inches">2 feet 10 inches</option>
        <option value="2 feet 11 inches">2 feet 11 inches</option>
        <option value="3 feet"> 3 feet</option> 
        <option value="3 feet 1 inches">3 feet 1 inches</option>
        <option value="3 feet 2 inches">3 feet 2 inches</option>
        <option value="3 feet 3 inches">3 feet 3 inches</option>
        <option value="3 feet 4 inches">3 feet 4 inches</option>
        <option value="3 feet 5 inches">3 feet 5 inches</option>
        <option value="3 feet 6 inches">3 feet 6 inches</option>
        <option value="3 feet 7 inches">3 feet 7 inches</option>
        <option value="3 feet 8 inches">3 feet 8 inches</option>
        <option value="3 feet 9 inches">3 feet 9 inches</option>
        <option value="3 feet 10 inches">3 feet 10 inches</option>
        <option value="3 feet 11 inches">3 feet 11 inches</option>
        <option value="4 feet"> 4 feet</option> 
        <option value="4 feet 1 inches">4 feet 1 inches</option>
        <option value="4 feet 2 inches">4 feet 2 inches</option>
        <option value="4 feet 3 inches">4 feet 3 inches</option>
        <option value="4 feet 4 inches">4 feet 4 inches</option>
        <option value="4 feet 5 inches">4 feet 5 inches</option>
        <option value="4 feet 6 inches">4 feet 6 inches</option>
        <option value="4 feet 7 inches">4 feet 7 inches</option>
        <option value="4 feet 8 inches">4 feet 8 inches</option>
        <option value="4 feet 9 inches">4 feet 9 inches</option>
        <option value="4 feet 10 inches">4 feet 10 inches</option>
        <option value="4 feet 11 inches">4 feet 11 inches</option>
        <option value="5 feet"> 5 feet</option> 
        <option value="5 feet 1 inches">5 feet 1 inches</option>
        <option value="5 feet 2 inches">5 feet 2 inches</option>
        <option value="5 feet 3 inches">5 feet 3 inches</option>
        <option value="5 feet 4 inches">5 feet 4 inches</option>
        <option value="5 feet 5 inches">5 feet 5 inches</option>
        <option value="5 feet 6 inches">5 feet 6 inches</option>
        <option value="5 feet 7 inches">5 feet 7 inches</option>
        <option value="5 feet 8 inches">5 feet 8 inches</option>
        <option value="5 feet 9 inches">5 feet 9 inches</option>
        <option value="5 feet 10 inches">5 feet 10 inches</option>
        <option value="5 feet 11 inches">5 feet 11 inches</option>
        <option value="6 feet"> 6 feet</option> 
        <option value="6 feet 1 inches">6 feet 1 inches</option>
        <option value="6 feet 2 inches">6 feet 2 inches</option>
        <option value="6 feet 3 inches">6 feet 3 inches</option>
        <option value="6 feet 4 inches">6 feet 4 inches</option>
        <option value="6 feet 5 inches">6 feet 5 inches</option>
        <option value="6 feet 6 inches">6 feet 6 inches</option>
        <option value="6 feet 7 inches">6 feet 7 inches</option>
        <option value="6 feet 8 inches">6 feet 8 inches</option>
        <option value="6 feet 9 inches">6 feet 9 inches</option>
        <option value="6 feet 10 inches">6 feet 10 inches</option>
        <option value="6 feet 11 inches">6 feet 11 inches</option>
        <option value="7 feet"> 7 feet</option> 
        <option value="7 feet 1 inches">7 feet 1 inches</option>
        <option value="7 feet 2 inches">7 feet 2 inches</option>
        <option value="7 feet 3 inches">7 feet 3 inches</option>
        <option value="7 feet 4 inches">7 feet 4 inches</option>
        <option value="7 feet 5 inches">7 feet 5 inches</option>
        <option value="7 feet 6 inches">7 feet 6 inches</option>
        <option value="7 feet 7 inches">7 feet 7 inches</option>
        <option value="7 feet 8 inches">7 feet 8 inches</option>
        <option value="7 feet 9 inches">7 feet 9 inches</option>
        <option value="7 feet 10 inches">7 feet 10 inches</option>
        <option value="7 feet 11 inches">7 feet 11 inches</option>
        <option value="8 feet"> 8 feet</option> 
        <option value="8 feet 1 inches">8 feet 1 inches</option>
        <option value="8 feet 2 inches">8 feet 2 inches</option>
        <option value="8 feet 3 inches">8 feet 3 inches</option>
        <option value="8 feet 4 inches">8 feet 4 inches</option>
        <option value="8 feet 5 inches">8 feet 5 inches</option>
        <option value="8 feet 6 inches">8 feet 6 inches</option>
        <option value="8 feet 7 inches">8 feet 7 inches</option>
        <option value="8 feet 8 inches">8 feet 8 inches</option>
        <option value="8 feet 9 inches">8 feet 9 inches</option>
        <option value="8 feet 10 inches">8 feet 10 inches</option>
        <option value="8 feet 11 inches">8 feet 11 inches</option>
        <option value="9 feet"> 9 feet</option> 
        <option value="9 feet 1 inches">9 feet 1 inches</option>
        <option value="9 feet 2 inches">9 feet 2 inches</option>
        <option value="9 feet 3 inches">9 feet 3 inches</option>
        <option value="9 feet 4 inches">9 feet 4 inches</option>
        <option value="9 feet 5 inches">9 feet 5 inches</option>
        <option value="9 feet 6 inches">9 feet 6 inches</option>
        <option value="9 feet 7 inches">9 feet 7 inches</option>
        <option value="9 feet 8 inches">9 feet 8 inches</option>
        <option value="9 feet 9 inches">9 feet 9 inches</option>
        <option value="9 feet 10 inches">9 feet 10 inches</option>
        <option value="9 feet 11 inches">9 feet 11 inches</option>
        <option value="10 feet"> 10 feet</option> 
        <option value="10 feet 1 inches">10 feet 1 inches</option>
        <option value="10 feet 2 inches">10 feet 2 inches</option>
        <option value="10 feet 3 inches">10 feet 3 inches</option>
        <option value="10 feet 4 inches">10 feet 4 inches</option>
        <option value="10 feet 5 inches">10 feet 5 inches</option>
        <option value="10 feet 6 inches">10 feet 6 inches</option>
        <option value="10 feet 7 inches">10 feet 7 inches</option>
        <option value="10 feet 8 inches">10 feet 8 inches</option>
        <option value="10 feet 9 inches">10 feet 9 inches</option>
        <option value="10 feet 10 inches">10 feet 10 inches</option>
        <option value="10 feet 11 inches">10 feet 11 inches</option>
      </select>
    </td>
    <td>
      <label>Diet</label>
        <select class="form-control" type="text" name="diet"> 
        <option value disabled selected>Diet</option>  
        <option value="Low fat diet">Low fat diet</option>  
        <option value="Low carb diet">Low carb diet</option>  
        <option value="Low protein diet">Low protein diet</option>  
        <option value="High fat diet">High fat diet</option>  
        <option value="High carb diet">High carb diet</option>
        <option value="High protein diet">High protein diet</option> 
        <option value="Low Salt Diet">Low Salt Diet</option>
        <option value="DAT (Diet as Tolerated)">DAT (Diet as Tolerated)</option> 
      </select>
    </td>
    <td>
      <label>Mobile/Tel no.</label>
      <input class="form-control" type="text" name="contact" placeholder="Contact Number" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11">
    </td>
    <td>
      <label>Date Admit</label>
      <input class="form-control" type='date' name="dadmit" id="dadmit" required>
    </td>
  </tr>
  <tr>
    <td>
      <label>Date of Birth</label>
      <input class="form-control" id="txtbirthdate" type="date" name="bday" maxlength="10" placeholder="mm/dd/yyyy" onchange="getAgeVal(0)" onchange="getAgeVal(0);" required>
    </td>
    <td>
      <label id="age1" for="txtage">Age <?php echo isset($_POST['age']) ?></label>
      <input type="text" class="form-control" placeholder="Age"  name="age" id="txtage" autocomplete="off" readonly style="background-color: #fff" required>
    </td>
    <td>
      <label>Marital Status</label>
      <select class="form-control" id="socstat" type="text" name="sstat" required>  
        <option value disabled selected>Marital Status</option>   
        <option value="Single">Single</option>  
        <option value="Married">Married</option>  
        <option value="Widowed">Widowed</option>  
        <option value="Separated">Separated</option>  
        <option value="Divorced">Divorced</option> 
      </select>
    </td>
    <td>
      <label>Sex</label>
      <select class="form-control" type="text" name="gend" placeholder="Enter" required>
        <option value disabled selected>Sex</option>  
        <option value="Male">Male</option>  
        <option value="Female">Female</option>  
      </select>
    </td>
    <td>
      <label>Date Discharge</label>
      <input class="form-control" type='date' name="ddis" id="ddis">
    </td>
  </tr>
  <tr>
    <td colspan="5">
      <label>Diagnosis</label><br>
      <textarea class="form-control" type="text" name="diag" placeholder="diagnosis" ></textarea>
    </td>
  </tr>
  <tr>
    <td colspan="4">
      <label>Allergies</label>
      <input class="form-control" type="text" name="alerg" placeholder="allergies">
    </td>
    <td>
<!-- connection in database -->
<?php  
 $connect = mysqli_connect("localhost", "root", "", "dbs5321751");  
 $query = "SELECT * FROM doctortbl ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
 ?> 
      <label>Doctor in charge</label>
      <select class="form-control" type="text" name="aphy" required><br><br>
        <option value disabled selected>Select Doctor</option>
        <?php
         while ($row = mysqli_fetch_array($result)) {
        ?>
        <option value="Dr. <?php echo $row['doctor_name']; ?> <?php echo $row['doctor_surname']; ?> / <?php echo $row['doctor_position']; ?>">Dr. <?php echo $row['doctor_name']; ?> <?php echo $row['doctor_surname']; ?> / <?php echo $row['doctor_position']; ?></option>
        <?php } ?>
      </select>
    </td>
  </tr>
  </table>

  <br>
  <input type="submit" name="submit" value="Next" class="btn btn-info" style="margin-left: 47%" />
  
</form>

        </div>
      </div>
    </div><br>
  </section>

<script>
function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
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

 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

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

