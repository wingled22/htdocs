<?php
    
    require "dbconnect.php";

    $sql = " UPDATE category SET name = '".$_GET['name']."' WHERE id=" . $_GET['id'];
    
    $res  = $conn->query($sql);

    if($res){
        echo "{\"res\" : \"success\"}";
    }else{
        echo "{\"res\" : \"error\"}";
    }
