<?php

    require "dbconnect.php";

    $sql = "INSERT INTO category ( name) VALUES ('".$_GET['name']."')";
    $res  = $conn->query($sql);

    if($res){
        echo "{\"res\" : \"success\"}";
    }else{
        echo "{\"res\" : \"error\"}";
    }
