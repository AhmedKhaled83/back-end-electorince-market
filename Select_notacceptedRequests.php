<?php

include "db_connection.php";

$Select_NotacceptedRequests = mysqli_query($con,"SELECT * FROM `rent_request` WHERE `accept_noaccept`=0");
if(mysqli_num_rows($Select_NotacceptedRequests)>0){
    while($request=mysqli_fetch_object($Select_NotacceptedRequests)){
        $NotacceptedRequests []=$request;
    }
    echo json_encode($NotacceptedRequests);
}
else{
    echo json_encode('no requests not accepted');
}

?>