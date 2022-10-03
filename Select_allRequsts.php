<?php

include 'db_connection.php';
$request_selector=mysqli_query($con,"SELECT * FROM `rent_request` WHERE 1");

if(mysqli_num_rows($request_selector)>0){
   while($request = mysqli_fetch_object($request_selector)){
    $requests[]=$request;
   }
   echo json_encode($requests);
}
else{
    echo json_encode('no requests');
}


?>