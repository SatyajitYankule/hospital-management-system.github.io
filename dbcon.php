<?php
session_start();

$DBHOST = 'localhost';
$DBUSER = 'root';
$DBPASS = '';
$DBNAME = 'helth-management-system';

$con = mysqli_connect($DBHOST, $DBUSER, $DBPASS, $DBNAME);

if (!$con) {
    echo "Failed to connect database";
    die();
}


function checkCasePaperLogin()
{
    global $con;
    if (!isset($_SESSION['case_paper_user_id'])) {
        header('location:../case-paper-login.php');
    }

    $selectUserQuery = "SELECT * FROM login_user WHERE id = " . $_SESSION['case_paper_user_id'];
    $query = mysqli_query($con, $selectUserQuery);
    return mysqli_fetch_assoc($query);
}

function checkDoctorLogin()
{
    global $con;
    if (!isset($_SESSION['doctor_user_id'])) {
        header('location:../doctor-login.php');
    }

    $selectUserQuery = "SELECT * FROM login_user WHERE id = " . $_SESSION['doctor_user_id'];
    $query = mysqli_query($con, $selectUserQuery);
    return mysqli_fetch_assoc($query);
}


function checkMedicalLogin()
{
    global $con;
    if (!isset($_SESSION['medical_shop_user_id'])) {
        header('location:../medical-shop-login.php');
    }

    $selectUserQuery = "SELECT * FROM login_user WHERE id = " . $_SESSION['medical_shop_user_id'];
    $query = mysqli_query($con, $selectUserQuery);
    return mysqli_fetch_assoc($query);
}



function checkAdminLogin()
{
    global $con;
    if (!isset($_SESSION['admin_user_id'])) {
        header('location:../admin-login.php');
    }

    $selectUserQuery = "SELECT * FROM login_user WHERE id = " . $_SESSION['admin_user_id'];
    $query = mysqli_query($con, $selectUserQuery);
    return mysqli_fetch_assoc($query);
}
