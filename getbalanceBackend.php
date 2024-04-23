<?php 
    require "dbconnection.php";
    $data5=array();
    // $data5["status"]=400;
   
     if(isset($_COOKIE["ID"]))
     {

        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
         $userID=$_COOKIE["ID"];
         
         
         $conn=DB_connection();
         $query="select balance from fundsdetail where userId={$userID} ";
         $result=$conn->query($query);
         if($result->num_rows>0)
         {  
                   $output=$result->fetch_assoc();
                    $balance=$output["balance"];
                    $data5["avl_bal"]=$balance;
         
         }
         else
            {  $data5["res"]="user id not founded";}

       
        $data5["usercookieid"]=$userID;
    }
   
     }
     else
      {
          $data5["islogin"] = "fail";
      }  
      echo json_encode($data5);
 ?>
