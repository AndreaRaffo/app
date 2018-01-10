<?php
 
include 'connect.php';


$PdfUploadFolder = "PdfStorage/";
 
$ServerURL = 'https://webdev.dibris.unige.it/~S4078526/Tutors/'.$PdfUploadFolder;
 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 if(isset($_POST['name']) and isset($_POST['username']) and isset($_POST['subject']) and isset($_POST['year']) and isset($_POST['price']) and isset($_FILES['pdf']['name'])){


 $PdfName = $_POST['name'];
 $username = $_POST['username'];
 $subject = $_POST['subject'];
 $year = $_POST['year'];
 $price = $_POST['price'];
 
 $PdfInfo = pathinfo($_FILES['pdf']['name']);
	 
 
 $PdfFileExtension = $PdfInfo['extension'];
 
 $PdfFileURL = $ServerURL . GenerateFileNameUsingID() . '.' . $PdfFileExtension;
 
 $PdfFileFinalPath = '../'.$PdfUploadFolder . GenerateFileNameUsingID() . '.'. $PdfFileExtension;

 
 try{
 
 move_uploaded_file($_FILES['pdf']['tmp_name'],$PdfFileFinalPath);


 $statement = mysqli_prepare($conn, "INSERT INTO Notes (Username,Subject,Year,Path,Name,Price) VALUES (?,?,?,?,?,?)"); 
 mysqli_stmt_bind_param($statement, "ssssss", $username, $subject, $year, $PdfFileURL, $PdfName,$price);
 mysqli_stmt_execute($statement);


 }catch(Exception $e){} 
 mysqli_close($conn);
 
 }
}


function GenerateFileNameUsingID(){
	
 include 'connect.php';
 
 $GenerateFileSQL = "SELECT max(ID) as ID FROM Notes";
 $result = mysqli_query($conn,$GenerateFileSQL);
 $Holder = mysqli_fetch_array($result);

 
 if($Holder['ID']==null)
 {
 return 1;
 }
 else
 {
 return ++$Holder['ID'];
 }
	
	mysqli_close($conn);
}

?>