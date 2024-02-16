<?php 
include "./dbconn.php";
$id = $_GET['id'];

$sqlSelect = "SELECT adminImage FROM admin WHERE id = $id";
$resultSelect = mysqli_query($connect, $sqlSelect);
$rowSelect = mysqli_fetch_assoc($resultSelect);

$sqlDelete = "DELETE FROM admin WHERE id = $id";
$resultDelete = mysqli_query($connect, $sqlDelete);

if ($resultDelete) {
    $filename = $rowSelect['adminImage'];
    if (!empty($filename) && file_exists("uploads/$filename")) {
        unlink("uploads/$filename");
    }

    header("Location: admin.php");
} else {
    echo "Failed to delete a row in the database";
}
?>