<nav class="navbar navbar-expand-lg mb-3" style="background-color: #d3d3d3;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
        <ul class="navbar-nav">
            <?php
                if(!isset($_SESSION["id"])) {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="login.php"><i class="bi bi-pencil-square"></i> เข้าสู่ระบบ</a>
                    </li>
            <?php
                }else{
            ?>
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-lines-fill"></i> <?php echo $_SESSION["username"] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                                if($_SESSION['role'] == "a"){
                                    ?>
                                    <li><a class="dropdown-item" href="category.php"><i class="bi bi-bookmarks"></i> จัดการหมวดหมู่</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-check"></i> จัดการผู้ใช้งาน</a></li>
                                    <?php
                                }
                            ?>
                            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i> ออกจากระบบ</a></li>
                        </ul>
                    </li>
            <?php
                }
            ?>
        </ul>
    </div>
</nav>
<div class="Navbtn" id="mininav" style="display: none;">
    <!-- <a href="javascript:history.back()" class="btn btn-secondary"><i class="bi bi-arrow-bar-left"></i></a> -->
    <a href="index.php" class="btn btn-primary" id="HomeBtn"><i class="bi bi-house-door-fill"></i> Home</a>
    <button class="btn btn-primary" onclick="topFunction()"><i class="bi bi-arrow-up-square"></i></button>
</div>

<script>
    let mybutton = document.getElementById("mininav");
    let fileName = location.href.split("/").pop().split("?").shift();
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            mybutton.style.display = "block";
            if(fileName == "index.php"){
                HomeBtn.style.display = "none";
            }
        
        } else {
            mybutton.style.display = "none";
        }
    }

// When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>