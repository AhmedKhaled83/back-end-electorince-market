<?php
 include "db_connection.php";
 $json = file_get_contents('php://input');
 $obj = json_decode($json, true);
 



$Complaints_body = $obj['Complaints_body'];
$user_id =$obj['user_id'];


// $Complaints_body = 'nice';
// $user_id ='2';



if($Complaints_body&&$user_id){

        $insert_compalint = mysqli_query($con,"INSERT INTO `complaints`(`Complaints_body`, `user_id`, `Complaints_date`) VALUES ('$Complaints_body','$user_id',DATE_ADD(now(),interval 2 hour));");
        if(mysqli_affected_rows($con)){
            echo json_encode ('inserted');
        }
        else{
            echo json_encode ('not inserted');
        }
 
}
else{
    echo json_encode('check the data');
}


?>