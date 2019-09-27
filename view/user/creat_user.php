<?php
require '../../app/database.php';
$data = new database();

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$permission = $_POST['permission'];
$status = $_POST['status'];


$data->insert("INSERT INTO `member` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `permission`, `status`) VALUES (NULL, '$username', '$password', '$name', '$surname', '$email', '$permission', '$status')");


?>