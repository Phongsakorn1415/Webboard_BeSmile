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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/icons/font/bootstrap-icons.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>
    <div class="container-lg">
        <h1 class="mt-3 mb-3" style="text-align: center;">BeSmile WebBoard</h1>

        <?php include "nav.php";?>    

        

        <div class="row mt-4"> <!-- register card -->
            <div class="col-lg-3 col-md-2 col-sm-1 col-1">
                <a href="javascript:history.back()" class="btn btn-secondary btn-sm me-2"><i class="bi bi-arrow-bar-left"></i> ย้อนกลับ</a>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-10 col-10">
                
                <?php 
                    if(isset($_SESSION['new_register'])){
                        if($_SESSION['new_register'] == "error"){
                            echo "  <div class='alert alert-danger'>
                                        ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา กรุณาลองใหม่อีกครั้ง
                                    </div>";
                        }
                        else{
                            echo "  <div class='alert alert-success'>
                                        สมัครสมาชิกเรียบร้อย
                                    </div>";
                        }
                        unset($_SESSION['new_register']);
                    }?>  

                <div class="card border-primary bg-light text-dark">
                    <div class="card-header bg-primary text-white">สมัครสมาชิก</div>
                    <div class="card-body">
                        <form action="register_save.php" method="post">
                            <div class="row">
                                <label for="login" class="col-lg-3 col-form-label">ชื่อบัญชี:</label>
                                <div class="col-lg-9">
                                    <input type="text" name="username" id="login" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="password" class="col-lg-3 col-form-label">รหัสผ่าน:</label>
                                <div class="col-lg-9">
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="name" class="col-lg-3 col-form-label">ชื่อ-นามสกุล:</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="name" class="col-lg-3 form-label">เพศ:</label>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="m" class="form-check-input" required>
                                        <label class="form-check-label">ชาย</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="f" class="form-check-input" required>
                                        <label class="form-check-label">หญิง</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="o" class="form-check-input" required>
                                        <label class="form-check-label">อื่นๆ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="email" class="col-lg-3 col-form-label">อีเมล:</label>
                                <div class="col-lg-9">
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-sm me-2"><i class="bi bi-save"></i> สมัครสมาชิก</button>
                                    <button type="reset" class="btn btn-danger btn-sm"><i class="bi bi-x-square"></i> ล้างข้อมูล</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1 col-1"></div>
        </div>
        <br>
        <!-- <div style="text-align: center;">
            <a href="index.php">กลับไปหน้าหลัก</a>
        </div> -->
    </div>
</body>

</html>
<?php } ?>