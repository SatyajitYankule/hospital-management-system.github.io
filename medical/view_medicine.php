<?php
include '../dbcon.php';
$user =  checkMedicalLogin();
$id = $_GET['id'];
$selectQuery = "SELECT * FROM patient_medicine_list WHERE patient_id = '$id'";
$Query = mysqli_query($con, $selectQuery);
$row = mysqli_num_rows($Query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jquery links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <title>View medicines</title>

    <!-- css  -->

    <style>
        html,
        body,
        .intro {
            height: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(../images/medicine.jpg);
            background-attachment: fixed;
            background-size: 100% 100%;
            background-repeat: no-repeat;

        }

        table td,
        table th {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        h1 {
            text-shadow: 0 0 10px #000;
        }

        thead th,
        tbody th {
            color: #fff;
        }

        tbody td {
            font-weight: 500;
            color: rgba(255, 255, 255, .65);
        }

        .card {
            border-radius: .5rem;
        }

        .dataTables_wrapper,
        .dataTables_wrapper select {
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
            transition: .2s;
        }
    </style>
</head>

<body>
    <section class="intro">
        <!-- <div class="bg-image h-100" style="background-image: url(..images/medicine.jpg); background-attachment:fixed; min-height:100%; background-size:100% 100%;" > -->
        <div class="mask pt-2 h-100" style="background-color: rgba(0,0,0,.25);">

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


            <h1 class="text-center text-capitalize pt-3 text-white">Medicine List</h1>
            <hr class="w-25 mx-auto">
            <div class="container pt-3 align-item-center">

                <div class="row justify-content-center pt-2">
                    <div class="col-6">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0 dataTables">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">medicine Name</th>
                                                <th scope="col">Medicine Quantity</th>
                                                <th scope="col">Medicine Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($medicine_result = mysqli_fetch_assoc($Query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $medicine_result['id']; ?></td>
                                                    <td><?php echo $medicine_result['medicine_name']; ?></td>
                                                    <td><?php echo $medicine_result['qty']; ?></td>
                                                    <td><?php echo $medicine_result['price']; ?></td>
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