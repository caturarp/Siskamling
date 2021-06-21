<?php
include ('function/config.php');
// include ('function/proseslogin.php');
session_start();
if (!isset($_SESSION['status']))
 {
	header("location: function/proseslogin.php");
	exit;
}
$npm =$_SESSION['npm'];
$day = date("l");
if ($day = "Monday"){
    $hari = "SENIN";
}
elseif ($day = "Tuesday") {
    $hari = "SELASA";
}
elseif ($day = "Wednesday") {
    $hari = "RABU";
}
elseif ($day = "Thursday") {
    $hari = "KAMIS";
}
elseif ($day = "Friday") {
    $hari = "JUMAT";
}
elseif ($day = "Saturday") {
    $hari = "Sabtu";
}
else {
    $hari = "Minggu";
};
var_dump($day);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Jadwal</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "function/config.php";
                    
                    // Attempt select query execution
                    // $sql = "SELECT classes.waktu_class, classes.nama_class, classes.presensi, lecturers.nama_lecturer FROM classes INNER JOIN lecturers ON classes.id_lecturer=lecturers.id_lecturer";
                    $sql = "SELECT classes.id_class, classes.waktu_class, classes.nama_class, classes.presensi, lecturers.nama_lecturer 
                    FROM classes,courses,students,lecturers 
                    WHERE courses.id_class=classes.id_class 
                    AND classes.id_lecturer=lecturers.id_lecturer AND students.npm=courses.npm AND courses.npm = '$npm' AND classes.waktu_class='$hari'";
                    echo var_dump($npm);
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        // echo "<th>#</th>";
                                        echo "<th>Waktu</th>";
                                        echo "<th>Mata Kuliah</th>";
                                        echo "<th>Kode Mata kuliah Kuliah</th>";
                                        echo "<th>Dosen Pengampu</th>";
                                        echo "<th>Presensi</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['waktu_class'] . "</td>";
                                        echo "<td>" . $row['nama_class'] . "</td>";
                                        echo "<td>" . $row['id_class'] . "</td>";
                                        echo "<td>" . $row['nama_lecturer'] . "</td>";
                                        echo "<td>" . $row['presensi'] . "</td>";
                                        echo "<td>";
                                            // echo '<a href="read.php?id='. $row['id_lecturer'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="function/update.php?id_class='. $row['id_class'] .'" class="mr-3" title="Hadiri Kelas" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            // echo '<a href="delete.php?id='. $row['id_lecturer'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                // $presensi=$row['presensi'];
                                $id_class=$row['id_class'];
                                }
                                // echo var_dump ($presensi);
                                echo var_dump ($id_class);
                                // $_SESSION['presensi'] = $presensi;
                                $_SESSION['id_class'] = $id_class;

                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } 
                        else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                        // while ($row = $result->fetch_assoc()){
                        //     // $id_pendaftar = $row['id_pendaftar'];
                        //     $presensi = $row['presensi'];
                        //     $id_class = $row['id_class'];
                        //     // $semester = $row['semester'];
                        //     // $sks = $row['sks'];
                        //     // $tahun_masuk = $row['tahun_masuk'];
                        //     // $npm = $row['npm'];
                        // }
                        // $_SESSION['presensi'] = $presensi;
                        // $_SESSION['id_class'] = $id_class;
                    } 
                    else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // $_SESSION['classes.presensi'] = $presensi;
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>