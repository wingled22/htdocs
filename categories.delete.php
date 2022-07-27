<?php

    
require "dbconnect.php";

$sql = "delete from category  WHERE id=". $_GET['id'];

$res  = $conn->query($sql);

if($res){
    echo "{\"res\" : \"success\"}";
}else{
    echo "{\"res\" : \"error\"}";
}
