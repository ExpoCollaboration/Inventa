<?php
// Start the session
include "./dbconnsub.php";
session_start();

if ($_SESSION["role"] !== "cashier" && $_SESSION["role"] !== "manager") {
    header("location: assets/error/unauthorized.php");
    exit();
}

$role = $_SESSION["role"];
$username = $_SESSION["username"];

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Control Panel">
        <meta name="author" content="Argie Delgado">
        <title>TPS | View Customer</title>
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
                            <li class="breadcrumb-item"><a href="./tps.php"> Customer Tables</a></li>
                            <li class="breadcrumb-item active">View Customer</li>
                        </ol>
                        <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `customer` WHERE id = $id LIMIT 1";

                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <div>
                            <form action="" method="post">
                                    <div>
                                        <button type="button" onclick="generateReceipt()" class="btn btn-success mb-2" style="font-size: 20px;">
                                            <i class="fa-solid fa-print" style="color: #fff;"></i>
                                        </button>
                                        <button type="button" onclick="uploads()" class="btn btn-info mb-2" style="font-size: 20px;">
                                            <i class="fa-solid fa-upload" style="color: #fff;"></i>
                                        </button>
                                        <button type="button" onclick="openModal()" class="btn btn-warning mb-2" style="font-size: 20px;">
                                            <i class="fa-solid fa-envelope" style="color: #fff;"></i>
                                        </button>
                                    </div>
                                        <div class="mb-2">
                                            <div class="form-label">Name:</div>
                                            <input id="customerName" type="text" class="form-control" name="customerName" value="<?php echo $row['customerName'] ?>" readonly>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-2" style="display: none;">
                                                <div class="form-label">Price:</div>
                                                <input id="productPrice" type="number" class="form-control" value="<?php echo $row['productPrice']; ?>" name="productPrice" required readonly>
                                                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                                <script>
                                                    function updatePrice() {
                                                        var selectedProductName = $("#productName").val();

                                                            $.ajax({
                                                            type: 'POST',
                                                            url: './get_price.php',
                                                            data: { productName: selectedProductName },
                                                            success: function (response) {
                                                                $("#productPrice").val(response);
                                                            }
                                                        });
                                                    }

                                                    $(document).ready(function () {
                                                        updatePrice();

                                                        $("#productName").change(function () {
                                                            updatePrice();
                                                        });
                                                    });
                                                </script>
                                            </div>
                                            
                                            <div class="mb-3 col-7">
                                                <label for="spinnerType" class="form-label">Item Order:</label>
                                                <select class="form-control" name="customerSold" id="productName" required readonly disabled>
                                                    <?php
                                                    $productName = getproductNameFromDB();

                                                    foreach ($productName as $type) {
                                                        $selected = ($type == $row['customerSold']) ? "selected" : "";
                                                        echo "<option value='" . $type . "' $selected>" . $type . "</option>";
                                                    }

                                                    function getproductNameFromDB()
                                                    {
                                                        include "./dbconnsub.php";

                                                        $sql = "SELECT productName FROM `product`";

                                                        $result = mysqli_query($connect, $sql);

                                                        $productName = array();

                                                        if ($result->num_rows > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $productName[] = $row['productName'];
                                                            }
                                                        }

                                                        return $productName;
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="mb-3 col-2">
                                                <div class="form-label">Quantity:</div>
                                                <input id="quantity" type="number" class="form-control" value="<?php echo $row['quantityperUnit'] ?>" name="quantityperUnit" readonly>
                                            </div>
                                            <div class="mb-3 col-3">
                                                <div class="form-label">Total Price:</div>
                                                <input id="totalprice" type="number" class="form-control" value="<?php echo $row['totalPrice'] ?>" name="totalPrice" readonly>
                                            </div>
                                            <div class="mb-3 col">
                                                <div class="form-label">Transaction No:</div>
                                                <input type="text" class="form-control" name="transactionNo" id="transactionNo" value="<?php echo $row['transactionNo'] ?>" readonly>
                                            </div>
                                            <div class="mb-3 col">
                                                <div class="form-label">Payment:</div>
                                                <input id="payment" type="number" class="form-control" name="customerPayment" value="<?php echo $row['customerPayment'] ?>" readonly>
                                            </div>

                                            <div class="mb-3 col">
                                                <div class="form-label">Change:</div>
                                                <input id="change" type="number" class="form-control" name="change" value="<?php echo $row['customerChange'] ?>" readonly>
                                            </div>

                                            <div class="mb-3 col">
                                                <div class="form-label">Payment Method:</div>
                                                <input type="text" class="form-control" name="paymentMethod" value="<?php echo $row['paymentMethod'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-label">Date:</div>
                                            <?php $formattedDate = date('Y-m-d\TH:i', strtotime($row['customerDate'])); ?>
                                            <input type="datetime-local" class="form-control" name="customerDate" id="customerDate" value="<?php echo $formattedDate; ?>" readonly>
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

        <!-- Generate Receipt -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
        <script src="assets/js/generateReceipt.js"></script>
    </body>
</html>