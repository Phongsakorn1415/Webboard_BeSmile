<?php
    session_start();
    if(!isset($_SESSION["id"]))
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
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">BeSmile WebBoard</h1>
    <hr>
    <?php
        echo "ผู้ใช้ : $_SESSION[username]<BR>";
        echo "
            <form>
                <table>
                    <tr>
                        <td>หมวดหมู่ : </td>
                        <td><select>
                                <option value='all'>--ทั้งหมด--</option>
                                <option value='general'>เรื่องทั่วไป</option>
                                <option value='study'>เรื่องเรียน</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>หัวข้อ : </td>
                        <td><input type='text' name='topic' size='37' required></td>
                    </tr>
                    <tr>
                        <td>เนื้อหา : </td>
                        <td><textarea name='content' rows='6' cols='40'></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' value='บันทึกข้อความ'></td>
                </table>

            </form>"
    ?>
</body>
</html>
<?php } ?>