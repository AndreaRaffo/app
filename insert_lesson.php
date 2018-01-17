<?php
    
	include 'connect.php';
    
	$username = $_POST["Username"];
	$subject = $_POST["Subject"];
    $date = $_POST["Date"];
	$location = $_POST["Location"];
    $price = $_POST["Price"];
	$max = $_POST["Max"];


	$myDate = str_replace("/","-",$date);
	$myDateTime = DateTime::createFromFormat('d-m-Y', $myDate);
	$newDateString = $myDateTime->format('Y-m-d');


	$response = array();
    $response["success"] = false; 

	$statement = mysqli_prepare($conn, "INSERT INTO Tutoring (Date, Subject, Username, Max, Price, Location) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($statement, "ssssss", $newDateString, $subject, $username, $max, $price, $location);
        if(mysqli_stmt_execute($statement)){
			$response["success"] = true; 
		};
        mysqli_stmt_close($statement); 

    echo json_encode($response);
?>