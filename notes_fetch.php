<?php
    
	include 'connect.php';
    
    $sql = "SELECT * FROM Notes";
    $result = mysqli_query($conn,$sql);
    $response = array();
	$count = mysqli_num_rows($result);

	if($count > 0){
	
	$x=0;
    
    while($row = mysqli_fetch_assoc($result)){
		$response[$x]["subject"] = $row["Subject"];
		$response[$x]["username"] = $row["Username"];
		$response[$x]["year"] = $row["Year"];
		$response[$x]["price"] = $row["Price"];
		$response[$x]["path"] = $row["Path"];
		$response[$x]["name"] = $row["Name"];
		

        $x++;
    }
		
	}
    echo json_encode($response);
?>