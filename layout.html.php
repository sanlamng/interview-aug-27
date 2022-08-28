<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <title><?= isset($page_title) ? $page_title :  site_name; ?> </title>
        <link rel="shortcut icon" href="<?= site_logo; ?>" />
        <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css" />   
        <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css" />   
        <link rel="stylesheet" type="text/css" href="assets/lightbox/css/lightbox.min.css" /> 
        <link rel="stylesheet" type="text/css" href="assets/slider_pro/dist/css/slider-pro.min.css"/>  
        <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="assets/css/mystepper.css"/> 
        <link type="text/css" rel="stylesheet" href="assets/css/aos.css"/> 
        <link rel="stylesheet" type="text/css" href="assets/css/datepicker.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/floating-whatsapp/floating-wpp.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/custom.css" />
    </head>
    <body>
        <!-- <div id="WAButton"></div> 
        <div><input type="hidden" id="whatsapp_button" value="<?= $whatsapp_number; ?>"></div> -->
        <!-- preloader -->
        <div id="preloader" class="preloader">One moment please<br>
            <div class="preloader_circle"></div>
        </div>
        <div class="blue-header">
            <div class="container">
                <div class="row remove-row-bottom">
                    <div class="col l6 hide-on-med-and-down">We are open Mondays to Fridays days a week from 8am - 5pm</div>
                    <div class="col l6 right-align hide-on-med-and-down"> 
                        <i class="fa fa-phone"></i> Call Us:  
                        <a href="tel:08000000000" class="mr-1">08000000000</a> 
                        |  

                        <div class="login-and-signup wow fadeIn">
                            <?php if(isset($_SESSION["allow_user"]) && $_SESSION["allow_user"]==sitekey): ?> 
                            <div class="right custom-dropdown logged-in-user">
                                <img src="assets/img/avatar.png" class="circle-image-2">
                                <?= ucfirst($_SESSION["customer_name"]); ?>
                                <span><i class="fa fa-angle-down"></i></span>
                                <div class="custom-dropdown-content">
                                    <a href="dashboard">Dashboard</a>
                                    <a href="logout">Log out</a>
                                </div>
                                
                            </div>
                            <?php else: ?>
                                <a href="login" class="ml-1"><i class="fa fa-lock"></i> Login </a> 
                                <a href="signup" class="ml-1"><i class="fa fa-user"></i> Sign Up </a> 
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <div class="col s5 show-on-small no-pad-left">  
                       
                    </div>
                    <div class="col s7 show-on-small">
                        <div class="login-and-signup wow fadeIn">
                            <?php if(isset($_SESSION["allow_user"]) && $_SESSION["allow_user"]==sitekey): ?> 
                            <div class="right custom-dropdown logged-in-user">
                                <img src="assets/img/avatar.png" class="circle-image-2">
                                <?= ucfirst($_SESSION["customer_name"]); ?>
                                <span><i class="fa fa-angle-down"></i></span>
                                <div class="custom-dropdown-content">
                                    <a href="dashboard">Dashboard</a>
                                    <a href="logout">Log out</a>
                                </div>
                                
                            </div>
                            <?php else: ?>
                                <a href="login" class="ml-1"><i class="fa fa-lock"></i> Login </a> 
                                <a href="signup" class="ml-1"><i class="fa fa-user"></i> Sign Up </a> 
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-header-area">
            <div class="container">
                <div class="row">
                    <div class="col l2 m7 s7" data-aos="fade-down">
                        <a href="index"> <img src="<?= site_logo; ?>" class="logo wow fadeInUp"></a>
                    </div>
                    <div class="col l10 m5 s5 no-pad-right ">
                        <nav class="">
                            <div class="nav-wrapper">
                                <a href="#" data-activates="mobile-menu"  class="button-collapse right"><i class="fa fa-bars"></i> Menu</a>
                                <ul class="hide-on-med-and-down center">
                                    <li class="login-and-signup"><a href="signup" class="login">Sign Up</a></li>
                                    <li class="login-and-signup"><a href="order" class="login">Login</a></li>
                                    
                                </ul>
                            </div>
                        </nav>
                        <ul id="mobile-menu" class="side-nav">
                            
                            <li><a href="signup">Sign Up</a></li>
                            <li class="login-and-signup"><a href="login" class="login">Login</a></li>
                        </ul>
                    </div>
                   
                </div>
            </div>
        </div>
        <?= $main_content; ?>
        <div class="bottom-grey-curve ">
            Copyright &copy;
            <?= date("Y") . " ".  site_name; ?>.  All rights reserved.
        </div>
        

        <?php include 'templates/modals.php'; ?>
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/materialize.min.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/owl.carousel2.thumbs.min.js"></script>
        <script src="assets/lightbox/js/lightbox.min.js"></script>
        <script src="assets/slider_pro/dist/js/jquery.sliderPro.min.js"></script>
        <script src="assets/js/mystepper.js"></script>
        <script src="assets/js/datepicker.min.js" ></script>
        <script src="assets/js/resumable.js"></script>
        <script src="assets/js/jquery.show-more.js"></script>
        <script src="assets/floating-whatsapp/floating-wpp.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>