<?php
    session_start();
    if(!isset($_SESSION["id"]));
    else
    {
        $category = $_POST['category'];
        $title = $_POST['topic'];
        $content = $_POST['content'];
        
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "INSERT INTO post (title, content, post_date, cat_id, user_id)
                VALUES ('$title', '$content', now(), '$category', '$_SESSION[user_id]')";

        $conn->exec($sql);

        // $_SESSION['new_post'] = $title;
    }

    header("location:index.php");
    // die()
?>