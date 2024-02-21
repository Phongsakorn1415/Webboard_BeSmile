<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeSmile Webboard</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                    --ทั้งหมด--
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                    <li><a class="dropdown-item" href="#">เรื่องทั่วไป</a></li>
                    <li><a class="dropdown-item" href="#">เรื่องเรียน</a></li>
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
            for($j = 1; $j <= 10; $j++)
            {
                echo "<tr><td class='d-flex justify-content-between'><a href='post.php?id=".$j."' style='text-decoration: none;'>กระทู้ที่ $j</a>";
                if(isset($_SESSION["id"]) && $_SESSION["role"] == "a")
                {
                    echo "&nbsp&nbsp&nbsp&nbsp<a href = delete.php?id=$j class='btn btn-danger btn-sm me-3'><i class='bi bi-trash'></i></a>";
                }
                echo "</td></tr>";
            }?>
        </table>
    </div>
    </div>
</body>

</html>