<?php
    require "dbconnect.php";

    //create array
    $myArray = array();

    $sql = "Select * from category";
    $res  = $conn->query($sql);

    while($row = $res->fetch_assoc()) {
        $myArray[] = $row;
    }
    
    echo json_encode($myArray);