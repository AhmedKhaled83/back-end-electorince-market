    <?php 
    include "db_connection.php";
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    
   
   
    //   $catogery_id=$obj['catogery_id'];

    $catogery_id = '1'; 

    $item = array();

    $item_query = mysqli_query($con , "SELECT * FROM `items` WHERE 1 "); 


     if (mysqli_num_rows($item_query) > 0 ){

        $item_check = mysqli_query($con , "SELECT * FROM `items` WHERE `item_category_id` = '$catogery_id' AND `item_show` = '1' ");
        if (mysqli_num_rows($item_check) > 0 ){

            while ($items = mysqli_fetch_object($item_check)){

         
             $item[] = $items;
       

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

