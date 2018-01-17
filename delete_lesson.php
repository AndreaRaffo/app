<?php
    
	include 'connect.php';

	$id = $_POST["ID"];

	$sql = "SELECT Username FROM ActiveUsers WHERE ID = '$id'";
	$result = mysqli_query($conn,$sql);
	$x=0;

	$response = array();
	$response["success"] = false; 
	$response["noCredit"] = false; 
	
	$sql1 = "SELECT Price FROM Tutoring WHERE ID = '$id'";
   	$result1 = mysqli_query($conn,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	$price = $row1["Price"];

	while($row = mysqli_fetch_assoc($result)){
		$user = $row["Username"];
		$x++;
		
		$sql2 = "UPDATE Users SET Balance = Balance + '$price' WHERE Username = '$user'";
		mysqli_query($conn,$sql2);
    	}

	$sql3 = "SELECT Username FROM Tutoring WHERE ID = '$id'";
	$result3 = mysqli_fetch_assoc(mysqli_query($conn,$sql3));
	$owner = $result3["Username"];
    
	
	$newPrice = $price * $x;
	
	$sql4 = "SELECT Balance FROM Users WHERE Username = '$owner'";
	$result4 = mysqli_fetch_assoc(mysqli_query($conn,$sql4));
	$balance = $result4["Balance"];

	if($balance >= $newPrice){

	$sql5 = "UPDATE Users SET Balance = Balance - '$newPrice' WHERE Username = '$owner'";
	mysqli_query($conn,$sql5);

	$sql6 = "DELETE FROM ActiveUsers WHERE ID = '$id'";
	$sql7 = "DELETE FROM Tutoring WHERE ID = '$id'";

  	if(mysqli_query($conn,$sql6) && mysqli_query($conn,$sql7)){
		$response["success"] = true; 
	}
	}else{
	$response["noCredit"] = true;
	}

    echo json_encode($response);
?>	