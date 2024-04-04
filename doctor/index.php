<?php
include '../dbcon.php';
$user = checkDoctorLogin();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jquery links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <title>DOCTOR TABLE</title>
    <style>
        .intro {
            height: 100%;
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
            color: #ea1538;
            transition: .1s;
            border-radius: 20px;
            padding: 5.5px 10px;
        }

        .ul-style-type .butn:hover {
            border: none;
            background: #ea1538;
            padding: 6px 10px;
            /* border-radius: 3px; */
            color: #fff;
            font-weight: bold;
            transition: .1s;
        }
    </style>
</head>

<body class="pb-5">

    <section class="container-fluid intro">
        <div class="row justify-content-center">
            <div class="col-md-12 col-12">
                <!-- navSection  -->
                <nav class="navbar navbar-expand-lg navbar-light nav-navbar">
                    <div class="container">
                        <a class="navbar-brand logo text-dark" href="#"><span>H</span>ospital</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ul-style-type ">
                                <li class="nav-item ">
                                    <a class="nav-link active butn text-dark" href="index.php">Today's Patients</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link active butn text-dark" href="view_all_patient.php">View all patients</a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle butn text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Hello, Dr.<?php echo $user['username'] ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item " href="change-password.php">Chang Password</a></li>
                                        <li><a class="dropdown-item text-danger " href="../logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- nav-section end -->
                <div class="container">
                    <h1 class="text-center pt-2">Today's Patients</h1>
                    <hr class="w-50 mx-auto">
                    <!-- <a href="view_all_patient.php" class="btn btn-primary mb-3">view all patients</a> -->

                    <table class="table table-bordered table-hover dataTables pt-2">
                        <thead class="text-center table-info">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Token</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email address</th>
                                <th scope="col">Address</th>
                                <th scope="col">Disease</th>
                                <th scope="col">Time</th>
                                <th scope="col">Add Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php

                            $selectQuery = "SELECT * FROM patient_info WHERE DATE(`created_at`) = CURDATE()";
                            $qry = mysqli_query($con, $selectQuery);
                            $row = mysqli_num_rows($qry);
                            while ($resultFetch = mysqli_fetch_assoc($qry)) {

                            ?>


                                <tr>
                                    <td><?php echo $resultFetch['id']; ?></td>
                                    <td><?php echo $resultFetch['token']; ?></td>
                                    <td><?php echo $resultFetch['name']; ?></td>
                                    <td><?php echo $resultFetch['age']; ?></td>
                                    <td><?php echo $resultFetch['mobile']; ?></td>
                                    <td><?php echo $resultFetch['email']; ?></td>
                                    <td><?php echo $resultFetch['address']; ?></td>
                                    <td><?php echo $resultFetch['disease']; ?></td>
                                    <td><?php echo $resultFetch['created_at']; ?></td>
                                    <td><a href="add-medicine.php?id=<?php echo $resultFetch['id']; ?>" class="btn btn-outline-primary">Add Medicine</a></td>

                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </section>

    <script>
        $(document).ready(function() {
            $('.dataTables').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>