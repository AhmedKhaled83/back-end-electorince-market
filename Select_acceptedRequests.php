<?php

include 'db_connection.php';
$Select_acceptedRequests = mysqli_query($con,"SELECT * FROM `rent_request` WHERE `accept_noaccept`=1");
if(mysqli_num_rows($Select_acceptedRequests)>0){
    while($request=mysqli_fetch_object($Select_acceptedRequests)){
        $AcceptedRequests []=$request;
    }
    echo json_encode($AcceptedRequests);
}
else{
    echo json_encode('no requests accepted');
}

?>