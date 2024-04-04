<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>e-helth managment system </title>
    <link rel="stylesheet" href="css/index.css">
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            text-shadow: 0 0 10px #000;

        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url(images/hospital1.jpg);
            background-size: cover;
            background-attachment: fixed;
        }

        .pricing {
            width: 100%;
            height: 100vh;
            padding: 50px;
            position: relative;
            border-radius: 5px;
        }

        .pricing:before {
            content: "";
            position: absolute;
            top: 0%;
            bottom: 0%;
            left: 0;
            right: 0;
            z-index: -1;
        }

        .money {
            font-size: 40px;
            line-height: 1;
            color: #606060;
        }

        .card {
            transition: 0.4s ease;
        }

        .card-header {
            font-size: 1.6rem;
            font-weight: bold;
            background: #fff !important;
            padding: 25px 9 !important;
        }

        .card-body {
            padding: 30px 0px !important;
        }

        .card-body li {
            margin: 10px 0;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.6;
            color: #606060;
        }

        .card-footer {
            background: white !important;
            padding: 30px 0px !important;
        }

        .card-footer a {
            border: 1px solid #50d1c0;
            border-radius: 100px;
            margin: 0 5px;
            padding: 12px 35px;
            outline: none;
            color: #50d1c0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.4;
            text-align: center;
        }

        .card:hover .card-footer a {
            color: #fff;
            background: #50d1c0;
            text-decoration: none;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3);
        }

        .card:hover {
            transform: translateY(-20px);
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3);
        }

        .card:hover .card-header,
        .card:hover .money {
            color: #B22222;
        }

        .card-second {
            transform: translateY(-20px);
        }

    </style>
</head>

<body>

    <section class="pricing" id="pricingdiv">
        <div class="container headings text-center">
            <h1 class="text-center font-weight-bold text-white">Hospital Managment System</h1>
            <hr class="text-center text-white">
        </div>
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-4 col-12 ">
                    <div class="card text-center">
                        <div class="card-header">Case Paper</div>
                        <img src="https://i.ibb.co/VQmtgjh/6845078.png" alt="">
                        <div class="card-footer">
                            <a href="case-paper-login.php" class="stretched-link">Login</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 card-second">
                    <div class="card text-center">
                        <div class="card-header">Doctor</div>
                        <img src="images/doctor.jpg" alt="">
                        <div class="card-footer">
                            <a href="doctor-login.php" class="stretched-link">Login</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="card text-center">
                        <div class="card-header">Medical Shop</div>
                        <img src="images/medicine.jpg" alt="" height="230">
                        <div class="card-footer">
                            <a href="medical-shop-login.php" class="stretched-link">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>