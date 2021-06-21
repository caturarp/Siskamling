<?php
include('config.php');
session_start();
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Getting data
$npm=$_SESSION['npm'];
$presensi =$_SESSION['presensi'];
$id_class =$_GET['id_class'];
echo var_dump($npm);
echo var_dump($presensi);
echo var_dump($id_class);
 // Attempt update query execution
$sql="UPDATE classes, students SET presensi= presensi + 1 WHERE classes.id_class='$id_class' AND students.npm ='$npm'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} 
else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
  
?>