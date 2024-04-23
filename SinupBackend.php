<?php 
require_once '../../vendor/autoload.php';
require "dbconnection.php";
header('Access-Control-Allow-Origin: *');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 $result2 = array();
     try
     {
     	 $userID=0;
		 $userID=$_POST["userid"];

	     $password=$_POST["pwd"]; 

	     $hashp=bin2hex($password);
	     $conn=DB_connection();
	     $balance=0;
	     $query="insert ignore into userinfo (userID,password) values ({$userID},'{$hashp}')";
	     $result=$conn->query($query);
	     try{
			$client = new MongoDB\Client("mongodb://localhost:27017");
			$database = $client->test;
			$collection = $database->collection1;
			$insertOneResult = $collection->insertOne(array(
				'username' => $userID,
				'password' => $hashp,
			
			));
			// printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
			// var_dump($insertOneResult->getInsertedId());
		}
		catch(Exception $e)
		{
			// echo $e->getMessage();
		}
	     if($result===true)
	     {
	     	$query11="insert ignore into fundsdetail (userID,balance) values ({$userID},{$balance})";
	        $result11=$conn->query($query11);
	     
	     	// echo $last_id;
	     	
		     	$result2["status"] = "success";
	     	
	     }
	     else
	     {
	     	$result2["status"] = "fail";
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