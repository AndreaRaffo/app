<?php
    
	include 'connect.php';
    
    
    $sql = "SELECT * FROM Tutoring";
    $result = mysqli_query($conn,$sql);
    $response = array();
	$count = mysqli_num_rows($result);

	if($count > 0){
	
	$x=0;
    
    while($row = mysqli_fetch_assoc($result)){
        $response[$x]["date"] = $row["Date"];
		$response[$x]["subject"] = $row["Subject"];
		$response[$x]["username"] = $row["Username"];
		$response[$x]["max"] = $row["Max"];
		$response[$x]["price"] = $row["Price"];
		$response[$x]["location"] = $row["Location"];
		$response[$x]["current"] = $row["Current"];
		$response[$x]["id"] = $row["ID"];
        $x++;
    }
		
	}
    echo json_encode($response);
?>