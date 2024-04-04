<?php
        require_once 'dbcon.php';
        $errMsg = '';
        if (isset($_POST['admin_login'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $adminLogin = mysqli_query($con, "SELECT * FROM login_user WHERE username='$user' AND role = 'admin'");
            if (mysqli_num_rows($adminLogin) > 0) {
                $row = mysqli_fetch_array($adminLogin);
                $hashPass = $row['password'];
                if (password_verify($pass, $hashPass)) {
                    $_SESSION['admin_user_id'] = $row['id'];
                    header('location:admin/index.php');
                } else {
                    $errMsg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Invalid Password!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                }
            } else {
                $errMsg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>Invalid Username!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        
    }
        ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .gradient-custom-2 {
           
            background: #fccb90;

            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>
<body>

    <section class="h-50 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-4">
                    <div class="card container rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="card-body p-md- mx-md-10">

                                    <div class="text-center">
                                        <img src="images/logo2.png" style="width: 185px;" alt="logo">
                                        <h4 class="mt-3 mb-4 pb-1">Admin Login</h4>
                                    </div>
                                    <?= $errMsg ?>
                                    <form method="POST">
                                        <p>Please login to your account:</p>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example11" class="form-control" placeholder="Username or Email" name="username" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example22" class="form-control" placeholder="Enter Password" name="password" />
                                        </div>

                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary  fa-lg gradient-custom-2 mb-3" name="admin_login" type="submit">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>