<?php
    include("./connectdb.php");
    $p_species=$_POST['p_species'];
    $p_genus=$_POST['p_genus'];
    $p_alias=$_POST['p_alias'];
    $p_color=$_POST['p_color'];
    $p_icon=$_FILES["p_icon"]["name"];
    $p_description=$_POST['p_description'];
    
    if($p_icon == ""){
        $p_icon="default5.jpg";
    }
    if($p_species == "" || $p_genus == "" || $p_alias == ""){
        echo "<script>";
        echo "alert('nono');";
        echo "</script>";
    }else{
        $sql_species="SELECT * FROM plant WHERE p_species='$p_species'";
        $result1=$con->query($sql_species);

        $sql_genus="SELECT * FROM plant WHERE p_genus='$p_genus'";
        $result2=$con->query($sql_genus);

        $sql_alias="SELECT * FROM plant WHERE p_alias='$p_alias'";
        $result3=$con->query($sql_alias);

        if($result1->num_rows >0 && $result2->num_rows >0){
            echo "<script>";
            echo "alert('Species and Genus already used');";
            echo "window.location.href='plant_manage.php';";
            echo "</script>";
            
        }else if($result3->num_rows >0){
            echo "<script>";
            echo "alert('Alias already used');";
            echo "window.location.href='plant_manage.php';"; 
            echo "</script>";
            
        }else{
            if(move_uploaded_file($_FILES["p_icon"]["tmp_name"],"fileupload/".$_FILES["p_icon"]["name"]))
            {
                echo "<script>";
                echo "alert('upload successfully');";
                echo "</script>";
            }
            $sql="INSERT INTO plant (p_id,p_species,p_genus,p_alias,p_color,p_icon,p_description)
            VALUES ('','$p_species','$p_genus','$p_alias','$p_color','$p_icon','$p_description')";
            if($con->query($sql)==TRUE){
                echo "<script>";
                echo "alert('New record created successfully');";
                echo "window.location.href='plant_manage.php';";
                echo "</script>";
            }else{
                echo "ERROR".$sql."<BR>".$con->error;
            }
        }
    }
    
    

    
    // else{
    //     $sql="INSERT INTO plant (p_id,p_species,p_genus,p_alias,p_color,p_icon,p_description)
    //         VALUES ('','$p_species','$p_genus','$p_alias','$p_color','$p_icon','$p_description')";
    // }

    
        
    
        
   
    
    
?>