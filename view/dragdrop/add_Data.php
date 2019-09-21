<?php
require '../../app/database.php';
 $data = new database();
 $item = $_POST["item"]; 
 $id = $_POST["id"];
 $sql = "INSERT INTO user_plant (user_id, plant_id)
 VALUES ('$id', '$item')";
 $data->insert($sql);
echo $id.$item;
?>