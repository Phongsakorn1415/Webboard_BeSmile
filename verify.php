<?php
    session_start();
    if(isset($_SESSION["id"]))
    {
        header("location:index.php");
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

            if($username == "admin" && $password == "ad1234") 
            {
                $_SESSION["username"] = "admin";
                $_SESSION["role"] = "a";
                $_SESSION["id"] = session_id();
                header("location:index.php");
                die();
                //echo "ยินดีต้อนรับคุณ ADMIN";
            }
            elseif($username == "member" && $password == "mem1234") 
            {
                $_SESSION["username"] = "member";
                $_SESSION["role"] = "m";
                $_SESSION["id"] = session_id();
                header("location:index.php");
                die();
                //echo "ยินดีต้อนรับคุณ MEMBER";
            }
            else 
            {
                $_SESSION["error"] = "true";
                header("location:login.php");
                die();
                //echo "ชื่อบัญชี หรือ รหัสผ่าน ไม่ถูกต้อง";
            }

            /*echo "Username : " . $username . "<BR>";
            echo "Password : " . $password ;*/
        ?>
</body>
</html>
<?php } ?>