<?php 
    session_start();
    if(empty($_SESSION["isLogged"]) || $_SESSION["isLogged"] == ''){
        session_destroy();
        echo "<script type='text/javascript'> document.location = 'SignUp.php'; </script>";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <script src="../JS/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c7c1f79dbd.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/font-awesome.css">
    <link rel="stylesheet" href="../CSS/indexStyles.css">
    <link rel="stylesheet" href="../CSS/HomeStyles.css">
    <script src="../JS/HomeSearchJS.js"></script>
</head>

<body>
    <header>
        <p class="logo">LifeSource</p>
        <nav>
            <a href="#">Home</a>
            <a href="#">Services</a>
            <a href="#">About Us</a>
            <form id="logout" action="processSignUp-Login.php" method="Post">
                <input type="hidden" name="Operation" value="Logout">
                <a onclick="document.getElementById('logout').submit();" href="#">Logout</a>
            </form>
        </nav>

        <div class="banner">
            <div class="heading_content">
                <h1>We help patients reach available donors</h1>

                <form id="searchForm" action="" method="post">
                    <input id="bloodType" type="hidden" name="id" value=<?php echo $_SESSION['blood'] ; ?>>
                    <a href="#" id="getDonorsBtn" class="btn">
                        <span><i class="fas fa-search"></i></span>
                        Find matching donors ?
                    </a>
                </form>
            </div>

            <div class="banner_bg">
                <img src="../IMG/bannerBG.jpg" class="small_bg">
            </div>
        </div>
    </header>

    <div class="container">
        <div class="stackCards">             
        </div>           
    </div>
 
    <footer>
        <div class="footer_container">
            <h3>LifeSource</h3>
            <p>We are happy to get your inquiries and feedback anytime.</p>
            <!-- <ul>
                            <li><a href="#" class="social_icons"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="social_icons"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="social_icons"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="social_icons"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="social_icons"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul> -->
            <a href="#" class="btn btn_secondary">Contact Us</a>
        </div>
    </footer>
</body>

</html>