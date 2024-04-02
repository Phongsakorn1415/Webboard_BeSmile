<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeSmile Webboard</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="BeSmile/css/style.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="BeSmile/javascript/Besmile.js"></script>
    <script type="text/javascript">
        function deleteCon(){
            let r = confirm('--- [ Final Warning !!! ] ---\n Are You sure you want to delete this?');
            return r;
            // e.preventDefault();
        }
    </script>

</head>

<body>
    <div class="container-lg">
    <h1 class="mt-3 mb-3" style="text-align: center;">BeSmile WebBoard</h1>
    
    <?php include "nav.php" ?>

    <div class="mt-3 d-flex justify-content-between">
        <div>
            <label>หมวดหมู่</label>
            <span class="dropdown">
                <button class="btn btn-sm btn-light btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                        if(isset($_GET['cat'])){
                            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                            $sql = "SELECT * FROM category WHERE id = $_GET[cat]";
                            foreach($conn->query($sql) as $row){
                                echo "$row[name]";
                            }
                            $conn = null;
                        }
                        else{
                            echo "--ทั้งหมด--";
                        }
                    ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="Button2">
                    <li><a class="dropdown-item" href="index.php">ทั้งหมด</a></li>
                    <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT * FROM category";
                        foreach($conn->query($sql) as $row){
                            echo "<li><a class='dropdown-item' href=index.php?cat=$row[id]>$row[name]</a></li>";
                        }
                        $conn = null
                    ?>
                </ul>
            </span>
        </div>
        <?php
            if(isset($_SESSION["id"]))
            {?>
                <div>
                    <a href="newpost.php" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> สร้างกระทู้ใหม่</a>
                </div>
        <?php
            }?>
    </div>
    <div>
        <table class="table table-striped mt-4">
        <?php
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
            if(isset($_GET['cat'])){
                $sql = "SELECT category.name, post.title, post.id, user.username, post.post_date, post.user_id FROM post
                    INNER JOIN user ON (post.user_id = user.id)
                    INNER JOIN category ON (post.cat_id = category.id)
                    WHERE post.cat_id = '$_GET[cat]'
                    ORDER BY post.post_date DESC";
            }
            else{
                $sql = "SELECT category.name, post.title, post.id, user.username, post.post_date, post.user_id FROM post
                    INNER JOIN user ON (post.user_id = user.id)
                    INNER JOIN category ON (post.cat_id = category.id)
                    ORDER BY post.post_date DESC";
            }
            
            
            $result = $conn->query($sql);
            while($row = $result->fetch()){

                echo "<tr><td class='d-flex justify-content-between'>
                        <div>
                            [$row[0]] <a href=post.php?id=$row[2] style=text-decoration:none;>$row[1]</a> 
                            <br>
                            $row[3] - [ $row[4] ]
                        </div>";
                if(isset($_SESSION["id"]))
                    {
                        if($_SESSION["role"] == "a" || $_SESSION["user_id"] == $row[5]){
                            echo "<div class='align-self-center'>";
                            if($_SESSION["user_id"] == $row[5]){
                                echo "<a href='editpost.php?id=$row[2]' class='btn btn-warning btn-sm me-1'><i class='bi bi-pencil-fill'></i></a>";
                            }
                            echo "<button class='btn btn-danger btn-sm me-3 ' data-bs-toggle='modal' data-bs-target='#deletePostModal$row[2]'><i class='bi bi-trash'></i></button></div>";
                            echo "<div class='modal fade' id='deletePostModal$row[2]' tabindex='-1' aria-labelledby='deletePostModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h1 class='modal-title fs-5 text-danger' id='exampleModalLabel'>[ DANGER!! ] ต้องการที่จะลบกระทู้นี้ หรือไม่!!!</h1>
                                                <button type='button' id='modalclosebtn' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body bg-light'>
                                                <div>
                                                    [$row[0]] <span class='text-primary'>$row[1]</span>
                                                    <br>
                                                    $row[3] - $row[4]
                                                </div>
                                            </div>
                                            <div class='modal-footer d-flex justify-content-center'>
                                                <a href='delete.php?id=$row[2]' onclick='return deleteCon()' class='btn btn-danger'>Delete</a>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                        
                    }
                    echo "</td></tr>";
            }
            $conn = null;
            //<a href='delete.php?id=$row[2]' class='btn btn-danger'>Delete</a>

            // for($j = 1; $j <= 10; $j++)
            // {
            //     echo "<tr><td class='d-flex justify-content-between'><a href='post.php?id=".$j."' style='text-decoration: none;'>กระทู้ที่ $j</a>";
            //     if(isset($_SESSION["id"]) && $_SESSION["role"] == "a")
            //     {
            //         echo "&nbsp&nbsp&nbsp&nbsp<a href = delete.php?id=$j class='btn btn-danger btn-sm me-3'><i class='bi bi-trash'></i></a>";
            //     }
            //     echo "</td></tr>";
            // }
            ?>
        </table>
    </div>
    </div>
</body>

</html>