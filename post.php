<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeSmile Webboard กระทู้ที่ <?php echo $_GET['id']?></title>
</head>
<body>
    <h1 style="text-align: center;">BeSmile WebBoard</h1>
    <hr>
    <div style="text-align: center;">
        
        <?php

            $page = $_GET['id'];
            echo "ต้องการดูกระทู้หมายเลข $page<br>";
            if(($page % 2) == 0) echo "เป็นกระทู้หมายเลขคู่";
            else echo "เป็นกระทู้หมายเลขคี่";
        ?>
    </div>
    <br>
    <form>
        <table style="border: 2px solid black; width: 40%;" align="center">
            <tr>
                <td style="background-color: #6CD2FE">แสดงความคิดเห็น</td>
            </tr>
            <tr>
                <td align="center"><textarea name="comment" rows="10" cols="60"></textarea></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" value="ส่งข้อความ"></td>
            </tr>
        </table>
    </form>
    <br>
    <div  style="text-align: center">
        <a href="index.php">กลับไปหน้าหลัก</a>
    </div>
    
</body>
</html>