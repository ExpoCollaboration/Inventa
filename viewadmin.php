<?php
include "./dbconn.php";
$id = $_GET['id'];
// Start the session
session_start();

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
        <title>Account Management | View Admin</title>
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
                    <?php
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM `admin` WHERE id = $id LIMIT 1";

                        $result = mysqli_query($connect, $sql);
                        $row = mysqli_fetch_assoc($result);
                    ?>  
                    <div class="container-fluid">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./admin.php">Account Management</a></li>
                            <li class="breadcrumb-item"><a href="./admin.php">Admin Table</a></li>
                            <li class="breadcrumb-item active">View Admin</li>
                        </ol>
                        <form action="" method="post">
                            <div class="">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                    <div class="position-relative">
                                        <img id="previewImage" src="assets/uploads/<?php echo $row['adminImage'] ?>" alt="Admin Image" width="150px" height="150px" class="rounded-circle">
                                        <label for="userImageInput" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; cursor: pointer;"></label>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <div class="form-label">FullName:</div>
                                    <input type="text" class="form-control" name="adminName" value="<?php echo $row['name'] ?>" readonly>
                                </div>

                                <div class="mb-2">
                                    <div class="form-label">Email:</div>
                                    <input type="email" class="form-control" name="email" value="<?php echo $row['adminEmail'] ?>" readonly>
                                </div>

                                <div class="mb-2">
                                    <div class="form-label">Username:</div>
                                    <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" readonly>
                                </div>

                                <div class="mb-2">
                                    <div class="form-label">Password:</div>
                                    <input type="text" class="form-control" name="password" value="<?php echo $row['password'] ?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <div class="form-label">Role:</div>
                                    <input type="text" class="form-control" name="role" value="admin" value="<?php echo $row['role'] ?>" readonly>
                                </div>
                            </div>
                        </form>
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