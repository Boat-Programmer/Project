<?php 

    require_once('connect.php');
    session_start();
    if (isset($_POST['submit_login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM members WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (!empty($row)){

            if(password_verify($password, $row['password']))
            {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['image'] = $row['image'];
                $_SESSION['last_login'] = $row['last_login'];

                $update = "UPDATE `members` SET `last_login` = '".date("Y-m-d H:i:s")."' WHERE `members`.`id` = '".$row['id']."' ";
                $result_update = $conn->query($update); 

                if ($result_update) {
                    header('Refresh:0; url=../dashboard.php');
                  } else {
                    echo'<script> alert("Error!!!")</script>';
                  }


            }else{

                echo '<script> alert("รหัสผ่านไม่ถูกต้อง") </script>';
                header('Refresh:0; url=../index.php');

            }

        } else {
            echo '<script> alert("ผู้ใช้คนนี้ไม่มีอยู่จริง") </script>';
            header('Refresh:0; url=../index.php');
        }

    } else {
        header('location:../index.php');
    }
    
    
?>