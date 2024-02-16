<?php
include "./dbconnsub.php";

if (isset($_POST['productName'])) {
    $productName = mysqli_real_escape_string($connect, $_POST['productName']);

    $sql = "SELECT productPrice FROM `product` WHERE productName = '$productName' LIMIT 1";
    $result = mysqli_query($connect, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['productPrice'];
    } else {
        echo "0";
    }
} else {
    echo "0";
}
?>