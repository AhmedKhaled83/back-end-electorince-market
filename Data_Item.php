

 <?php 
    include "db_connection.php";
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    
   
   
      $ID_item=$obj['ID_item'];

    // $ID_item = '1'; 

    $item = array();

    $item_query = mysqli_query($con , "SELECT * FROM `items` WHERE 1 "); 


     if (mysqli_num_rows($item_query) > 0 ){

        $item_check = mysqli_query($con , "SELECT * FROM `items` WHERE  `item_id` = '$ID_item' AND `item_show` = '1' ");
        if (mysqli_num_rows($item_check) > 0 ){
           

            while ($items_1 = mysqli_fetch_object($item_check)){

         
                $item[] = $items_1;
            
                
            $check_images = mysqli_query($con ,"SELECT * FROM `image_items` WHERE `item_id` = '$ID_item'");

            if (mysqli_num_rows( $check_images)){
                while ($items = mysqli_fetch_object($check_images)){

         
                    // $item[] = $items;
                    $items_1->images[]=$items;
       
                   }


            }

   
               }





        } 
     
        else{
            echo json_encode('Not Available in this catageroy');
        }

      
    }
    else{
        echo json_encode('Not Available data');
    }


  
echo json_encode($item)



    ?>

