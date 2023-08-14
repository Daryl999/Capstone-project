<?php
//insert.php;

if(isset($_POST["med_nom"]))
{
 $connect = new PDO("mysql:host=db5006392531.hosting-data.io;dbname=dbs5321751", "dbu1468779", "@TDMSgroup9!");
 for($count = 0; $count < count($_POST["med_nom"]); $count++)
 {
  $med_nom = $_POST['med_nom'][$count];
  $med_id = $_POST['med_id'][$count];
  $stmt = $connect->prepare("SELECT med_nom FROM medicinetbl WHERE med_nom = :med_nom");
  $stmt->bindParam(":med_nom", $med_nom);
  $stmt->execute();    

  if($stmt->rowCount() > 0){
    //echo for Data input is already exist
        echo '<div class="alert alert-danger">'.$med_nom.' <b>is Already exist.</b><br></div>';
  }else{
        $query = "INSERT INTO medicinetbl (med_dorder, med_id, med_nom, med_qty, med_prc) VALUES (:med_dorder, :med_id, :med_nom, :med_qty, :med_prc)";
        $statement = $connect->prepare($query);
        $statement->execute(
         array(
          ':med_dorder'  => $_POST["med_dorder"][$count],
          ':med_id'  => $_POST["med_id"][$count], 
          ':med_nom'  => $_POST["med_nom"][$count],
          ':med_qty' => $_POST["med_qty"][$count], 
          ':med_prc'  => $_POST["med_prc"][$count]
         )
        );
           $result = $statement->fetchAll();
           if(isset($result))
           {
            //echo for Date is saved successfuly
            echo '<div class="alert alert-success">'.$med_nom.' <b>is Save successfully.</b><br></div>';
           }
  }
 }
}
?>