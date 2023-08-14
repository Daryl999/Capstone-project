
<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost; dbname=dbs5321751;", "root", "");

function fill_select_box($connect, $med_nom)
{
 $query = "
  SELECT * FROM medicinetbl 
  WHERE med_nom = '".$med_nom."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '<option value="'.$row["med_prc"].'">'.$row["med_prc"].'</option>';
 }

 return $output;
}

function fill_med_nom($connect, $med_nom)
{
 $query = "
  SELECT * FROM medicinetbl 
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';

 foreach($result as $row)
 {
  $output .= '<option value="'.$row["med_nom"].'">'.$row["med_nom"].'</option>';
 }

 return $output;
}


?>