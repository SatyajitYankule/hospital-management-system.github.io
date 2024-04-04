<?php
require_once '../dbcon.php';
$user = checkAdminLogin();

$msg = '';

if (isset($_POST['add'])) {
    $medicine_name = $_POST['medicine_name'];
    $price = $_POST['price'];

    if (!empty($medicine_name) && !empty($price)) {

        $InsertQuery = "INSERT INTO medicine_list(medicine_name, price)VALUES('$medicine_name', '$price')";
        $Qry = mysqli_query($con, $InsertQuery);
        if ($Qry) {
            $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong> Medicine Inserted !</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong> Medicine Not Inserted !</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    } else {
        $msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
    <strong> Plz fill all fields!</strong>
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
    <title>Add Medicine</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    body {
        height: 100vh;
        width: 100%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(../images/medical2.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    h1 {
        text-shadow: 0 0 10px #000;
    }

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
    }

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
        color: #ea1538;
        transition: .1s;
        border-radius: 20px;
        padding: 6.5px 10px;
    }

    .ul-style-type .butn:hover {
        border: none;
        background: #ea1538;
        /* padding: 6.5px 10px; */
        /* border-radius: 30px; */
        color: #fff;
        font-weight: bold;
        transition: .1s;
    }
</style>

<body>

    <!-- navSection  -->
    <section class="intro ">
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
                                    Hello, <?php echo $user['username']; ?>
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


            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-4">
                        <h1 class="text-center text-white">Add Medicine</h1>
                        <hr class="text-center">
                        <a href="manage-medicines.php" class="btn btn-dark">Go Back</a>
                        <?= $msg ?>

                        <form method="post">
                            <!-- <div class="text-end">
                        <a class="btn btn-success add-form-row  mr-auto "><i class="fa-solid fa-plus "></i></a>
                    </div> -->
                            <div class="medicine-form mt-3">
                                <div class="row g-3 pb-3 align-items-end">
                                    <div class="col-12">
                                        <!-- <label class="form-label">Medicine_name</label> -->
                                        <input type="text" class="form-control" placeholder="Medicine_name" name="medicine_name">
                                    </div>
                                    <!-- <div class=" col-2">
                                <label class="form-label">Qty</label>
                                <input type="text" class="form-control" placeholder="Qty" name="qty[]">
                            </div> -->
                                    <div class="col-12">
                                        <!-- <label class="form-label">Price</label> -->
                                        <input type="text" class="form-control" placeholder="Medicine_Price" name="price">
                                    </div>
                                    <!-- <div class="col-1">
                                <a class="btn btn-danger remove-form-row"><i class="fa-regular fa-trash-can"></i></a>
                            </div> -->
                                </div>
                            </div>

                            <div class="d-grid gap-2 col-12">
                                <button type="submit" class="btn btn-primary" name="add">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- 
    <script>
        $(document).on('click', '.add-form-row', function() {
            $('.medicine-form .row:last-child').clone().appendTo('.medicine-form')
        })

        $(document).on('click', '.remove-form-row', function() {
            if ($('.medicine-form .row').length > 1) {
                $(this).parent().parent().remove()
            }
        })
    </script> -->

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>