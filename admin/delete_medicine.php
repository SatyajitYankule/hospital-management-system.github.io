<?php 
require_once '../dbcon.php';
$user = checkAdminLogin();

$id = $_GET['id']; 
$deleteQry = "DELETE from medicine_list WHERE id='$id'";
$delQuery = mysqli_query($con, $deleteQry);
if($delQuery){
    header("location:manage-medicines.php");
}else{
    echo "Deletes Unsuccessfully";
}


?>