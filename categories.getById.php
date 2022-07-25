<?php
    require "dbconnect.php";

    //create array
    $myArray = array();

    $sql = "Select * from category where id= ". $_GET["catId"];
    $res  = $conn->query($sql);

    while($row = $res->fetch_assoc()) {
        $myArray[] = $row;
    }
    
    echo json_encode($myArray);