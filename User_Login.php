<?php 
 include "db_connection.php";
 $json = file_get_contents('php://input');
 $obj = json_decode($json, true);
 


   $user_name=$obj['user_name'];
   $user_email=$obj['user_email'];

//  $user_email ='Ahmed900@gmail.com';
//  $user_password = '55555';



 if ($user_email && $user_password){

$user_query = mysqli_query($con , "SELECT * FROM `users` WHERE `user_email` ='$user_email'AND `user_password` =  '$user_password'  ;");

if (mysqli_num_rows($user_query) > 0){
    $user_login = mysqli_fetch_object($user_query);

    // echo json_encode($user_login);
    echo json_encode('succes');


}
else {
    echo json_encode('error');
}
 }
 else{
    echo json_encode('email not fount');
 }


?>
