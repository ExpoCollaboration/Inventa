<?php
include "dbconn.php";

if (isset($_POST['roleName'])) {
    $productName = mysqli_real_escape_string($connect, $_POST['']);

    $sql = "SELECT roleName FROM `product`";
    $result = mysqli_query($connect, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['roleName'];
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>