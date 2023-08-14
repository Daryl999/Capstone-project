<?php if (session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<?php

include('database_connection.php');

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
     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-1con" href="PMS.PNG" />

  <script type="application/javascript">

    function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;

           return true;
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
include 'user-session.php';
$id=$_GET['patient_id'];
$_session['patient_id'] =$_GET['patient_id'];
?>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i></i>
      <span class="logo_name">Pharmacy</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin-patient-dataview.php?patient_id=<?php echo $id ?>">
            <i class=' bx bx-undo' ></i>
            <span class="links_name">Return</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="title">
        <img class="img-poc" src="POC_Name.png">
      </div>
      
            <ul class="navbar-nav ml-auto">
              <div class="dropdown">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Logout</button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="user-profile.php">Profile</a>
                  <hr>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </div>
          </ul>
        
    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title" align="center">Add Medication</div><hr>

<?php
//index.php

$con = mysqli_connect("localhost", "root", "", "dbs5321751");

$id=$_GET['patient_id'];
$query = "SELECT * FROM patientprofiletbl WHERE id='$id' ";
$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0 ) {
  foreach ($query_run as $row) {
    ?>

    <tr>
    <td><input type="hidden" name="patient_id[]" value="<?=$_GET['patient_id']; ?>"></td>
    </tr>
    <?php
  }
}

?>
      <form method="post" id="insert_form">
        <div class="table-repsonsive">
          <span id="error"></span>
          <table class="table table-bordered" id="item_table">
            <thead>
              <tr>
                <th></th>
                <th>Date Order</th>
                <th>Enter Item Name</th>
                <th>Enter Quantity</th>
                <th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                <th></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Insert" />
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
    $(document).ready(function(){
      
      var count = 0;

      $(document).on('click', '.add', function(){
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="hidden" name="patient_id[]" value="<?=$row['id']; ?>" class="form-control patient_id" /></td>';
        html += '<td><input type="text" name="patient_dorder[]" value="<?php echo $date_time ?>" class="form-control patient_dorder" readonly /></td>';
        html += '<td><select name="patient_nom[]" class="form-control patient_nom" data-sub_category_id="'+count+'"><option value="">Select Medicine</option><?php echo fill_med_nom($connect, "0"); ?></td>';
        html += '<td><input type="text" name="patient_qty[]" class="form-control patient_qty" /></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        html += '<td><select style="display:none;" name="patient_prc[]" class="form-control patient_prc" id="patient_prc'+count+'" value=""></select></td>';
        $('tbody').append(html);
      });

      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

      $(document).on('change', '.patient_nom', function(){
        var category_id = $(this).val();
        var sub_category_id = $(this).data('sub_category_id');
        $.ajax({
          url:"fill_sub_category.php",
          method:"POST",
          data:{category_id:category_id},
          success:function(data)
          {
            var html = '';
            html += data;
            $('#patient_prc'+sub_category_id).html(html);
          }
        })
      });

      $('#insert_form').on('submit', function(event){
        event.preventDefault();
        var error = '';

        $('.patient_id').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Enter Item id at '+count+' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.patient_dorder').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Enter Item date at '+count+' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.patient_nom').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Enter Item name of medicine at '+count+' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.patient_qty').each(function(){
          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select Item quantity at '+count+' row</p>';
            return false;
          }

          count = count + 1;

        });

        $('.patient_prc').each(function(){

          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select Item price '+count+' Row</p> ';
            return false;
          }

          count = count + 1;

        });

        var form_data = $(this).serialize();

        if(error == '')
        {
          $.ajax({
            url:"insert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
              console.log(data);
                $('#item_table').find('tr:gt(0)').remove();
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