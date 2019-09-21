<?php
include('connectDB.php');

$user_id = $_POST['user_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$permission = $_POST['permission'];
$status = $_POST['status'];

$sql = "UPDATE `member` SET `username` = 'eeeee', `password` = '33333', `firstname` = '$name', `lastname` = '$surname', `email` = '$email', `permission` = '$permission', `status` = '$status', `login_fail` = '0', `login_date` = 'date(Y-m-d)', `pictrue` = 'hkhkhk' WHERE `member`.`user_id` = $user_id";


if($conn->query($sql)==TRUE){
   
    echo "window.location.href='./user_manage.php'";

}else{

    echo "ERROR".$sql."<BR>".$conn->error;
}

?>