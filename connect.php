<?php
$servername = "localhost";
$username = "S4078526";
$password = "boilingtemple";
$dbname = "S4078526";


$conn = mysqli_connect($servername, $username, $password,$dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>