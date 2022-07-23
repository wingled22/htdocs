<link rel="stylesheet" href="css/site.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
    <h1>Schedule</h1>

    <a class="btn" href="/schedCreate.php">Add schedule</a>

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
                    <a href="schedDelete.php/?id=<?php echo $row->id ?>">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        

        </tbody>
    </table>
</div>