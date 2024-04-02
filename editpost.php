<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("location:index.php");
    }
    else
    {
        $id = $_GET["id"];

        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "SELECT * FROM post WHERE id = '$id'";
        foreach($conn->query($sql) as $row){
            if($row['user_id'] != $_SESSION['user_id']){
                header("location:index.php");
                die();
            }
            else{
                $category = $row['cat_id'];
                $title = $row['title'];
                $content = $row['content'];
            }
        }
        $conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeSmile สร้างกระทู้</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="BeSmile/css/style.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="BeSmile/javascript/Besmile.js"></script>
    
</head>
<body>
    <div class="container-lg">
        <h1 class="mt-3 mb-3" style="text-align: center;">BeSmile WebBoard</h1>
        <?php include "nav.php" ?> 

        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <?php //alert edit post success
                    if(isset($_SESSION['editpost_success'])){
                        echo "  <div class='alert alert-success'>
                                    แก้ไขข้อมูลเรียบร้อย
                                </div>";
                        unset($_SESSION['editpost_success']);
                    }?>  

                <div class="card border-warning">
                    <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
                    <div class="card-body">
                        <form action="editpost_save.php" method="post">
                            <?php echo "<input type='text' name='post_id' value='$id' hidden>"; ?>
                            <div class="row">
                                <label for="category" class="col-lg-3 col-form-label">หมวดหมู่:</label>
                                <div class="col-lg-9">
                                    <select name="category" id="category" class="form-select">
                                        <?php
                                            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                                            $sql = "SELECT * FROM category";
                                            foreach($conn->query($sql) as $row){
                                                if($row['id'] == $category){
                                                    echo "<option value=$row[id] selected>$row[name]</option>";
                                                }
                                                else{
                                                    echo "<option value=$row[id]>$row[name]</option>";
                                                }
                                            }
                                            $conn = null;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="topic" class="col-lg-3 col-form-label">หัวข้อ:</label>
                                <div class="col-lg-9">
                                    <?php echo "<input type='text' name='topic' id='topic' value='$title' class='form-control' required>"; ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="content" class="col-lg-3 col-form-label">เนื้อหา:</label>
                                <div class="col-lg-9">
                                    <?php echo "<textarea name='content' id='content' rows='8' class='form-control' required>$content</textarea>"; ?>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning btn-sm text-white"><i class="bi bi-floppy-fill"></i> บันทึกข้อความ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="d-flex justify-content-center mt-3">
                    
                </div> -->
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div>
</body>
</html>
<?php } ?>