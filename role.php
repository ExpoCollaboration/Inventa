<?php
// Start the session
include "./dbconn.php";
session_start();

if ($_SESSION["role"] !== "admin") {
    header("location: assets/error/unauthorized.php");
    exit();
}

$role = $_SESSION["role"];
$username = $_SESSION["username"];

if(isset($_POST["submit"])) {
    $roleName = $_POST["roleName"];
    $description = $_POST["description"];

    $sql = "INSERT INTO `role`(`id`, `roleName`, `roleDescription`) VALUES (NULL,'$roleName','$description')";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "Successfully added the role";
        header("Location: ./role.php");
        exit();
    } else {
        echo "Failed to add role information: " . mysqli_error($connect);
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
        <title>Control Panel | Create Role</title>
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
                    <div class="card mb-4">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="./admin.php">Account Management</a></li>
                                <li class="breadcrumb-item"><a href="./createRole.php">Role Base Access Control</a></li>
                                <li class="breadcrumb-item active">Role</li>
                            </ol>
                            <div class="card-body">
                                You can add a role and make it visible in the table. 
                                <button onclick="openModal()" type="button" style="float: right; color: white;" class="btn btn-info">+ Add Role</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatablesSimple" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Role Name</th>
                                                <th scope="col" class="text-center">Role Permission</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include "./dbconn.php";
                                                $sql = "SELECT * FROM `role`";
                                                $result = mysqli_query($connect, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <?php
                                                            $roleName = $row['roleName'];

                                                            $displayRoleName = ($roleName === 'manager') ? 'Manager' : 
                                                            (($roleName === 'cashier') ? 'Cashier' : 
                                                            (($roleName === 'stockcontroller') ? 'Stock Controller' : $roleName));
                                                        ?>
                                                        <td><?php echo $displayRoleName; ?></td>
                                                        <?php
                                                            $roleDescription = $row['roleDescription'];

                                                            $displayroleDescription = ($roleDescription === 'SS') ? 'All Sub System' : 
                                                            (($roleDescription === 'POS') ? 'Point of Sales' : 
                                                            (($roleDescription === 'SC') ? 'Stock Control' : $roleDescription));
                                            
                                                        ?>
                                                        <td><?php echo $displayroleDescription; ?></td>
                                                        <td>
                                                            <div class="d-flex" style="gap: 10px; justify-content: center;">
                                                                <a href="./delete_row_role.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                    <i class="far fa-trash-can fs-5"></i>
                                                                </a>
                                                                <!-- Initialize tooltips -->
                                                                <script>
                                                                    $(function () {
                                                                        $('[data-toggle="tooltip"]').tooltip();
                                                                    });
                                                                </script>
                                                            </div>
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
                            <p class="text-muted">Complete the form below to add a new Role<p>
                            <h5 class="modal-title">Add New Role in System</h5>
                            <button onclick="closeModal()" class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="container d-grid">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="">
                                    <div class="mb-3">
                                        <div class="form-label">Role Name:</div>
                                        <input type="text" name="roleName" class="form-control">
                                    </div> 

                                    <div class="mb-3">
                                        <div class="form-label">Role Description:</div>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="assets/js/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="assets/js/sidebarfuntion.js"></script>
        <script src="assets/js/modalfunction.js"></script>
    </body>
</html>