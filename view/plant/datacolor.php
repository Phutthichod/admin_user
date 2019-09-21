<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_user";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $color = $conn->prepare("SELECT *  FROM color");
    $color->execute();
    // set the resulting array to associative
   
    // set the resulting array to associative
    $result = $color->setFetchMode(PDO::FETCH_ASSOC); 
    // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
    //     echo $v;
    // }
    
    // $i=0;
    //    while($row = $stmt->fetchAll()) {
      
    //        $json[$i]=$row;
    //        $i++;
    //    }
    $data = $color->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode($data);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>