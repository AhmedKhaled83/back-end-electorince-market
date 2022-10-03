    <?php 
include 'db_connection.php';
    $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        

        //    $user_name= $obj['user_name'];
        //    $user_email= $obj['user_email'];
        //    $user_password = $obj ['user_password'];
        //    $user_phone=  $obj['user_phone'];
        //    $user_image= $obj['user_image'];
        //    $user_token =  $obj['user_token'];



        $user_name='mohamed';
        $user_email='mooo5@gmail.com';
        $user_password = 'hhhj';
        $user_image = 'ggu';
        $user_phone= '01000068758';
        // $user_token = '022';
       

        if( $user_name && $user_email && $user_phone && $user_password && $user_token){ 
            $user_check = mysqli_query($con , "SELECT * FROM users WHERE user_email = '$user_email';"); 
             
if (mysqli_num_rows($user_check) === 0){ 
    $user_insert = mysqli_query($con ,"INSERT INTO users( user_name, user_email, user_password, user_image, user_phone, user_token, user_date) VALUES ('$user_name','$user_email','$user_password',Null,'$user_phone','$user_token',Null);"); 
 
    if( mysqli_affected_rows($con) > 0  ){ 
 
        $user_id = mysqli_insert_id($con); 
 
        echo json_encode($user_id); 
 
}else{ 
    
    echo json_encode("error"); 
} 
 
}else{ 
    echo json_encode("email found"); 
 
} 
 
} 
else{ 
 
    echo json_encode("no data"); 
}
?>




