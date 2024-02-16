<?php
include "./dbconn.php";
session_start();

$error = "";

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    $adminCheck = mysqli_query($connect, "SELECT COUNT(*) as count FROM `admin`");

    if ($adminCheck === false) {
        $error = "Error checking admin database: " . mysqli_error($connect);
    } else {
        $adminRow = mysqli_fetch_assoc($adminCheck);
        $adminCount = $adminRow['count'];

        if ($adminCount == 0) {
            $error = "Admin database is empty. Please contact the administrator.";
        } else {
            $sql_users = "SELECT * FROM `employees` WHERE BINARY username = ? AND BINARY password = ?";
            $stmt_users = mysqli_prepare($connect, $sql_users);
            mysqli_stmt_bind_param($stmt_users, "ss", $username, $password);
            mysqli_stmt_execute($stmt_users);
            $result_users = mysqli_stmt_get_result($stmt_users);

            $sql_admin = "SELECT * FROM `admin` WHERE BINARY username = ? AND BINARY password = ?";
            $stmt_admin = mysqli_prepare($connect, $sql_admin);
            mysqli_stmt_bind_param($stmt_admin, "ss", $username, $password);
            mysqli_stmt_execute($stmt_admin);
            $result_admin = mysqli_stmt_get_result($stmt_admin);

            if ($result_users && mysqli_num_rows($result_users) > 0) {
                $user = mysqli_fetch_assoc($result_users);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header("location: ./dashboardEmployees.php");
                exit();
                
            } elseif ($result_admin && mysqli_num_rows($result_admin) > 0) {
                $admin = mysqli_fetch_assoc($result_admin);
                $_SESSION['user_id'] = $admin['id'];
                $_SESSION['name'] = $admin['name'];
                $_SESSION['adminImage'] = $admin['adminImage'];
                $_SESSION['username'] = $admin['username'];
                $_SESSION['role'] = $admin['role'];
            } else {
                $error = "Invalid username or password";
            }

            mysqli_stmt_close($stmt_users);
            mysqli_stmt_close($stmt_admin);
        }
    }

    if (empty($error)) {
        header("location: ./controlpanel.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="assets/css/dashboard.css">
        <!-- Awesome Fonts -->
        <script src="https://kit.fontawesome.com/20fbad04b0.js" crossorigin="anonymous"></script>
        <style>
            .error-message {
                background-color: #f8d7da;
                border: 1px solid #f5c6cb;
                color: #721c24;
                padding: 10px;
                margin-top: 10px;
                border-radius: 5px;
            }
        </style>
        <title>| Login</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <form id="login-form" action="" method="post">
                                <h1 class="card-title display-4 text-center">We are <span class="text-info">INVENTA</span></h1>
                                <h4 class="card-subtitle mb-4 text-center">Welcome back! Log in to your account to view today's clients:</h4>
                                <?php if (!empty($error)) { ?>
                                    <div class="alert alert-danger">
                                        <?php echo $error; ?>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input placeholder="" type="text" name="username" id="username" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input placeholder="" type="password" name="password" id="password" class="form-control" autocomplete="off">
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password"><i class="far fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Login" name="login" class="btn btn-primary btn-block">
                                <hr>
                                <div class="switch">Don't have an account? <a href="./register.php">Register here</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JS -->
        <script type="text/javascript" src="assets/js/eyefunction.js"></script>
    </body>
</html>