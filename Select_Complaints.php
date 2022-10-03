<?php

include "db_connection.php";

$Select_compains=mysqli_query($con,"SELECT * FROM `complaints` WHERE 1");

if(mysqli_num_rows($Select_compains)>0){
   while($compain = mysqli_fetch_object($Select_compains)){
    $compaints[]=$compain;
   }
   echo json_encode($compaints);
}
else{
    echo json_encode('no compains');
}




?>