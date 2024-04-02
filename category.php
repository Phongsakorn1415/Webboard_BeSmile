<?php
    session_start();

    if($_SESSION['role'] != "a"){
        header("location:index.php");
    }
    else{
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
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">

                <?php 
                    if(isset($_SESSION['new_cat'])){
                        echo "  <div class='alert alert-success'>
                                    เพิ่มหมวดหมู่เรียบร้อยแล้ว
                                </div>";
                        unset($_SESSION['new_cat']);
                    }?>  

                <table class="table table-striped mt-4 text-center">
                    <tr>
                        <th style="width:10%">ลำดับ</th>
                        <th style="width:auto">ชื่อหมวดหมู่</th>
                        <th style="width:10%">จัดการ</th>
                    </tr>
                    <?php
                        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                        $sql = "SELECT * FROM category
                                ORDER BY id";
             
                        $result = $conn->query($sql);
                        while($row = $result->fetch()){
                            echo "<tr>
                                    <td>
                                        $row[0]
                                    </td>
                                    <td>
                                        $row[1]
                                    </td>";
                            if(isset($_SESSION["id"]))
                            {
                                if($_SESSION["role"] == "a"){
                                    echo "  <td class='align-self-center d-flex justify-content-center'>
                                                <button class='btn btn-warning btn-sm me-1'><i class='bi bi-pencil-fill'></i></button>
                                                <button class='btn btn-danger btn-sm me-3' onclick='deleteCon()'><i class='bi bi-trash'></i></button>
                                            </td>";
                                }
                            }
                            echo "</tr>";
                        }
                        $conn = null;
                    ?>
                </table>
                <!-- Button trigger modal -->
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-bookmark-plus"></i> เพิ่มหมวดหมู่ใหม่
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="category_save.php" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มหมวดหมู่ใหม่</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="category" class="form-label">ชื่อหมวดหมู่:</label>
                                        <input type="text" name="catName" id="category" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div>
</body>

</html>
<?php } ?>