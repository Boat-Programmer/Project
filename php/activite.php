<?php  

session_start(); 
require_once("connect.php");

    $sql_members = "SELECT * FROM `members` WHERE `id` = '".$_SESSION['id']."' ";
    $result_members = $conn->query($sql_members);
    $row = $result_members->fetch_assoc();
    
    if(isset($_POST['submit'])){
        // $sql = "INSERT INTO `activities` (`username`, `topic_name`, `time_stated`, `time_end`,`note`) 
        //             VALUES ('".$row['username']."', 
        //                     '".$_POST['activities']."', 
        //                     '".$_POST['datetime_start']."',
        //                     '".$_POST['datetime_end']."',
        //                     '".$_POST['note']."' );";

        $sql = "INSERT INTO `activite` (`name`, `username`, `coin`, `type`, `number`, `time`, `message`) 
                    VALUES ('".$_POST['name']."', 
                            '".$row['username']."', 
                            '".$_POST['coin']."', 
                            '".$_POST['type']."', 
                            '".$_POST['number']."', 
                            '".$_POST['time']."', 
                            '".$_POST['message']."');";

        $result = $conn->query($sql) or die($conn->error);
    
        if ($result) {
            echo "<script> alert('สร้างบัญชีกิจกรรมสำเร็จ'); </script>";
            redirect('index');
        } else {
            echo "<script> alert('ไม่สามารถสร้างบัญชีกิจกรรมได้ โปรดลองใหม่หรือติดต่อผู้ดูแลระบบ'); </script>";
            redirect('activities');
        }

    } else {
        redirect('index');
     }

     function redirect($path) {
        header('Refresh:0; url=../'.$path.'.php');
     }


?>