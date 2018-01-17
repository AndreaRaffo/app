<?php
    
	include 'connect.php';
	$username = $_POST['Username'];
	$id = $_POST['ID'];

	$sql = "SELECT * FROM ActiveUsers WHERE Username = '$username' AND ID = '$id'";
    $response = array();
	$response["subscribed"] = false; 
 
  	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	if($count == 1){
		$response["subscribed"] = true;
	}

    echo json_encode($response);
?>