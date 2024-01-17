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
    <title>BeSmile Webboard register</title>
</head>

<body>
    <h1 style="text-align: center;">BeSmile WebBoard</h1>
    <hr>
    <form>
        <table style="border: 2px solid black; width: 40%;" align="center">
            <tr>
                <td colspan="2" style="background-color: #6CD2FE">กรอกข้อมูล</td>
            </tr>
            <tr>
                <td>ชื่อบัญชี :</td>
                <td><input type="text" name="username" size="30" required></td>
            </tr>
            <tr>
                <td>รหัสผ่าน :</td>
                <td><input type="password" name="password" size="30" required></td>
            </tr>
            <tr>
                <td>ชื่อ-นามสกุล :</td>
                <td><input type="text" name="name" size="30" required></td>
            </tr>
            <tr>
                <td>เพศ :</td>
                <td>
                    <input type="radio" name="gender" value="m">ชาย<br>
                    <input type="radio" name="gender" value="f">หญิง<br>
                    <input type="radio" name="gender" value="o">อื่นๆ
                </td>
            </tr>
            <tr>
                <td>อีเมล :</td>
                <td><input type="email" name="email" size="30" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="สมัครสมาชิก"></td>
            </tr>
        </table>
    </form>
    <br>
    <div style="text-align: center;">
        <a href="index.php">กลับไปหน้าหลัก</a>
    </div>
</body>

</html>
<?php } ?>