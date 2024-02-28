<?php
    session_start();
    $username = $_POST['username'];
    $passwd = sha1($_POST['password']);
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = $conn->query($sql);

    if($result->rowCount() == 1){
        $_SESSION['new_register'] = "error";
    }
    else{
        $sql = "INSERT INTO user (username, password, name, gender, email, role)
                VALUES ('$username', '$passwd', '$name', '$gender', '$email', 'm')";

        $conn->exec($sql);

        $_SESSION['new_register'] = "success";
    }

    $conn = null;
    header("location:register.php");
    die();
?>