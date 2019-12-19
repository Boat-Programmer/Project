<?php 
     session_start(); 
     require_once("connect.php");

     $sql_members = "SELECT * FROM `members` WHERE `name` = '".$_SESSION['name']."' ";
     $result_members = $conn->query($sql_members);
     $row = $result_members->fetch_assoc();

     
     if(isset($_POST['submit'])){

         $sql = "INSERT INTO `paymemt` ( `name`, `activite`, `coin`, `type`, `time`, `image`, `message`) 
                 VALUES ( 
                         '".$row['name']."', 
                         '".$_POST['activite']."', 
                         '".$_POST['coin']."', 
                         '".$_POST['type']."', 
                         '".$_POST['time']."', 
                         '".$_POST['image']."', 
                         '".$_POST['message']."');";
         
 
         $result = $conn->query($sql) or die($conn->error);
        

         if ($result) {
             echo "<script> alert('แจ้งชำระเงินเรียบร้อย'); </script>";
             redirect('dashboard');
         } else {
             echo "<script> alert('ไม่สามารถแจ้งชำระเงินได้ โปรดลองใหม่หรือติดต่อผู้ดูแลระบบ'); </script>";
             redirect('dashboard');
         }
 
     } else {
         redirect('dashboard');
      }
 
      function redirect($path) {
         header('Refresh:0; url=../'.$path.'.php');
      }
     




?>