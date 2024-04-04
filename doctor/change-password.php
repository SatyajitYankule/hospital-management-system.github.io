<?php
require_once '../dbcon.php';
$user = checkDoctorLogin();
$errMsg = '';
if (isset($_POST['change_password'])) {
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  if (!empty($pass)) {
    if ($pass == $cpass) {
      $hashPass = password_hash($pass, PASSWORD_BCRYPT);
      $updatePassQuery = mysqli_query($con, "UPDATE login_user SET password='$hashPass' WHERE id='{$user['id']}'");
      if ($updatePassQuery) {
        $errMsg = "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
      <strong>Password Updated Successfully!</strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
      } else {
        $errMsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Something went wrong, please try again later!</strong>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
      }
    } else {
      $errMsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Password does not match, please try again!</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    }
  } else {
    $errMsg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Please fill all required fields!</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Change Password case paper</title>
  <style>
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

    body {
      height: 100vh;
      width: 100%;
      background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(../images/hospital2.jpg);
      background-size: cover;
      background-position: center;
    }
  </style>
</head>

<body>


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
            <a class="nav-link active butn text-white" href="view_all_patient.php">View All Patients</a>
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



  <div class="container py-1">
    <div class="row justify-content-center py-5 text-white ">
      <div class="col-md-4 col-sm-4 col-xs-4 shadow py-5">
        <h1 class="text-center">Change Password</h1>
        <hr class="w-100 mx-auto  text-white">
        <?= $errMsg ?>
        <form class="py-3" method="post">
          <div class="mb-3">
            <!-- <label class="form-label">New Password</label> -->
            <input type="password" name="password" class="form-control" placeholder="Enter New Password">
          </div>
          <div class="mb-3">
            <!-- <label class="form-label">Confirm New Password</label> -->
            <input type="password" name="cpassword" class="form-control" placeholder="Confirm New Password">
          </div>
          <div class="d-grid">
            <button type="submit" name="change_password" class="btn btn-primary">Chang Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>