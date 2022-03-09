<h3>update schedule</h3>

<?php
    require "dbconnect.php";

    

    $date;
    $desc;


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
        $sql = "UPDATE schedule set date = '".$_POST['date']."', description = '".htmlspecialchars($_POST['description'])."' id=".$_GET['id'];
        $res  = $conn->query($sql);

        if($res)
            echo "Data updated";
        else    
            echo "error happened";
    }

?>

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