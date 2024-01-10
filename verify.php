<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeSmile Webboard Verify</title>
</head>
<body>
    <h1 style="text-align: center;">BeSmile WebBoard</h1>
    <hr>
    <div style="text-align: center;">
        <!-- เข้าสู่ระบบด้วย <BR> -->
        <?php
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($username == "admin" && $password == "ad1234") echo "ยินดีต้อนรับคุณ ADMIN";
            elseif($username == "member" && $password == "mem1234") echo "ยินดีต้อนรับคุณ MEMBER";
            else echo "ชื่อบัญชี หรือ รหัสผ่าน ไม่ถูกต้อง";

            /*echo "Username : " . $username . "<BR>";
            echo "Password : " . $password ;*/
        ?>
        <br>
        <a href="index.php">กลับไปหน้าหลัก</a>
    </div>
</body>
</html>