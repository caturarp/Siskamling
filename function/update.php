<?php
include('config.php');
session_start();
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Getting data from session 
// getting data from url parameter
$npm=$_SESSION['npm'];
$presensi =$_SESSION['presensi'];
$id_class =$_GET['id_class'];
// echo var_dump($npm);
// echo var_dump($presensi);
// echo var_dump($id_class);
 // Attempt update query execution
$sql="UPDATE classes, students SET presensi= presensi + 1 WHERE classes.id_class='$id_class' AND students.npm ='$npm'";

if(mysqli_query($link, $sql)){
    echo "Berhasil mengisikan Presensi";
} 
else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap") rel="stylesheet">
    <title>Konfirmasi Presensi</title>
</head>
<body>
    <a class="btn btn-primary" href="../index.php">Pergi Kembali</a>
</body>
</html>