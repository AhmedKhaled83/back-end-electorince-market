<?php

include 'db_connection.php';

$Selector = mysqli_query($con,'SELECT * FROM `categories` WHERE 1');
if( mysqli_num_rows($Selector)>0){
    while($Category = mysqli_fetch_object($Selector)){
        $Categories[] = $Category;
    }
    echo json_encode( $Categories);
  
}
else{
    echo('No data');
}


?>