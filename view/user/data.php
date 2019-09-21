<?php
require '../../app/database.php';
 $data = new database();
 echo $data->select('select member.user_id,member.firstname , member.permission,member.status,member.lastname, member.email , count(user_plant.user_id) AS "number" from member LEFT JOIN user_plant on (member.user_id = user_plant.user_id)  group by  member.user_id');

?>