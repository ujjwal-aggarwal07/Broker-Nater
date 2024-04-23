<?php 
    require "dbconnection.php";
    $data2=array();
    $data2["status"]=400;

     if($_SERVER["REQUEST_METHOD"] == "POST")
      {
         $userID=$_POST["userid"];
	     $password=$_POST["pwd"];
	     // strrev
	     
	     $conn=DB_connection();
         $query="select * from userinfo where userID={$userID} ";
         $result=$conn->query($query);
         if($result->num_rows>0)
         {  
         	$output=$result->fetch_assoc();
         	$mob=$output["userID"];
         	$pas=$output["password"];
         	$realpsw=hex2bin($pas);
             if($password!=$realpsw)
             {
                $data2["res"]="password is wrong";
             }
             else 
             {
                $data2["status"]=200;
                $data2["res"]= "login succesfully";
                $xpiry = time() + (86400 * 60);
                setcookie("ID",$mob,$xpiry,"/");
                //header ("Location: bookings.php");
             }
         }
         else
         	$data2["res"]="user id not founded";
        	echo json_encode($data2);
        }

 ?>
