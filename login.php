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
    <title>BeSmile Login</title>
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

        <div class="row mt-4"> <!-- Login card -->
            <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
            <div class="col-lg-4 col-md-6 col-sm-8 col-10">

            <?php if(isset($_SESSION["error"]))
            {
                echo "<div class='alert alert-danger'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
                unset($_SESSION["error"]);
            } ?>

                <div class="card bg-light text-dark">
                    <div class="card-header">เข้าสู่ระบบ</div>
                    <div class="card-body">
                        <form action="verify.php" method="post">
                            <div class="form-group">
                                <label for="login" class="form-label">Username:</label>
                                <input type="text" name="username" id="login" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="passwd" class="form-label">Password:</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="passwd" class="form-control">
                                    <span class="input-group-text input-group-text-btn" onclick="pass_show_hide()">
                                        <i class="bi bi-eye-fill" id="passShow"></i>
                                        <i class="bi bi-eye-slash-fill d-none" id="passHide"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mt-3 d-flex justify-content-center">
                                <input type="submit" value="Login" class="btn btn-success me-2">
                                <input type="reset" value="Reset" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
        </div>
        <br>
        <div style="text-align: center;">
            ถ้ายังไม่ได้เป็นสมาชิก <a href=" register.php " class="btn btn-primary ms-1">กรุณาสมัครสมาชิก</a><br><br>
            <!--<a href="index.php">กลับไปหน้าหลัก</a>-->
        </div>
    </div>
    <script>
        function pass_show_hide(){
            let x = document.getElementById("passwd");
            let passShow = document.getElementById("passShow");
            let passHide = document.getElementById("passHide");
            passHide.classList.remove("d-none");
            if(x.type === "password"){
                x.type = "text";
                passShow.style.display = "none";
                passHide.style.display = "block";
            }
            else{
                x.type = "password";
                passShow.style.display = "block";
                passHide.style.display = "none";
            }
        }
    </script>
</body>

</html>
<?php } ?>