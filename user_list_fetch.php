<?php
    
	include 'connect.php';
    
	$id = $_POST["ID"];

    $response = array();

	$response[0]["success"] = false;
	$response[0]["noUsers"] = false;

    $sql = "SELECT Username FROM ActiveUsers WHERE ID = '$id'";

    if($result = mysqli_query($conn,$sql)){
		$response[0]["success"] = true;

	$count = mysqli_num_rows($result);

	if($count > 0){
	$x=0;
    while($row = mysqli_fetch_assoc($result)){
		
		$user = $row["Username"];
		$sql2 = "SELECT Name, Surname FROM Users WHERE Username = '$user'";
		$result2 = mysqli_query($conn,$sql2);
		$row2 = mysqli_fetch_assoc($result2);
		
        $response[$x]["user"] = $user;
		$response[$x]["name"] = $row2["Name"];
		$response[$x]["surname"] = $row2["Surname"];
        $x++;
    }
	}else{
		$response[0]["noUsers"] = true;
	}
	}

    echo json_encode($response);
?>