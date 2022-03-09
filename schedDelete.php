<?PHP 

    if($_GET){
        
        require "dbconnect.php";

        $sql = "DELETE from schedule where id = ". $_GET['id'];
        $res = $conn->query($sql);

        if($res){
            header("Location: /index.php"); 
        }else{
            echo "something happened when deleting";
        }

    }else{
        echo "no data sent";
    }

?>