

 
<?php
include 'db_connection.php';
$json = file_get_contents('php://input');
$obj = json_decode($json, true);

$item_id = $obj['item_id'];



// $item_id = '1';


$calender = array();

$calender[] =  date("Y-m-d");
$date=new DateTime();
for($counter = 0 ; $counter < 60 ; $counter++){
date_add($date,date_interval_create_from_date_string("1 days"));
$calender[] =date_format($date,"Y-m-d"); ;


}


// echo json_encode($calender);




$query  =  mysqli_query($con , "SELECT * FROM `rent_request` WHERE `item_id` = '$item_id' AND `accept_noaccept` = '1'");

if (mysqli_num_rows($query) > 0){

$item =  mysqli_fetch_object($query);


$arr_date = array();

$begin = new DateTime($item->form_date);
$end   = new DateTime(  $item->to_data );

for($i = $begin; $i <= $end; $i->modify('+1 day')){
    $arr_date[]= $i->format("Y-m-d") ;
}
 
// echo json_encode($arr_date);

// echo json_encode($item);

$date_rent = array();

for($index_date = 0 ; $index_date < count($arr_date); $index_date++ ){


for($index = 0 ; $index < count($calender); $index++ ){
   

    if ($calender[$index] == $arr_date[$index_date]){

       $date_rent[]= $calender[$index];

        break;
    }else{
        
        continue;
    }
  
};


}

echo json_encode($date_rent);

}else{
    echo json_encode('no data available');
}
?> 