<?php
include '../dbcon.php';
$user = checkCasePaperLogin();
$msg = '';

if (isset($_POST['add_casepaper'])) {
  $token = rand(100000, 999999);
  $casePaperId = $user['id'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $disease = $_POST['disease'];


  if (!empty($token) && !empty($casePaperId) && !empty($name) && !empty($age) && !empty($mobile)  && !empty($email) && !empty($address)  && !empty($disease)) {
    $insertQry = "INSERT INTO patient_info(case_paper_id, token, name, age, mobile, email, address, disease)
    VALUES('$casePaperId', '$token', '$name', '$age', '$mobile', '$email', '$address', '$disease')";
    $qry = mysqli_query($con, $insertQry);
    if ($qry) {
      $msg = '<div class="alert alert-success alert-dismissible fade show text-center" style="border-radius: 6px;" role="alert">
    <strong> Success! </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" style="border-radius: 6px;" role="alert">
    <strong>Inserted faield, try again later! </strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  } else {
    $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" style="border-radius: 6px;" role="alert">
  <strong> please fill out all fields!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Add Case Paper</title>
</head>
<style>
  header {
    height: 100vh;
    width: 100%;
    background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(../images/medical2.jpg);
    background-size: cover;
    background-position: center;
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
  <header>

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
              <a class="nav-link active butn text-white" href="add_case_paper.php">Add Case Paper</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link active butn text-white" href="index.php">Today's case paper</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link active butn text-white" href="view_all_case_paper.php">View All case paper</a>
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

    <section class="container">
      <div class="row justify-content-center my-5">
        <div class="col-md-4 col-md-offset-6 ">
          <form method="POST" action="">

            <h1 class="text-center py-2 text-white"> Add Case Paper </h1>
            <?= $msg ?>
            <hr class="text-danger">

            <div class="mb-3">
              <input type="text" class="form-control" name="name" placeholder="Patient Name">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" name="age" placeholder="Patient Age">
            </div>

            <div class="mb-3">
              <input type="tel" class="form-control" name="mobile" placeholder="Patient mobile number">
            </div>

            <div class="mb-3">
              <input type="email" class="form-control" name="email" placeholder="Patient Email Address">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" name="address" placeholder="Patient address">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" name="disease" placeholder="Patient Disease">
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary " name="add_casepaper">ADD</button>
            </div>
          </form>

        </div>
      </div>
    </section>

  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>