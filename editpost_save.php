<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:index.php");
    }
    else
    {
        $post_id = $_POST['post_id'];
        $category = $_POST['category'];
        $title = $_POST['topic'];
        $content = $_POST['content'];
        
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "UPDATE post SET title = '$title', content = '$content', post_date = now(), cat_id = '$category'
                WHERE id = $post_id;";

        $conn->exec($sql);

        $_SESSION['editpost_success'] = "success";
        header("location:editpost.php?id=$post_id");
    }

    
    // die()
?>