<?php
// Start the session
include "./dbconnsub.php";
$id = $_GET['id'];

session_start();

if ($_SESSION["role"] !== "cashier" && $_SESSION["role"] !== "manager") {
    header("location: assets/error/unauthorized.php");
    exit();
}

$role = $_SESSION["role"];
$username = $_SESSION["username"];

if(isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productOutStock = isset($_POST['productOutStock']) ? 1 : 0;
    $date = date('Y-m-d h:i A', strtotime($_POST['productDate']));


    $sql = "UPDATE `product` SET `productName`='$productName',`productPrice`='$productPrice',`productOutStock`='$productOutStock', `productDate`='$date' WHERE id = $id";

    $result = mysqli_query($connect , $sql);
    if($result) {
        header("Location: ./product.php");
    } else {
        echo "Failed to connect into database";
    }
} 
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Control Panel">
        <meta name="author" content="Argie Delgado">
        <title>Stock Control System | Edit Product</title>
        <!-- Awesome Fonts -->
        <script src="https://kit.fontawesome.com/20fbad04b0.js" crossorigin="anonymous"></script>
        <link href="assets/css/dashboard.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php
                include "assets/include/sidebarEmployees.php";
            ?>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <?php
                        include "assets/include/topbar.php";
                    ?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./dashboardEmployees.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="./product.php">Tables</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                        <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `product` WHERE id = $id LIMIT 1";

                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <div>
                            <form action="" method="post">
                                <div class="">
                                    <h2>Edit Product Information</h2>
                                    <p class="text-muted">Complete the form below to update a product</p>
                                    <div class="mb-2">
                                    <div class="form-label">Name:</div>
                                        <input type="text" class="form-control" name="productName" value="<?php echo $row['productName'] ?>">
                                    </div>
                    
                                    <div class="mb-3">
                                        <div class="form-label">Price:</div>
                                        <input type="number" class="form-control" name="productPrice" value="<?php echo $row['productPrice'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="productOutStock" id="productOutStock"
                                                <?php echo ($row['productOutStock'] == 1) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="productOutStock">Out of Stock</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-label">Date:</div>
                                        <input type="datetime-local" class="form-control" name="productDate" id="productDate" required readonly>
                                        <script>
                                            function updateDateTime() {
                                            var now = new Date();
                                                    
                                            var localOffset = now.getTimezoneOffset() * 60000;
                                            var localDateTime = new Date(now - localOffset);
                                                    
                                            var formattedDateTime = localDateTime.toISOString().slice(0, 16);
                                                    
                                            document.getElementById("productDate").value = formattedDateTime;
                                        }

                                        updateDateTime();

                                        setInterval(updateDateTime, 1000);

                                        </script>
                                    </div>

                                    <div class="mb-3">
                                        <button type="reset" class="btn btn-danger" name="Reset">Reset</button>
                                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End of Page Content -->
                </div>
                <!-- End of Main Content -->
                <?php
                    include "assets/include/footer.php";
                ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <?php
            include "assets/include/logout.php";
        ?>
        <!-- Bootstrap core JavaScript-->
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="assets/js/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="assets/js/sidebarfuntion.js"></script>
    </body>
</html> 