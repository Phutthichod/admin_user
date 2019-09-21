<?php
    include("./connectdb.php");
    $p_id=$_POST['p_id'];
    $p_species=$_POST['p_species'];
    $p_genus=$_POST['p_genus'];
    $p_alias=$_POST['p_alias'];
    $p_color=$_POST['p_color'];
    $p_icon=$_POST['p_icon'];
    $p_description=$_POST['p_description'];

    if($p_icon == "" && $p_color != 0){
        $sql="UPDATE plant SET  p_species='$p_species',
                                p_genus='$p_genus',
                                p_alias='$p_alias', 
                                p_color='$p_color',  
                                p_description='$p_description'  
                                WHERE p_id='$p_id' 
                                ";
    }
    else if($p_color == 0 && $p_icon != ""){
        $sql="UPDATE plant SET  p_species='$p_species',
                                p_genus='$p_genus',
                                p_alias='$p_alias', 
                                p_icon='$p_icon', 
                                p_description='$p_description'  
                                WHERE p_id='$p_id' 
                                ";
    }
    else if($p_color == 0 && $p_icon == ""){
        $sql="UPDATE plant SET  p_species='$p_species',
                                p_genus='$p_genus',
                                p_alias='$p_alias', 
                                p_description='$p_description'  
                                WHERE p_id='$p_id' 
                                ";
    }
    else{
        $sql="UPDATE plant SET  p_species='$p_species',
                                p_genus='$p_genus',
                                p_alias='$p_alias', 
                                p_color='$p_color',  
                                p_icon='$p_icon', 
                                p_description='$p_description'  
                                WHERE p_id='$p_id' 
                                ";
    }
    


    if($con->query($sql)==TRUE){
        echo "<script>";
        echo "window.location.href='./plant_manage.php';";
        echo "</script>";
    }else{
        echo "ERROR".$sql."<BR>".$con->error;
    }
    
?>