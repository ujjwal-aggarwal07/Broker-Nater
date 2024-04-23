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
		 $STOCKID=$_POST["stockaddid"];
	     $conn=DB_connection();
	     $query="insert ignore into watchlist (userID,stockID) values ({$userID},'{$STOCKID}')";
	     $result=$conn->query($query);
	     if($result===true)
	     {
	     	
		     	$result2["status"] = "success";
		     	
	     }
	     else
	     {
	     	$result2["status"] = "fail";
	     	// echo "result is false";
		}
     }
     catch(Exception $e)
     {
     	$result2["status"] = "fail";
     	// echo $e->getMessage();
     }
	 echo json_encode($result2);     
 }
 else
 {    
	echo "no data found";


 	 
} 


     


 ?>