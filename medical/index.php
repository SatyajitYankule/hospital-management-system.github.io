<?php

include '../dbcon.php';
$user = checkMedicalLogin();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jquery links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <title>Today's Patients List</title>

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

<body>
    <!-- navSection  -->
    <section class="intro ">
        <div class="bg-image " style="background-image: url(https://mdbootstrap.com/img/Photos/new-templates/glassmorphism-article/img7.jpg) ; background-attachment:fixed; min-height:100%">
            <div class="mask py-2 h-100">
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
                                    <a class="nav-link active butn text-white" href="view_all_patient.php">View all Patients</a>
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

                <h1 class="text-center text-white pt-3">Today's Patients List</h1>
                <hr class="text-white w-25 mx-auto">
                <div class="container">
                    <!-- <a href="view_all_patient.php" class="btn btn-primary mb-2">View all Patients</a> -->
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card mask-custom">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless text-white mb-0 dataTables">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Token</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Age</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email Address</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Disease</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Add Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $selectQry = "SELECT * FROM patient_info WHERE DATE(`created_at`) = CURDATE()";
                                                $query = mysqli_query($con, $selectQry);
                                                $row = mysqli_num_rows($query);
                                                while ($fetchResult = mysqli_fetch_array($query)) {

                                                ?>

                                                    <tr>
                                                        <th><?php echo $fetchResult['id']; ?></th>
                                                        <td><?php echo $fetchResult['token']; ?></td>
                                                        <td><?php echo $fetchResult['name']; ?></td>
                                                        <td><?php echo $fetchResult['age']; ?></td>
                                                        <td><?php echo $fetchResult['mobile']; ?></td>
                                                        <td><?php echo $fetchResult['email']; ?></td>
                                                        <td><?php echo $fetchResult['address']; ?></td>
                                                        <td><?php echo $fetchResult['disease']; ?></td>
                                                        <td><?php echo $fetchResult['created_at']; ?></td>
                                                        <td><a href="view_medicine.php?id=<?php echo $fetchResult['id']; ?>" class="btn btn-outline-info">View Medicine</a></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>