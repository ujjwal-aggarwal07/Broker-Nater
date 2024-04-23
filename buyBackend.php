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
		 $bprice=$_POST["b_price"];
		 $bqty=$_POST["b_qty"];
		 $bid=$_POST["b_id"];
		 $bidmessage=$bid." BUY ";
		 $bamount=$bprice*$bqty;
	     $conn=DB_connection();
	     //Update fundsdetail set funds = funds + valuetoadd where userid = userid;
	     $query="select balance FROM fundsdetail WHERE userid=${userID}";
	     $result=$conn->query($query);
	     if($result->num_rows > 0)
	     {
	     	$result2["status"] = "success";
            $output=$result->fetch_assoc();
	        $balance=$output["balance"];
	        if($balance>=$bamount)
	        {
                 mysqli_begin_transaction($conn);
                 $query22="select balance FROM fundsdetail WHERE userid=${userID}";
	             $result22=$conn->query($query22);
	               if($result22->num_rows == 0)
				    {
						$result2["status"] = "error";
						echo json_encode($result2);
						return;
			        }
			        $output=$result22->fetch_assoc();
	                $balance22=$output["balance"] - $bamount;
             	     
                 $query11="Update fundsdetail set balance = ${balance22} where userid = ${userID}";
	             $result11=$conn->query($query11);
	             if($result11===true)
	             {
		        	 $result2["status"] = "success";
                     $query33="insert  into fundstransaction (userID,description,amount,balance) values ({$userID},'{$bidmessage}',{$bamount},{$balance22})";
	                 $result33=$conn->query($query33);
                      if($result33===true)
                       {
                     	 $result2["status"] = "success";
                     	// $result2["avail_bal"]=$balance;
                     	 $query44="select currQTY,buyprice from holdingdetail where userID = ${userID} and shareID = '{$bid}'";
                     	 $result44=$conn->query($query44);
                         if($result44->num_rows > 0)
	                     {
	     				  	$result2["status"] = "success";
            			  	$output=$result44->fetch_assoc();
	        			  	$currentqty=$output["currQTY"];  
                          	$buyprice=$output["buyprice"];
                          	$total=(($buyprice*$currentqty)+($bprice*$bqty));
                          	$totalqty=$currentqty+$bqty;
                          	$newbuyprice=$total/$totalqty;
                          	$query55="update holdingdetail set currQTY={$totalqty},buyprice={$newbuyprice} where userID=${userID} and shareID = '{$bid}'";
                          	$result55=$conn->query($query55); 
                          	if($result55===true)
                          	{
                     	   		$result2["status"] = "success";
                     	   		$query66="insert into holdingtransaction(userID,shareID,type,qty,price) values({$userID},'{$bid}','BUY','{$bqty}','{$bprice}')";
                     	   		// echo  $query66;
                   				$result66=$conn->query($query66);
                           		if($result55===true)
                        		{
                             		$result2["status"] = "success";
                            	}
                     	  	}
                          }
                          else
                          {
                     	     $query77="insert into holdingdetail (userID,shareID,currQTY,buyprice) values ({$userID},'{$bid}',{$bqty},{$bprice})";
                     	     $result77=$conn->query($query77);
                             if($result77===true)
                             {
                             	$result2["status"] = "success";
                                $query88="insert into holdingtransaction(userID,shareID,type,qty,price) values({$userID},'{$bid}','BUY','{$bqty}','{$bprice}')";
                                // echo  $query88;
                           $result88=$conn->query($query88);
                           if($result88===true)
                            {
                             $result2["status"] = "success";
                            }


                             }

                          }
                       } 

                 }
                 else
	             {
	     	       $result2["status"] = "fail";
	     	      echo "result is false2";
           	      // echo( $conn->connect_error);
		         }
		     	
	     	}
	    	else
	        {
	        	$result2["status"] = "fail";
	        	$result2["outofbalance"]="true";
                  //out of balance
	        }
		 	mysqli_commit($conn);
	        } // my if end
	        else
	        {
	        	$result2["status"] = "fail";
	        	$result2["outofbalance"]="true";
                  //out of balance
	        }
	   }

       catch(Exception $e)
        {
     	$result2["status"] = "fail";
     	//echo"catch fail";
     	$result["error"] = $e->getMessage();
        }
	    echo json_encode($result2);     
 }  
 else
 {    
	echo "no data found";


 	 
} 


     


 ?>