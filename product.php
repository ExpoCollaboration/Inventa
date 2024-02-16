<?php
// Start the session
include "./dbconnsub.php";
session_start();

if ($_SESSION["role"] !== "manager") {
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


    $sql = "INSERT INTO `product`(`id`, `productName`, `productPrice`, `productOutStock`, productDate) 
    VALUES (NULL,'$productName','$productPrice','$productOutStock', '$date')";

    $result = mysqli_query($connect , $sql);
    if($result) {
        header("Location: assets/product.php");
        exit();
    } else {
        echo "Failed to add a product in the table";
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
        <title>Stock Control System | Product</title>
        <!-- Awesome Fonts -->
        <script src="https://kit.fontawesome.com/20fbad04b0.js" crossorigin="anonymous"></script>
        <link href="assets/css/dashboard.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/removeArrowSpin.css">
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
                                <li class="breadcrumb-item active">Product Table</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-body">
                                    You can add a product and make it visible in the table. 
                                    <button onclick="openModal()" type="button" style="float: right; color: white;" class="btn btn-info">+ Add Products</button>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    List of the products
                                </div>
                                <div class="card-body">
                                    <table id="datatablesSimple" class="table text-center table-striped table-bordered rounded">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Name</th>
                                                <th scope="col" class="text-center">Price</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Date Updated</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                include "./dbconnsub.php";
                                                $sql = "SELECT * FROM `product`";
                                                $result = mysqli_query($connect, $sql);
                            
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr class="<?php echo $row['productOutStock'] ? 'table-danger text-muted' : ''; ?>">
                                                            <td><?php echo $row['id'] ?></td>
                                                            <td><?php echo $row['productName'] ?></td>
                                                            <td><?php echo $row['productPrice'] ?></td>
                                                            <td><?php echo $row['productOutStock'] ? 'Out of Stock' : 'On Stock'; ?></td>
                                                            <td><?php echo $row['productDate'] ?></td>
                                                            <td>
                                                                <a href="./editProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary me-3" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="far fa-pen-to-square fs-5"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
        <!-- Modal View Insert-->
        <div id="modal" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="text-muted">Complete the form below to add a new Administrator<p>
                            <h5 class="modal-title">Add New Administrator</h5>
                            <button onclick="closeModal()" class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="container d-grid">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="">
                                    <div class="mb-2">
                                        <div class="form-label">Name:</div>
                                        <input type="text" class="form-control" name="productName" required>
                                    </div>
            
                                    <div class="mb-3">
                                        <div class="form-label">Price:</div>
                                        <input type="number" class="form-control" name="productPrice" required>
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
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="productOutStock" id="productOutStock">
                                            <label class="form-check-label" for="productOutStock">Out of Stock</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="reset" class="btn btn-danger" name="Reset">Reset</button>
                                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script>
            $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel',
                    {
                        extend: 'print',
                        title: 'Customers Products Reports - By Admin',
                        customize: function(win) {
                            // Customize the heading
                            var header = $(win.document.body).find('h1');
                            if (header.length === 0) {
                                header = $('<h1>').appendTo($(win.document.body));
                            }
                            header.css({
                                'font-size': '14pt',
                                'color': '#333',
                                'text-align': 'center',
                                'margin': '15pt'
                            }).text('Customers Products Reports');
                            $(win.document.body).find('table thead th').css({
                                'text-align': 'center'
                            });
                            // Customize the body
                            $(win.document.body).find('table thead th:last-child').remove();
                            $(win.document.body).find('table').find('td:last-child').remove();
                            $(win.document.body)
                                .css('font-size', '12pt')
                                .find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            });
        });
        </script>
        <!-- Bootstrap core JavaScript -->
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript -->
        <script src="assets/js/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages -->
        <script src="assets/js/sidebarfuntion.js"></script>
        <script src="assets/js/modalfunction.js"></script>

        <!-- DataTables CSS -->
        <link href="assets/css/datatables.min.css" rel="stylesheet">

        <!-- DataTables JavaScript and Dependencies -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>
    </body>
</html> 