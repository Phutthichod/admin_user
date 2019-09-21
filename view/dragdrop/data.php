<?php
require '../../app/database.php';
 $data = new database();
 $q= $_REQUEST['id'];
 echo $data->select("select p_icon,p_id,p_alias from plant join user_plant on (plant.p_id = user_plant.plant_id) where user_plant.user_id = $q");

?>