<?php 
    require "dbconnection.php";
    $data5=array();
    // $data5["status"]=400;
    $allrows=array();
     if(isset($_COOKIE["ID"]))
     {

        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
         $userID=$_COOKIE["ID"];
         // echo $userID;
         // strrev
         
         $conn=DB_connection();
         $query="select * from watchlist where userID={$userID} ";
         $result=$conn->query($query);
         if($result->num_rows>0)
         {  
            
         while($output=$result->fetch_assoc())
         {
            $allrows[]=$output;
         }
             

            
            
            
            // echo json_encode($data5);
            // echo json_encode($allrows);
             
         }
         else
            {  $data5["res"]="user id not founded";}

        $data5["alldatavalue"]=$allrows;
        $data5["usercookieid"]=$userID;
    }
   
     }
     else
      {
          $data5["islogin"] = "fail";
      }  
      echo json_encode($data5);
 ?>
