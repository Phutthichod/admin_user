<?php
require '../../app/database.php';
$name = isset($_GET['firstname'])?$_GET['firstname'] : '';
 $data = new database();
 $name = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $email = $_POST['email'];
 $permission = $_POST['permission'];
 $status = $_POST['status'];
 $id = $_POST['id'];
 $data->update("UPDATE member SET firstname = '$name', lastname = '$lastname', email = '$email', permission = '$permission', status = '$status'
WHERE user_id = '$id'");

?>