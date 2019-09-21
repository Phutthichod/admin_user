<?php
require '../../app/database.php';
 $data = new database();
 echo $data->select('select member.user_id,member.firstname , member.permission,member.status,member.lastname, member.email , count(*) AS "number" from member join user_plant on (member.user_id = user_plant.user_id)  group by  user_plant.user_id');

?>