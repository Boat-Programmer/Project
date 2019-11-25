<?php 
   
   require_once('connect.php');

   if (isset($_POST['submit']) && isset($_SESSION['id'])) {
       $sql = "UPDATE `members` SET 
              `name`    = '".$_POST['name']."',
              `email`   = '".$_POST['email']."',
              `phone`   = '".$_POST['phone']."',
              `address` = '".$_POST['address']."' 
              WHERE id  = '".$_SESSION['id']."' ";
       $result = $conn->query($sql); //or die($conn->error)

       if ($result) {
           $_SESSION['name'] = $_POST['name'];
            echo "<script> alert('แก้ไขข้อมูล สำเร็จแล้ว'); </script>";
            header('Refresh:0; url=../profile.php');
       } else {
            echo "<script> alert('แก้ไขข้อมูล ไม่สำเร็จแล้ว \nโปรดติดต่อผู้ดูแลระบบ'); </script>";
            header('Refresh:3; url=../profile.php');
       }

   } else {
       header('location:../index.php');
   }
   

?>