<?php
    require "dbconnect.php";

    if($_POST){
        
        $sql = "INSERT INTO schedule (date, description) values ('".$_POST['date']."', '".htmlspecialchars($_POST['description'])."')";
        
        $res  = $conn->query($sql);
        
        if($res)
            header("Location: /index.php"); 
        else    
            echo "error happened";
    }
?>

<link rel="stylesheet" href="css/site.css">

<div class="container">
    <h3>Add Schedule</h3>

    <form action="" method="post">
        <div>
            <label for="date">Date of sched</label>
            <br>
            <input type="date" name= "date">
        </div>    

        <div>
            <label for="description">what do you want to do</label>
            <br>
            <input type="text" name="description" placeholder="what you want to do">
        </div>
        <input type="submit" value="submit">

    </form>
</div>