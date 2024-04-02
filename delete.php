<?php
    session_start();
    
    if(isset($_SESSION["id"]))
    {
        $id = $_GET["id"];

        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

        $sql = "SELECT * FROM post WHERE id = '$id'";
        foreach($conn->query($sql) as $row){
            if($row['user_id'] == $_SESSION['user_id'] || $_SESSION["role"] == "a"){
                
                $sql = "DELETE FROM post WHERE id = '$id'";
                $conn->exec($sql);

                $sql = "DELETE FROM comment WHERE post_id = '$id'";
                $conn->exec($sql);
            }
        }
        $conn = null;
    }
    header("location:index.php");
    die();
?>