<?php 

    require_once('connect.php');

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password_login'];

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
                $_SESSION['image'] =$row['image'];
                
                header('location:../index.php');

            }else{

                echo '<script> alert("รหัสผ่านไม่ถูกต้อง") </script>';
                header('Refresh:0; url=../login.php');

            }

        } else {
            echo '<script> alert("ผู้ใช้คนนี้ไม่มีอยู่จริง") </script>';
            header('Refresh:0; url=../login.php');
        }

    } else {
        header('location:../index.php');
    }
    
    
?>