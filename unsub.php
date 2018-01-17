<?php
    
	include 'connect.php';
    
	$username = $_POST["Username"];
	$id = $_POST["ID"];

	$response = array();
    $response["success"] = false; 

	$sql = "DELETE FROM ActiveUsers WHERE Username = '$username' AND ID = '$id'";
	$sql2 = "UPDATE Tutoring SET Current = Current - 1 WHERE ID = '$id'";

	if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql2)){
		$response["success"] = true;
	}

    echo json_encode($response);
?>