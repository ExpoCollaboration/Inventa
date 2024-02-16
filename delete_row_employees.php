<?php 
include "./dbconn.php";
$id = $_GET['id'];

$sqlDelete = "DELETE FROM employees WHERE id = $id";

$resultDelete = mysqli_query($connect, $sqlDelete);

if ($resultDelete) {
    echo "Successfully deleted a row in the database";
    header("Location: employees.php");
} else {
    echo "Failed to delete a row in the database";
}
?>