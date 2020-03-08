<!DOCTYPE html>
<html lang="en">
<head>
    <title>Classical Music</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/linearicons.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/nice-select.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/animate.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/main.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR."/"?>css/style.css">
    <script src="<?php echo PUBLIC_DIR."/"?>js/vendor/jquery-2.2.4.min.js"></script>
</head>
<body>

<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="<?php echo WEBROOT?>"><img src="<?php echo PUBLIC_DIR."/"?>img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="<?php echo WEBROOT?>">Головна</a></li>
                    <li><a href="about.html">Композитори</a></li>
                    <li><a href="<?php echo WEBROOT.'compositions'?>">Відомі твори</a></li>
                    <li><a href="service.html">Ноти</a></li>
                    <li><a href="team.html">Сучасна класична музика</a></li>
                    <li><a href="<?php echo WEBROOT.'forum'?>">Форум</a></li>
                    <li><a href="<?php echo WEBROOT.'post'?>">Новини</a></li>
                    <li><a href="contact.html">Контакти</a></li>
                    <?php
                    if(!isset($_SESSION["id"])){
                        $link = WEBROOT."login";
                        echo "<li><a href=\"$link\">Авторизація</a></li>";
                    } else {
                        $link = WEBROOT."login/logout";
                        echo "<li><a href=\"$link\">Вихід</a></li>";
                    }
                    ?>

                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->
<?php

echo $content_for_layout;
?>


<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Features</h6>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Resources</h6>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>
                    <div class="" id="mc_embed_signup">
                        <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                            <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/easing.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/hoverIntent.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/superfish.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/owl.carousel.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/jquery.sticky.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/jquery.nice-select.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/waypoints.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/jquery.counterup.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/parallax.min.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/mail-script.js"></script>
<script src="<?php echo PUBLIC_DIR."/"?>js/main.js"></script>
</body>
</html>
