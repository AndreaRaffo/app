<?php
    
	include 'connect.php';

	$username = $_POST['Username'];
	$paidUser = $_POST['PaidUser'];
	$balance = $_POST['Balance'];
	$price = $_POST['Price'];


	$sql = "UPDATE Users SET Balance = '$balance' WHERE Username = '$username'";
	$sql2 = "UPDATE Users SET Balance = Balance + '$price' WHERE Username = '$paidUser'";

   

	$response = array();
	$response["balance"] = $balance;
	$response["success"] = false; 

  	if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql2)){
		$response["success"] = true; 
	}

    echo json_encode($response);
?>	