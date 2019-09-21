<?php
require '../../app/database.php';
 $data = new database();
 $id = $_POST['id'];
 $status = $_POST['status'];
 $data->update("UPDATE member SET status = '$status'
WHERE user_id = '$id'");

?>