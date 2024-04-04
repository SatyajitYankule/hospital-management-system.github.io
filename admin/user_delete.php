<?php
require_once '../dbcon.php';
$user = checkAdminLogin();

$id = $_GET['id'];

$deleteQuery = "DELETE FROM login_user WHERE id=$id";
$qry = mysqli_query($con, $deleteQuery);
if($qry){
    header("location:manage_users.php");
}else{
    echo "Deleted Failed";
}

?>