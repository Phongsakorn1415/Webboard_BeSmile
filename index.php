<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeSmile Webboard</title>
</head>

<body>
    <h1 style="text-align: center;">BeSmile WebBoard</h1>
    <hr>
    <form action="#">
        หมวดหมู่ : 
        <select>
            <option value="all">--ทั้งหมด--</option>
            <option value="all">เรื่องทั่วไป</option>
            <option value="all">เรื่องเรียน</option>
        </select>
        <a href="login.html" style="float: right;">เข้าสู่ระบบ</a>
    </form>
    <ul>
        <?php
            for($j = 1; $j <= 10; $j++)
            {
                echo "<li><a href='post.php?id=".$j."'>กระทู้ที่ $j</a></li>";
            }
        ?>
    </ul>
</body>

</html>