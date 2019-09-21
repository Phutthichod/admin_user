<?php
require '../../app/database.php';
 $data = new database();
 $q = $_REQUEST['id'];
 echo $data->select2("select DISTINCT  p_icon,p_id,p_alias from plant where p_id NOT IN (select p_id from plant join user_plant on (plant.p_id = user_plant.plant_id) where user_plant.user_id = $q)");

?>