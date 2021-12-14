<?php
   
require_once "config_mogolo.php";

session_start();
if(isset($_REQUEST["stock"])){



    $user = $_SESSION["nkwana_user"];
    $item_number  = $_REQUEST['item'];
    $item_name  = $_GET['item_n'];
     
    $item_p = $_REQUEST['item_p'];

    $date = date("l jS \of F Y h:i A");

    $sql_stock = " SELECT date1 FROM weball1 WHERE id_user = '$user' AND item_number = '$item_number' ;";
   
    $selected_items = $conn->query($sql_stock);
    
    
    $rows = $selected_items -> num_rows;
    
    if($rows == 0){
        $sql = "INSERT INTO weball1(id_user,item_number,date1,item_price,item_n)
        VALUE('$user','$item_number','$date','$item_p','$item_name')
        " ;
       
        
        $conn->query($sql);
        //echo "100";

    }
    else{
       // echo "N";
  
  }

    $sql_stock11 = " SELECT item_number FROM weball1 WHERE id_user = '$user' ;";
    $selected_items1 = $conn->query($sql_stock11);
    $rows11 = $selected_items1 -> num_rows;
    $count =  $rows11 +  0;
    echo $count;

    

    


}

if(isset($_REQUEST["remove"])){



    $user = $_SESSION["nkwana_user"];
    $item_number  = $_REQUEST['item'];
     

    $sql_stock = " SELECT date1 FROM weball1 WHERE id_user = '$user' AND item_number = '$item_number' ;";
   
    $selected_items = $conn->query($sql_stock);
    
    
    $rows = $selected_items -> num_rows;
    
    if($rows>0){
        $sql = "DELETE FROM  weball1 WHERE id_user = '$user' AND item_number = '$item_number' " ;        
        
        $conn->query($sql);
        //echo "100";

    }
    else{
       // echo $sql_stock;
  
  }
    

    


}


?>