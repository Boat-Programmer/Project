<?php 

    error_reporting(E_ALL);
    $conn = new mysqli('localhost','root','','classpay');
    $conn->set_charset("utf8");
    if ($conn->connect_errno){
        die("Connection Failed! ".$conn->connect_error);
    }
    $base_path_blog = 'assets/images/blog/';

    // ตั้งค่า timezone Asia/Bangkok -> thailand
    date_default_timezone_set('Asia/Bangkok');

?>