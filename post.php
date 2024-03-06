<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeSmile Webboard กระทู้ที่ <?php echo $_GET['id']?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascipt"></script>
</head>
<body>
    <div class="container-lg">
        <h1 class="mt-3 mb-3" style="text-align: center;">BeSmile WebBoard</h1>
        <?php include "nav.php" ?>

        <div class="row mt-4">
            <div class="col-lg-2 col-md-2 col-sm-1 col-1">
                <a href="javascript:history.back()" class="btn btn-secondary btn-sm mt-3"><i class="bi bi-arrow-bar-left"></i> ย้อนกลับ</a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-10 col-10">

                <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                    $sql = "SELECT category.name, post.title, post.content, user.username, post.post_date FROM post
                            INNER JOIN user ON (post.user_id = user.id)
                            INNER JOIN category ON (post.cat_id = category.id)
                            WHERE post.id='$_GET[id]' ";
                    $result = $conn->query($sql);
                    while($row = $result->fetch()){
                        echo "
                            <div class='card border-primary mt-3'>
                                <div class='card-header bg-primary text-white fw-bolder fs-4'><div>[$row[0]] $row[1]</div></div>
                                <div class='card-body'>
                                    <div class='ms-4 mt-1'>$row[2]</div>
                                    <div class='mt-4 fw-bold'>$row[3] - [ $row[4] ]</div>
                                </div>
                            </div>";
                    }

                    $sql = "SELECT comment.content, user.username, comment.post_date FROM comment
                            INNER JOIN user ON (comment.user_id = user.id)
                            WHERE comment.post_id='$_GET[id]'
                            ORDER BY comment.post_date";
                    $result = $conn->query($sql);
                    $i = 1;
                    while($row = $result->fetch()){
                    echo "
                        <div class='card border-info mt-4 ms-5'>
                            <div class='card-header bg-info text-white'>
                                <div class='fw-bolder fs-5'>ความคิดเห็นที่ $i</div>
                                <div>$row[1] - [ $row[2] ]</div>
                            </div>
                            <div class='card-body'>
                                $row[0]
                            </div>
                        </div>";
                        $i = $i +1;
                    }
                    if(isset($_SESSION['id'])){
                ?>
            
                <div class="card border-success mt-3">
                    <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
                    <div class="card-body">
                        <form action="post_save.php" method="post">
                            <input type="hidden" name="post_id" value="<?= $_GET['id']?>">
                            <div class="row mb-3 justify-content-center">
                                <div class="col-lg-10">
                                    <textarea name="comment" rows="8" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-sm text-white"><i class="bi bi-chat-right-text"></i> comment</button>
                                    <button type="reset" class="btn btn-danger btn-sm ms-2"><i class="bi bi-x-square"></i> ล้าง</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><?php }?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-1 col-1"></div>
        </div>
    </div>
    
</body>
</html>