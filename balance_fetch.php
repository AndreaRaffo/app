<?php
    
	include 'connect.php';
	$username = $_POST['Username'];
	$sql = "SELECT Balance FROM Users WHERE Username = '$username'";
    $result = mysqli_query($conn,$sql);
    $response = array();
	$response["success"] = false; 
 
  	if($response= mysqli_fetch_assoc($result)){
		$response["success"] = true; 
	}

    echo json_encode($response);
?>