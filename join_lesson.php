<?php
    
	include 'connect.php';
    
	$username = $_POST["Username"];
	$id = $_POST["ID"];

	$response = array();
    $response["success"] = false; 
	$response["duplicate"] = false;
	$response["identity"] = false;

	$sql = "SELECT Max,Current,Username FROM Tutoring WHERE ID = '$id'";
    $result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$usernameTutor = $row["Username"];
	
	if($username != $usernameTutor){
	if($row["Current"]<$row["Max"]){
		$sql1 = "SELECT Username,ID FROM ActiveUsers WHERE Username = '$username' AND ID = '$id'";
		$result1 = mysqli_query($conn,$sql1);
		$count = mysqli_num_rows($result1);
		if($count == 0){
			$sql2 = "INSERT INTO ActiveUsers (Username,ID) VALUES ('$username','$id')";
			mysqli_query($conn,$sql2);
			
			$sql3 = "UPDATE Tutoring SET Current = Current + 1 WHERE ID = '$id'";
			mysqli_query($conn,$sql3);
			
			$response["success"] = true;
		}else{
			$response["duplicate"] = true;
		}
	}
	}else{
		$response["identity"] = true;
	}

    echo json_encode($response);
?>