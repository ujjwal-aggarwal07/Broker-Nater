<?php 
require "dbconnection.php";
header('Access-Control-Allow-Origin: *');
// if($_SERVER["REQUEST_METHOD"] == "POST")
// {
	 $result2 = array();
	 if(isset($_COOKIE["ID"]))
 {
 	
  try
     {
     	 
         $userID=$_COOKIE["ID"];
		 $fundVal=$_POST["funds"];
	     $conn=DB_connection();
	     //Update fundsdetail set funds = funds + valuetoadd where userid = userid;
	     mysqli_begin_transaction($conn);
	     $query22="select balance FROM fundsdetail WHERE userid=${userID}";
	     $result22=$conn->query($query22);
	             if($result22->num_rows > 0)
	             {
	             	$result2["status"] = "success";
	                $output=$result22->fetch_assoc();
	                $balance2=$output["balance"];
	               if($fundVal>$balance2)
	               {
	               	$result2["wrong_bal_input"] = "fail";
	               	echo json_encode($result2); 
	               	return;
	               }
	     	

		     	
		     	 $query="Update fundsdetail set balance = balance - ${fundVal} where userid = ${userID}";
	     $result=$conn->query($query);
	     if($result===true)
	     {
                  $query22="select balance FROM fundsdetail WHERE userid=${userID}";
	     $result22=$conn->query($query22);
	             if($result22->num_rows > 0)
	             {
	             	$result2["status"] = "success";
	                $output=$result22->fetch_assoc();
	                $balance=$output["balance"];


	     	$result2["status"] = "success";
                    // echo $balance;
                    $query33="insert  into fundstransaction (userID,description,amount,balance) values ({$userID},'FUND WITHDRAWN UPI',{$fundVal},{$balance})";
	                $result33=$conn->query($query33);
                     if($result33===true)
                     {
                     	$result2["status"] = "success";
                     	$result2["avail_bal"]=$balance;
                     }
                     else
                     {
                     	$result2["status"] = "fail";
                     }
}

                 }
                 else
	             {
	     	       $result2["status"] = "fail";
	     	      // echo "result is false2";
	     	      // echo( $conn->connect_error);

		         }
		     	
	     }
	     else
	     {
	     	$result2["status"] = "fail";
	     	// echo "result is false3";
		}
		 mysqli_commit($conn);
     }
     catch(Exception $e)
     {
     	$result2["status"] = "fail";
     	 mysqli_rollback($conn);
     	// echo $e->getMessage();
     }
	 echo json_encode($result2);     
 }
 else
 {    
	echo "no data found";


 	 
} 


      // }


 ?>