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
         $conn=DB_connection();
         $query="select shareID,currQTY,buyprice from holdingdetail where userID={$userID} and currQTY>0 ";
         $result=$conn->query($query);
         if($result->num_rows>0)
         {    
            while($output=$result->fetch_assoc())
            {
                $allrows[]=$output;
            }
         }
         else
            {  
                $data5["res"]="false";
            }

        $data5["alldatavalue"]=$allrows;
        
    }
   
     }
     else
      {
          $data5["islogin"] = "fail";
      }  
      echo json_encode($data5);
 ?>
