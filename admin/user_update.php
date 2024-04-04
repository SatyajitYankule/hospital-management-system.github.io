<?php
require_once '../dbcon.php';
$user = checkAdminLogin();
$msg = '';

$id = $_GET['id'];

$SelectUpdateQuery  = "SELECT * FROM login_user WHERE id= $id";
$Updatequery = mysqli_query($con, $SelectUpdateQuery);
$Data = mysqli_fetch_array($Updatequery);

if (isset($_POST['add_user'])) {
    $password = $_POST['password'];
    $hashpass = password_hash($password, PASSWORD_BCRYPT);
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {

        $insertQry = "UPDATE login_user SET password='$hashpass' WHERE id='$id' ";
        $Query = mysqli_query($con, $insertQry);
        if ($Query) {
            // $msg = '<div class="alert alert-success alert-dismissible fade show text-center" style="border-radius: 6px;" role="alert">
            // <strong>Updated Succesfull! </strong>
            // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>';
            header("location:manage_users.php");
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" style="border-radius: 6px;" role="alert">
            <strong>Updated faield, try again later! </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" style="border-radius: 6px;" role="alert">
            <strong>Password Not match! </strong>
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
    <title>User Update</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <style>
        html,
        body,
        .intro {
            height: 100%;
            background-size: 100% 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(../images/medicine.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .mask-custom {
            background: rgba(24, 24, 16, .2);
            border-radius: 1em;
            backdrop-filter: blur(25px);
            border: 2px solid rgba(255, 255, 255, 0.05);
            background-clip: padding-box;
            box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
        }

        .dataTables_wrapper,
        .dataTables_wrapper .paginate_button,
        .dataTables_wrapper select,
        .dataTables_wrapper input {
            color: #fff;
        }

        /* *****navSection **** */

        .nav-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
            padding-left: 10%;
            padding-right: 10%;
        }

        .logo {
            color: #fff;
            font-size: 30px;
        }

        span {
            color: #ea1538;
            text-shadow: 0 0 10px #ea1538;


        }

        /* .text-dark{
            text-shadow: 0 0 10px #fff;
        } */

        .ul-style-type li {
            list-style-type: none;
            display: inline-block;
            padding: 10px 20px;
        }

        .ul-style-type li a {
            text-decoration: none;
            font-weight: bold;
        }

        .ul-style-type li a:hover {
            color: #ea1565;
            transition: .1s;
            border-radius: 20px;
            padding: 5.5px 10px;
        }

        .ul-style-type .butn:hover {
            border: none;
            background: #ea1565;
            padding: 6px 10px;
            /* border-radius: 3px; */
            color: #fff;
            font-weight: bold;
            transition: .1s;
        }
    </style>

</head>

<body>


    <!-- navSection  -->
    <section class="intro ">
        <!-- <div class="bg-imageh h-100 " style="background-image: url(); background-attachment:fixed; min-height:100%"> -->
        <div class="mask py-2">
            <nav class="navbar navbar-expand-lg navbar-light nav-navbar ">
                <div class="container">
                    <a class="navbar-brand logo text-white" href="#"><span>H</span>ospital</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ul-style-type ">

                            <li class="nav-item ">
                                <a class="nav-link active butn text-white" href="index.php">View Patients</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link active butn text-white" href="manage_users.php">Manage Users</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active butn text-white" href="manage-medicines.php">Manage Medicines</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active butn text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hello, <?php echo $user['username'] ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item " href="change-password.php">Change Password</a></li>
                                    <li><a class="dropdown-item text-danger " href="../logout.php">Logout</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- nav-section end -->


            <section class="container">
                <div class="row justify-content-center my-5">
                    <div class="col-md-4 col-md-offset-6 ">
                        <form method="POST" action="">
                            <h1 class="text-center py-2 text-white"> Update User <?= $Data['username'] ?> </h1>
                            <a href="manage_users.php" class="btn btn-dark mb-3">Go Back</a>
                            <?= $msg ?>
                            <!-- <hr class="text-white"> -->



                            <div class="mb-3">
                                <input type="password" class="form-control" value="" name="password" placeholder="Change Password">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" value="" name="cpassword" placeholder="Confirm Password">
                            </div>



                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary" name="add_user">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </section>

        </div>
    </section>



    <script>
        $(document).ready(function() {
            $('.myTable').DataTable();
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>