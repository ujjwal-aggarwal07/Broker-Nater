<?php 
    require "dbconnection.php";
    $data5=array();
    if(isset($_COOKIE["ID"]))
     {

        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
          
          // $data5["alldatavalue"]=$allrows;
          setcookie("ID","",time() - 3600,"/");

           
            $data5["status"] = "false";
           
              
        }
   
     }
     else
      {
          $data5["status"] = "false";
          // echo("1");
      }  
      echo json_encode($data5);
    
 ?>
