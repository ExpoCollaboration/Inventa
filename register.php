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
        <title>| Regsistration Form</title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <form id="login-form" action="" method="post">
                                <h3 class="card-title text-center">Registration Form</h3>
                                <?php if (!empty($error)) { ?>
                                    <div class="alert alert-danger">
                                        <?php echo $error; ?>
                                    </div>
                                <?php } ?>
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <div class="position-relative">
                                        <img id="previewImage" src="assets/img/profile.jpg   " alt="Admin Image" width="150px" height="150px" class="rounded-circle">
                                        <input type="file" id="userImageInput" class="form-control position-absolute" name="userImage" accept=".jpg, .jpeg, .png" style="display: none;" onchange="displayImage(this)">
                                        <label for="userImageInput" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; cursor: pointer;">
                                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                <i class="fa fa-camera" style="color: #fff; font-size: 40px;"></i>
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
                                <div class="form-group">
                                    <label for="firstname">Fistname</label>
                                    <input placeholder="" type="text" name="firstname" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input placeholder="" type="text" name="lastname" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input placeholder="" type="text" name="email" class="form-control" autocomplete="off">
                                </div>
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
                                <div class="switch">Already have an account? <a href="./login.php">Login here</a></div>
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