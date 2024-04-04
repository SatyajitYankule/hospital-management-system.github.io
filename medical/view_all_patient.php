<?php
include '../dbcon.php';

$user = checkMedicalLogin();

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
    <title>View All Patients List</title>

    <style>
        html,
        body,
        .intro {
            height: 100%;
        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .card {
            border-radius: 0.5rem;
        }


        h1 {
            text-shadow: 0 0 10px #000;

        }

        /* navsection */

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
            color: #B22222;
            text-shadow: 0 0 10px #fff;
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
</head>

<body>
    <section class="intro">
        <div class="bg-image " style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img4.jpg'); background-attachment:fixed; min-height:100%">
            <div class="mask  h-100" style="background-color: rgba(25, 185, 234,.25);">


            <!-- nav-section start -->
            <nav class="navbar navbar-expand-lg navbar-light nav-navbar">
                    <div class="container">
                        <a class="navbar-brand logo text-white" href="#"><span>H</span>ospital</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ul-style-type ">
                                <li class="nav-item ">
                                    <a class="nav-link active butn text-white" href="index.php">Today's Patients</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link active butn text-white" href="view_all_patient.php">View all patients</a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle butn text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Hello, <?php echo $user['username'] ?>
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


                <h1 class="text-center pt-3 text-capitalize text-white">View All Patients List</h1>
                <hr class="w-25 mx-auto text-white">
                <div class="container py-3 pt-3 align-item-center">
                    <div class="row justify-content-center pt-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0 dataTables">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Token</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">AGE</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email address</th>
                                                    <th scope="col">ADDRESS</th>
                                                    <th scope="col">Disease</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Add Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php

                                                $selectQuery = "SELECT * FROM patient_info ";
                                                $Query = mysqli_query($con, $selectQuery);
                                                $nums = mysqli_num_rows($Query);
                                                while ($result = mysqli_fetch_array($Query)) {
                                                ?>

                                                    <tr>
                                                        <td> <?php echo $result['id']; ?></td>
                                                        <td> <?php echo $result['token']; ?></td>
                                                        <td> <?php echo $result['name']; ?></td>
                                                        <td> <?php echo $result['age']; ?></td>
                                                        <td> <?php echo $result['mobile']; ?></td>
                                                        <td> <?php echo $result['email']; ?></td>
                                                        <td> <?php echo $result['address']; ?></td>
                                                        <td> <?php echo $result['disease']; ?></td>
                                                        <td> <?php echo $result['created_at']; ?></td>
                                                        <td>
                                                            <a href="view_medicine.php?id=<?php echo $result['id']; ?>" class="btn btn-outline-info">View Medicine</a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('.dataTables').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>