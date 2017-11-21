<?php
include 'connect.php';

$username = $_POST["Username"];
$email = $_POST["Email"];
$password = $_POST["Password"];

$statement = mysqli_prepare($conn,"INSERT INTO Users (Username,Email,Password) VALUES (?,?,?)");

mysqli_stmt_bind_param($statement,"sss",$username,$email,$password);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);




?>