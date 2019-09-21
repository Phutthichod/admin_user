<?php
require '../../app/database.php';
 $data = new database();
 $item = $_POST["item"]; 
 $id = $_POST["id"];
 $sql = "DELETE FROM user_plant WHERE plant_id='$item' and user_id='$id'";
 $data->delete($sql);
echo $id.$item;
?>