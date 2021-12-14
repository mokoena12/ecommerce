<?php
 
 
  $servername = "localhost";
  $password = "";
  $username = "root";
  $DBname = "ecommerce";
  
  
  $conn1 = new mysqli($servername,$username,$password,$DBname);
  
  //Check connection
  
  
  if($conn1->connect_error)
      {
          die("connection failed:");
      }
      
      $target_dir= "uploads/"; //specifies the directory where the file is going to be placed
      
	
//function to find price of item in the database
    function findPrice($item_number,$conn1){
        $sql = "SELECT item_price FROM stock WHERE item_number = '$item_number' ;";
      $selected_price = $conn1->query($sql);
      if($selected_price->num_rows >0){

      while($row = $selected_price->fetch_assoc()){

        $results = $row["item_price"];
      }
    }
    else{

        echo "No_p";
    }

    return $results;
    }

   

    
    //unction to find item_description
    function findname($item_number,$conn1){
        $sql = "SELECT item_description FROM stock WHERE item_number = '$item_number' ;";
      $selected_price = $conn1->query($sql);
      if($selected_price->num_rows >0){
      while($row = $selected_price->fetch_assoc()){

        $results = $row["item_description"];
      }
    }
    else{

        echo "No item content";
    }
    return $results;
    }

   
    ?>