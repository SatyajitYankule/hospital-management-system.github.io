<?php
include 'dbcon.php';
$errMsg = '';
if (isset($_POST['case-paper-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $selectQuery = "SELECT * FROM login_user WHERE username = '$username' AND role = 'case_paper'";
    $query = mysqli_query($con, $selectQuery);
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
        if (password_verify($password, $row['password'])) {
            $_SESSION['case_paper_user_id'] = $row['id'];
            header('location:case-paper/add_case_paper.php');
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

    <title> Case Paper Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="loginBox">
        <?= $errMsg ?>
        <h3>Case Paper Login</h3>
        <form action="" method="post">
            <div class="inputBox">
                <input id="uname" type="text" name="username" placeholder="Username" autofocus>
                <input id="pass" type="password" name="password" placeholder="Password">
            </div>
            <input type="submit" name="case-paper-login" value="Login">
            <span class="text-white">Not Case Paper? <a href="index.php" class="d-inline">Click here</a></span>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>