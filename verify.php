<?php
    session_start();
    if(isset($_SESSION["id"]))
    {
        header("location:index.php");
        die();
    }
    else
    {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeSmile Verify</title>
</head>
<body>
        <?php
            $username = $_POST['username'];
            $password = $_POST['password'];
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

            $sql = "SELECT * FROM user WHERE username='$username' AND password=sha1('$password')";
            $result = $conn->query($sql);

            if($result->rowCount()==1) 
            {
                $data = $result->fetch(PDO::FETCH_ASSOC);
                $_SESSION["username"] = $data['username'];
                $_SESSION["role"] = $data['role'];
                $_SESSION["user_id"] = $data['id'];
                $_SESSION["id"] = session_id();
                header("location:index.php");
                die();
                //echo "ยินดีต้อนรับคุณ ADMIN";
            }
            else 
            {
                $_SESSION["error"] = "true";
                header("location:login.php");
                die();
                //echo "ชื่อบัญชี หรือ รหัสผ่าน ไม่ถูกต้อง";
            }

            $conn = null;
        ?>
</body>
</html>
<?php } ?>