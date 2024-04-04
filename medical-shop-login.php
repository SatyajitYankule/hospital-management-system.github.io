<?php
include 'dbcon.php';
$errMsg = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $selQuery = "SELECT * FROM login_user WHERE username='$username' AND role = 'medical_shop'";
    $qry = mysqli_query($con, $selQuery);

    if (mysqli_num_rows($qry) > 0) {
        $fetch = mysqli_fetch_array($qry);
        if (password_verify($password, $fetch['password'])) {

            $_SESSION['medical_shop_user_id'] = $fetch['id'];
            header('location:medical/index.php');
        } else {
            $errMsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Password Not Match!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    } else {
        $errMsg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Username not found!</strong>
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

    <title> Medical Shop Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body style="background-image: url(images/medicine.jpg);">
    <div class="loginBox">
        <?= $errMsg ?>
        <h3>Medical Shop Login</h3>
        <form action="#" method="POST">
            <div class="inputBox">
                <input id="uname" type="text" name="username" placeholder="Username" name="username" autofocus>
                <input id="pass" type="password" name="password" placeholder="Password" name="password">
            </div>
            <input type="submit" name="login" value="Login" class="btn btn-primary">
            <span class="text-white ">Not Medical Shop? <a href="index.php" class="d-inline">Click here</a></span>

        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>