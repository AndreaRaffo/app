<?php
   	include 'connect.php';
    
    $username =  $_POST["Username"];
	$name =  $_POST["Name"];
	$surname =  $_POST["Surname"];
	$email =  $_POST["Email"];
	//$password =  $_POST["Password"];
	$response = array();
	$response["success"] = false;
	
	//$passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $statement = mysqli_prepare($conn, "UPDATE Users SET Name = ?, Surname = ?, Email = ? WHERE Username = ?"); 
    mysqli_stmt_bind_param($statement, "ssss", $name,$surname,$email,$username);

    if(mysqli_stmt_execute($statement)){
		$response["success"] = true;
	}

    mysqli_stmt_store_result($statement);
    mysqli_stmt_close($statement); 

    echo json_encode($response);
?>