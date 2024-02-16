<?php
// Start the session
include "./dbconn.php";
session_start();
$id = $_GET['id'];

if ($_SESSION["role"] !== "admin") {
    header("location: assets/error/unauthorized.php");
    exit();
}

$role = $_SESSION["role"];
$username = $_SESSION["username"];

if(isset($_POST["submit"])) {
    $fullname = $_POST['employeesName'];
    $email = $_POST["email"];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['roleName'];

    $sql = "UPDATE `employees` SET `name`='$fullname',`email`='$email',`username`='$username',`password`='$password',`role`='$role' WHERE id = $id";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "Successfully updated the employees";
        header("Location: ./employees.php");
        exit();
    } else {
        echo "Failed to update employees information: " . mysqli_error($connect);
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
        <title>Control Panel | Edit Employees</title>
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
                        include "./dbconn.php";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM `employees` WHERE id = $id LIMIT 1";

                        $result = mysqli_query($connect, $sql); 
                        $row = mysqli_fetch_assoc($result);
                    ?> 
                    <div class="container-fluid">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./admin.php">Account Management</a></li>
                            <li class="breadcrumb-item"><a href="./admin.php">Employees Table</a></li>
                            <li class="breadcrumb-item active">Edit Employees</li>
                        </ol>
                        <form action="" method="post" enctype="multipart/form-data">
                                <div class="">
                                    <div class="mb-2">
                                        <div class="form-label">FullName:</div>
                                        <input type="text" class="form-control" name="employeesName" value="<?php echo $row['name'] ?>" required>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-label">Email:</div>
                                        <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-label">Username:</div>
                                        <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-label">Password:</div>
                                        <input type="text" class="form-control" name="password" value="<?php echo $row['password'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-label">Role:</div>
                                        <select class="form-select" name="roleName" id="spinnerType" required>
                                                <?php
                                                $roleName = getSpinnerTypesFromDatabase();

                                                foreach ($roleName as $row) {
                                                    $roleName = $row['roleName'];

                                                    echo "<option value='$roleName'>$roleName</option>";
                                                }

                                                function getSpinnerTypesFromDatabase()
                                                {
                                                    include "./dbconn.php";

                                                    $sql = "SELECT roleName FROM `role`";

                                                    $result = mysqli_query($connect, $sql);

                                                    $roleName = array();

                                                    if ($result->num_rows > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $roleName[] = $row;
                                                        }
                                                    }

                                                    return $roleName;
                                                }
                                                ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="reset" class="btn btn-danger" name="Reset">Reset</button>
                                        <button type="submit" class="btn btn-success" name="submit">Save</button>
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