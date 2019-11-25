<?php 
    error_reporting(E_ALL);
    session_start();
    $conn = new mysqli('localhost','root','','easypay');
    $conn->set_charset("utf8");
    if ($conn->connect_errno){
        die("Connection Failed! ".$conn->connect_error);
    }
    $base_path_blog = 'assets/images/blog/';

?>