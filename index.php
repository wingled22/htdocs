<!-- 
    CRUD
    create 
    read
    update
    delete
-->

<h1>Schedule</h1>

<a href="/schedCreate.php">Add schedule</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Sched</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
      <?php
        require "dbconnect.php";

        $sql = "Select * from schedule";
        $res  = $conn->query($sql);

        if(!$res){
            echo "error";
        }
        
        while($row = mysqli_fetch_object($res)){
        ?>

        <tr>
            <td><?php echo $row->id ?></td>
            <td><?php  echo $row->date ?></td>
            <td><?php  echo $row->description ?></td>
            <td> 
                <!-- <a href="">Details</a> -->
                <a href="schedUpdate.php/?id=<?php echo $row->id ?>">Update</a>
                <!-- <a href="">Delete</a> -->
            </td>
        </tr>
        <?php
        }
        ?>
    

    </tbody>
</table>

