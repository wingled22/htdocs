

<?php
    require "dbconnect.php";
    $date = null;
    $desc = "";
    if($_GET){
        $sql = "Select * from schedule where id=".$_GET['id'];
        $res  = $conn->query($sql);
        while($row = mysqli_fetch_object($res)){
            $date = $row->date;
            $desc = $row->description;
        }
    }else{
        echo "bad request";
    }

    if($_POST){
        // UPDATE `schedule` SET `id`='[value-1]',`date`='[value-2]',`description`='[value-3]' WHERE 1
        $sql = "UPDATE schedule set date = '".$_POST['date']."', description = '".htmlspecialchars($_POST['description'])."' where id=".$_GET['id'];
        $res  = $conn->query($sql);

        if($res)
            header("Location: /index.php"); 
        else    
            echo "error happened";
    }

?>

<link rel="stylesheet" href="css/site.css">

<div class="container">
    <h3>update schedule</h3>

    <form action="" method="post">
        <div>
            <label for="date">Date of sched</label>
            <input type="date" value="<?php echo $date;?>" name= "date">
        </div>    

        <div>
            <label for="description">what do you want to do</label>
            <input type="text" name="description" value="<?php echo $desc;?>" placeholder="what you want to do">
        </div>
        <input type="submit" value="submit">

    </form>
</div>