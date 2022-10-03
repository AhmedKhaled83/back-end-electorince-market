<?php

include "db_connection.php";

$Select_compains=mysqli_query($con,"SELECT * FROM `complaints` WHERE `Complaints_view`='0';");

if(mysqli_num_rows($Select_compains)>0){
   while($compain = mysqli_fetch_object($Select_compains)){
    $compais[]=$compain;
   }
   echo json_encode($compais);
}
else{
    echo json_encode('no compains');
}




?>
