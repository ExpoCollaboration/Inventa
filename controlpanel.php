<?php
// Start the session
session_start();

if (!isset($_SESSION["user_id"])) {
    if ($_SERVER["REQUEST_URI"] !== "./controlpanel.php") {
        header("Location: ./controlpanel.php");
        exit();
    } else {
        echo "Redirect loop detected. Check your code.";
        exit();
    }
}

if ($_SESSION["role"] !== "admin") {
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
        <title>Control Panel | Dashboards</title>
        <!-- Awesome Fonts -->
        <script src="https://kit.fontawesome.com/20fbad04b0.js" crossorigin="anonymous"></script>
        <link href="assets/css/dashboard.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php
                include "assets/include/sidebar.php";
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

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Welcome <?php echo $role; ?></h1>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>

                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <?php
                                                include "./dbconn.php";

                                                $result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM `admin`");

                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                }
                                            ?>
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Administrator</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-gear fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <?php
                                                include "./dbconn.php";

                                                $result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM `employees`");

                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                                }
                                            ?>
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Employees</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Content Wrapper -->
                    </div>
                    <!-- End of Page Wrapper -->
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