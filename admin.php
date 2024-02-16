<?php
// Start the session
session_start();
include "./dbconn.php";

if ($_SESSION["role"] !== "admin") {
    header("location: assets/error/unauthorized.php");
    exit();
}

$role = $_SESSION["role"];
$username = $_SESSION["username"];

if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];

    $fullname = $firstName . " " . $lastName;
    $email = $_POST["email"];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if($_FILES["userImage"]["error"] === 4) {
        echo 
        "
            <script> alert('Image Does Not Exist'); </script>
        ";
    } else {
        $filename = $_FILES["userImage"]["name"];
        $filesize = $_FILES["userImage"]["size"];
        $tmpName = $_FILES["userImage"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $filename);
        $imageExtension = strtolower(end($imageExtension));

        if(!in_array($imageExtension, $validImageExtension)) {
            echo
            " <script> alert('Invalid Image Extension');</script>
            ";
        } else if($filesize > 1000000) {
            echo "<script> alert('Image is too Large'); </script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            // Create "uploads" folder if it doesn't exist
            if (!file_exists("uploads")) {
                mkdir("uploads");
            }

            move_uploaded_file($tmpName, 'uploads/' . $newImageName);

            if($_SESSION["role"] !== "admin") {
                echo "<script>alert('User does not have the permission to access this module!');</script>";
            } else {
                // Database Insertion
                $sql = "INSERT INTO `admin`(`id`, `name`, `adminImage`, `adminEmail`, `username`,  `password`, `role`) 
                VALUES (NULL,'$fullname','$newImageName', '$email', '$username','$password','$role')";

                $result = mysqli_query($connect, $sql);

                if ($result) {
                    echo "Successfully created an account";
                    header("Location: ./index.php");
                    exit();
                } else {
                    echo "Failed to add an administrator to the admin table";
                }
            }
        }
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
        <title>Control Panel | Dashboard</title>
        <!-- Awesome Fonts -->
        <script src="https://kit.fontawesome.com/20fbad04b0.js" crossorigin="anonymous"></script>
        <link href="assets/css/dashboard.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/datatables.css">
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
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="./admin.php">Account Management</a></li>
                                <li class="breadcrumb-item active">Admin Table</li>
                            </ol>
                            <div class="card-body">
                                You can add a admin and make it visible in the table. 
                                <button onclick="openModal()" type="button" style="float: right; color: white;" class="btn btn-info">+ Add Administrator</button>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of the Administrator
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatablesSimple" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">Name</th>
                                                <th scope="col" class="text-center">Image</th>
                                                <th scope="col" class="text-center">Username</th>
                                                <th scope="col" class="text-center">Email</th>
                                                <th scope="col" class="text-center">Password</th>
                                                <th scope="col" class="text-center">Role</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include "./dbconn.php";
                                                $sql = "SELECT * FROM `admin`";
                                                $result = mysqli_query($connect, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) {

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><img src="assets/uploads/<?php echo $row['adminImage'] ?>" width="50px" height="50px" alt=""></td>
                                                        <td><?php echo $row['username'] ?></td>
                                                        <td><?php echo $row['adminEmail'] ?></td>
                                                        <td><?php echo str_repeat('&bull;', strlen($row['password'])); ?></td>
                                                        <td><?php echo $row['role'] ?></td>
                                                        <td>
                                                            <div class="d-flex" style="gap: 10px; justify-content: center;">
                                                                <a href="./editAdmin.php?id=<?php echo $row['id'] ?>" class="btn btn-primary me-3" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="far fa-pen-to-square fs-5"></i>
                                                                </a>
                                                                <a href="./viewAdmin.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View">
                                                                    <i class="far fa-eye fs-5"></i>
                                                                </a>
                                                                <a href="./delete_row.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
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
                            <p class="text-muted">Complete the form below to add a new Administrator<p>
                            <h5 class="modal-title">Add New Administrator</h5>
                            <button onclick="closeModal()" class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="container d-grid">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <div class="position-relative">
                                            <img id="previewImage" src="assets/img/profile.jpg   " alt="Admin Image" width="150px" height="150px" class="rounded-circle">
                                            <input type="file" id="userImageInput" class="form-control position-absolute" name="userImage" accept=".jpg, .jpeg, .png" style="display: none;" onchange="displayImage(this)">
                                            <label for="userImageInput" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; cursor: pointer;">
                                                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                    <i class="fa fa-folder-open" style="color: #fff; font-size: 40px;"></i>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <script>
                                        function selectFile() {
                                            document.getElementById('userImageInput').click();
                                        }

                                        function displayImage(input) {
                                            var previewImage = document.getElementById('previewImage');
                                            var file = input.files[0];

                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                previewImage.src = e.target.result;
                                            };

                                            reader.readAsDataURL(file);
                                        }
                                    </script>

                                    <div class="mb-2">
                                        <div class="form-label">First Name:</div>
                                        <input type="text" class="form-control" name="firstName" required>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-label">Last Name:</div>
                                        <input type="text" class="form-control" name="lastName" required>
                                    </div>

                                    <div class="mb-2" style="display: none;">
                                        <div class="form-label">FullName:</div>
                                        <input type="text" class="form-control" name="adminName">
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-label">Email:</div>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>

                                    <div class="mb-2">
                                        <div class="form-label">Username:</div>
                                        <input type="text" class="form-control" name="username" required>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-label">Password:</div>
                                        <input type="text" class="form-control" name="password" required>
                                    </div>

                                    <div class="mb-3" style="display: none;">
                                        <div class="form-label">Role:</div>
                                        <input type="text" class="form-control" name="role" value="admin" readonly required>
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
    </body>
</html>