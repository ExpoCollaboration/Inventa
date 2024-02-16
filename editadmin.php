<?php
// Start the session
include "./dbconn.php";
$id = $_GET['id'];

session_start();

if ($_SESSION["role"] !== "admin") {
    header("location: assets/error/unauthorized.php");
    exit();
}

$role = $_SESSION["role"];
$username = $_SESSION["username"];

if (isset($_POST["submit"])) {
    $fullname = $_POST['adminName'];
    $email = $_POST["email"];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if a file has been uploaded
    if (!empty($_FILES["userImage"]["name"])) {
        $filename = $_FILES["userImage"]["name"];
        $filesize = $_FILES["userImage"]["size"];
        $tmpName = $_FILES["userImage"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $filename);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script> alert('Invalid Image Extension');</script>";
        } else if ($filesize > 1000000) {
            echo "<script> alert('Image is too Large'); </script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'uploads/' . $newImageName);

            $sql = "UPDATE admin SET `name`='$fullname',`adminImage`='$newImageName',`adminEmail`='$email',`username`='$username',`password`='$password',`role`='$role' WHERE id = $id";

            $result = mysqli_query($connect, $sql);

            if ($result) {
                echo "Successfully updated the administrator account";
                header("Location: ./admin.php");
                exit();
            } else {
                echo "Failed to update administrator information: " . mysqli_error($connect);
            }
        }
    } else {
        // No file uploaded, update without changing the image
        $sql = "UPDATE admin SET `name`='$fullname',`adminEmail`='$email',`username`='$username',`password`='$password',`role`='$role' WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        if ($result) {
            echo "Successfully updated the administrator account";
            header("Location: ./admin.php");
            exit();
        } else {
            echo "Failed to update administrator information: " . mysqli_error($connect);
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
        <title>Account Management | Edit Admin</title>
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
                            <li class="breadcrumb-item active">Edit Admin</li>
                        </ol>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <div class="position-relative">
                                        <img id="previewImage" src="assets/uploads/<?php echo $row['adminImage'] ?>" alt="Admin Image" width="150px" height="150px" class="rounded-circle">
                                        <input type="file" id="userImageInput" class="form-control position-absolute" name="userImage" accept=".jpg, .jpeg, .png" style="display: none;" onchange="displayImage(this)" rea>
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
                                    <div class="form-label">FullName:</div>
                                    <input type="text" class="form-control" name="adminName" value="<?php echo $row['name'] ?>" required>
                                </div>

                                <div class="mb-2">
                                    <div class="form-label">Email:</div>
                                    <input type="email" class="form-control" name="email" value="<?php echo $row['adminEmail'] ?>" required>
                                </div>

                                <div class="mb-2">
                                    <div class="form-label">Username:</div>
                                    <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required>
                                </div>
                                
                                <div class="mb-2">
                                    <div class="form-label">Password:</div>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" onclick="togglePasswordVisibility(this)">
                                                <i class="far fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function togglePasswordVisibility(element) {
                                        var passwordInput = document.querySelector('input[name="password"]');
                                        var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                        passwordInput.setAttribute('type', type);

                                        var eyeIcon = element.querySelector('i');
                                        eyeIcon.classList.toggle('fa-eye');
                                        eyeIcon.classList.toggle('fa-eye-slash');
                                    }
                                </script>

                                <div class="mb-3">
                                    <div class="form-label">Role:</div>
                                    <input type="text" class="form-control" name="role" value="<?php echo $row['role'] ?>" required>
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