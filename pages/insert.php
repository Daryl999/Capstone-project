<?php if(session_status() === PHP_SESSION_NONE){ session_start();} ?>
<?php
//insert.php;

//patient_nom value is id
if(isset($_POST["patient_nom"])) {

 $connect = new PDO("mysql:host=db5006392531.hosting-data.io;dbname=dbs5321751", "dbu1468779", "@TDMSgroup9!");
 
 for($count = 0; $count < count($_POST["patient_nom"]); $count++){


  $patient_nom = $_POST['patient_nom'][$count];


  //Get the data from the database
  $stmt = 'SELECT * 
          FROM medicinetbl
          WHERE med_nom =:patient_nom';

  $stmt = $connect->prepare($stmt);
  $stmt->bindParam(":patient_nom", $patient_nom);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach( $rows as $row )
  {
      //Place the data needed to the variable
      $med_nom = $row['med_nom'];
        $_SESSION['med_nom'] = $row['med_qty'];
      $med_qty = $row['med_qty'];
  } 




  $patient_qty = $_POST["patient_qty"][$count];

  // IF Patient quantity is less than, and not equal to zero then proceed to save
  if($patient_qty <= $med_qty && $med_qty != 0){

      $query = "INSERT INTO prescriptiontbl (patient_id, patient_dorder, patient_nom, patient_qty, patient_prc) VALUES (:patient_id, :patient_dorder, :patient_nom, :patient_qty, :patient_prc)";
      $statement = $connect->prepare($query);
      $statement->execute(
       array(
        ':patient_id'  => $_POST["patient_id"][$count], 
        ':patient_dorder'  => $_POST["patient_dorder"][$count], 
        ':patient_nom'  => $_POST["patient_nom"][$count],
        ':patient_qty' => $_POST["patient_qty"][$count], 
        ':patient_prc'  => $_POST["patient_prc"][$count]
       )
      );

     $result = $statement->fetchAll();

     if(isset($result)){  
        //Formula to reduce the current medicine in the medicinetbl
        $med_qty = $med_qty - $patient_qty;

        //Data to update
        // $data = [
        //     'med_nom' => $med_nom,
        //     'med_qty' => $med_qty
        // ];

        $sql = "UPDATE medicinetbl SET med_qty=? WHERE med_nom=?";
        $stmt= $connect->prepare($sql);
        $stmt->execute([$med_qty, $med_nom]);
        //Update the the med_qty
        // $update_query="UPDATE medicinetbl SET med_qty, WHERE med_nom, "; 
        // $stmt = $connect->prepare($update_query);
        // $stmt->execute([$med_qty, $med_nom]);
        // $statement->bindParam(':med_nom', $data['med_nom']);
        // $statement->bindParam(':med_qty', $data['med_qty']);
        // $stmt->execute();

        //echo for saving
          echo '<div class="alert alert-success">'.$med_nom.' <b>is Save</b><br></div>';
       }

     }elseif ($med_qty == 0) {
        //echo for empty stocks
        echo '<div class="alert alert-danger">'.$med_nom.' <b>is '.$med_qty.'</b></div><br>';
     }
     else{
        //echo for exceed data input to the quantity
        echo '<div class="alert alert-danger">'.$med_nom.' <b>is exceed to the inventory quantity</b></div><br>';
     }
     //End else
  }
  //End 25: if


}
//End 6: if

?>