<?php
    include("./connectdb.php");
//    $id = isset($_GET['id'])?$_GET['id'] : '';
$id = $_POST['id'];
   if($id!=''){
    
       $sql="DELETE FROM plant WHERE p_id='".$id."'";

    if($con->query($sql)==TRUE){
        echo "<script>";
        echo "alert('delete successfully');";
        echo "window.location.href='./plant_manage.php';";
        echo "</script>";
    }else{
        echo "ERROR".$sql."<BR>".$con->error;
    }
    }

    
?>