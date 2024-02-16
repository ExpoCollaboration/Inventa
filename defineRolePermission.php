<?php
// Start the session
include "./dbconn.php";
session_start();

if ($_SESSION["role"] !== "admin") {
    header("location: assets/error/unauthorized.php");
    exit();
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
        <title>Control Panel | Define Role Permission</title>
        <!-- Awesome Fonts -->
        <script src="https://kit.fontawesome.com/20fbad04b0.js" crossorigin="anonymous"></script>
        <link href="assets/css/dashboard.css" rel="stylesheet">
        <!-- Select 2 -->
        <link href="assets/css/select2.min.css" rel="stylesheet" />
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
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./controlpanel.php">Account Management</a></li>
                            <li class="breadcrumb-item active">Define Role Permission</li>
                        </ol>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="roles">Roles:</label>
                                <select class="form-select" name="roles[]" id="spinnerType" required>
                                    <?php 
                                        $roleData = getRoleSpinnerTypesFromDatabase();  

                                        foreach($roleData as $roles) {
                                            $roleName = $roles['roleName'];

                                            echo "<option value='$roleName'>$roleName</option>";
                                        }  

                                        function getRoleSpinnerTypesFromDatabase() {
                                            include "./dbconn.php";

                                            $sql = "SELECT roleName FROM `role`";

                                            $result = mysqli_query($connect, $sql);

                                            $roleData = array();

                                            if($result->num_rows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $roleData[] = $row;
                                                }
                                            }
                                            
                                            return $roleData;
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="permission">Permission:</label>
                                <select class="multiple-select form-select" multiple name="permission[]" id="spinnerType" required>
                                    <?php 
                                        $permissionData = getPermissionSpinnerTypesFromDatabase();  

                                        foreach($permissionData as $permissions) {
                                            $permission = $permissions['permission'];

                                            echo "<option value='$permission'>$permission</option>";
                                        }

                                        function getPermissionSpinnerTypesFromDatabase() {
                                            include "./dbconn.php";

                                            $sql = "SELECT permission FROM `permission`";

                                            $result = mysqli_query($connect, $sql);

                                            $permissionData = array();

                                            if($result->num_rows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $permissionData[] = $row;
                                                }
                                            }
                                            
                                            return $permissionData;
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success" name="submit">Submit</button>
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
        <!-- Selection 2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(".multiple-select").select2({
                placeholder: '--Permission--',
                allowClear: true    
            });
        </script>
    </body>
</html>