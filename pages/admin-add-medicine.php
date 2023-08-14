<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<?php
//index.php

$connect = new PDO("mysql:host=db5006392531.hosting-data.io;dbname=dbs5321751", "dbu1468779", "@TDMSgroup9!");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM categorytbl ORDER BY categoryname ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["id"].'">'.$row["categoryname"].'</option>';
 }
 return $output;
}

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

    <!-- Table CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="application/javascript">

    function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;

           return true;
        }

  </script>

  <style >
    
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
          <a href="admin-inventory.php">
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
          <div class="title" align="center">Add New Medicine</div><hr>

          <form method="post" id="insert_form">
		    <div class="table-repsonsive">
		     <span id="error"></span>
		     <table class="table table-bordered" id="item_table">
		      <tr>
	          <th>Date Order</th>
	          <th>Select Category</th>
		       <th>Name of Medicine</th>
		       <th>Quantity</th>
		       <th>Price Each</th>
		       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
		      </tr>
		     </table>
		     <div align="center">
		     	<br>
		      <input type="submit" name="submit" class="btn btn-info" value="Save" />
		     </div>
		    </div>
		   </form>

        </div>
      </div>
    </div>
  </section>
<?php date_default_timezone_set('Asia/Manila');
                date_default_timezone_get();
                $date_time = date("Y-m-d"); ?>
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

<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="med_dorder[]" class="form-control med_dorder" value="<?php echo $date_time ?>" readonly /></td>';
  html += '<td><select name="med_id[]" class="form-control med_id" required><option value="">Select Category</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><input type="text" name="med_nom[]" class="form-control med_nom" /></td>';
  html += '<td><input type="text" onkeypress="return isNumberKey(event)" maxlength="10" name="med_qty[]" class="form-control med_qty" /></td>';
  html += '<td><input type="text" onkeypress="return isNumberKey(event)" maxlength="10" name="med_prc[]" class="form-control med_prc" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.med_nom').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Category at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.med_nom').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Medicine Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.med_qty').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.med_prc').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Input Item Price at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"save.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html(data);
     
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script>

</body>
</html>