<?php
    require("password.php");
   	include 'connect.php';
    

    $username = $_POST["Username"];
	$email = $_POST["Email"];
    $password = $_POST["Password"];
	$passwordConfirm = $_POST["PasswordConfirm"];

     function registerUser() {
        global $conn, $username,$email, $password;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $statement = mysqli_prepare($conn, "INSERT INTO Users (Username, Email, Password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($statement, "sss", $username, $email, $passwordHash);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);     
    }
    function usernameAvailable() {
        global $conn, $username;
        $statement = mysqli_prepare($conn, "SELECT * FROM Users WHERE Username = ?"); 
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            return true; 
        }else {
            return false; 
        }
    }
    $response = array();
    $response["success"] = false;  
    if (usernameAvailable() && $password == $passwordConfirm){
        registerUser();
        $response["success"] = true;  
    }
    
    echo json_encode($response);
?>