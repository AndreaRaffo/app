<?php
    require("password.php");
	include 'connect.php';
    
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    
    $statement = mysqli_prepare($conn, "SELECT Name,Surname,Email,Password FROM Users WHERE Username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $myName,$mySurname,$myEmail,$myPassword);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        if (password_verify($password, $myPassword)) {
            $response["success"] = true;
	    	$response["username"] = $username;
			$response["name"] = $myName;
			$response["surname"] = $mySurname;
			$response["email"] = $myEmail;
			
        }
    }
    echo json_encode($response);
?>