
<?php
include 'connect.php';

$GenerateFileSQL = "SELECT max(ID) as ID FROM Notes ";
$result = mysqli_query($conn,$GenerateFileSQL);
$Holder = mysqli_fetch_array($result);

$myfile = fopen("debug.txt", "w") or die("Unable to open file!");
$txt = $Holder['ID']."LUL";
fwrite($myfile, $txt);
fclose($myfile);

 mysqli_close($conn);
?>