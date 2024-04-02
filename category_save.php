<?php
    session_start();
    if(!isset($_SESSION["id"]) || $_SESSION['role'] != "a"){
        header("location:index.php");
        die();
    }
    else
    {
        $catName = $_POST['catName'];
        
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "INSERT INTO category (name) VALUE ('$catName')";

        $conn->exec($sql);

        $_SESSION['new_cat'] = "success";
        header("location:category.php");
    }
?>