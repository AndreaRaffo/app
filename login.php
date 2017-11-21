<?php
include 'connect.php';

$username = $_POST["Username"];
$password = $_POST["Password"];

$statement = msqli_prepare($conn,"SELECT * FROM Users WHERE Username = ? AND Password = ?");

msqli_stmt_bind_param($statement,"ss",$username,$password);
msqli_stmt_execute($statement);

msqli_stmt_store_result($statement);
msqli_stmt_bind_result($statement,$name,$surname,$userID,$username,$balance,$level,$email,$password);

$response = array();
$response["success"] = false;

while(msqli_stmt_fetch($statement)){
	$response["success"] = true;
	$response["name"] = $name;
	$response["surname"] = $surname;
	$response["userID"] = $userID;
	$response["username"] = $username;
	$response["balance"] = $balance;
	$response["level"] = $level;
	$response["email"] = $email;
	$response["passwordHash"] = $password;

}

echo json_encode($response);

?>