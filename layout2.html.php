<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <title><?= isset($page_title) ? $meta_title :  site_name; ?> </title>
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
        <link rel="stylesheet" href="assets/datatable/datatables.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/floating-whatsapp/floating-wpp.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/custom.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/admin-style.css" />
    </head>
    <body>
        <div id="preloader" class="preloader">One moment please<br>
            <div class="preloader_circle"></div>
        </div>
        <div id="showbox"></div>
        <div class="blue-header">
            <div class="container">
                <div class="row remove-row-bottom">
                    <div class="col l6 hide-on-med-and-down">We are open Mondays to Fridays days a week from 8am - 5pm</div>
                    <div class="col l6 right-align hide-on-med-and-down"> 
                        <i class="fa fa-phone"></i> Call Us:  
                        <a href="tel:09058230000" class="mr-1">08000000000</a> 
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
                    <div class="col s6 show-on-small no-pad-left">  
                        &nbsp; <i class="fa fa-phone"></i> <a href="tel:08000000000" class="mr-1"> 08000000000</a> 
                    </div>
                    <div class="col s6 show-on-small">
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
                        <a href="dashboard"> <img src="<?= site_logo; ?>" class="logo wow fadeInUp"></a>
                    </div>
                    <div class="col l10 m5 s5 no-pad-right ">
                        <nav class="">
                            <div class="nav-wrapper">
                                <a href="#" data-activates="mobile-menu"  class="button-collapse right"><i class="fa fa-bars"></i> Menu</a>
                                <ul class="hide-on-med-and-down right">
                                    <?php //admin
                                    $permission_list = ["1"]; if(in_array($_SESSION["access_level"],$permission_list)):  ?>
                                        <li><a href="dashboard">Dashboard</a></li>
                                        <li><a href="orders">Orders</a></li>
                                        <li><a href="invoices">Invoices</a></li>
                                        <li><a href="withdrawal-requests">Withdrawals</a></li>
                                        <li><a href="transactions">Transactions</a></li>
                                        <li><a href="customers">Customers</a></li>
                                        <li><a href="staff">Staff</a></li>
                                        <li><a href="pricing-settings">Pricing Settings</a></li>
                                        <li><a href="sms">SMS</a></li>
                                        <li><a href="logout">Logout</a></li>
                                    <?php endif; ?>
                                   
                                    <?php //customer
                                    $permission_list = ["2"]; if(in_array($_SESSION["access_level"],$permission_list)):  ?>
                                        <li><a href="dashboard">Dashboard</a></li>
                                        <li><a href="transactions">Transactions</a></li>
                                        <li><a href="download-transactions">Download Transactions</a></li>
                                        <li><a href="logout">Logout</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </nav>
                        <ul id="mobile-menu" class="side-nav">
                            <?php //admin
                                $permission_list = ["1"]; if(in_array($_SESSION["access_level"],$permission_list)):  ?>
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="orders">Orders</a></li>
                                <li><a href="invoices">Invoices</a></li>
                                <li><a href="withdrawal-requests">Withdrawals</a></li>
                                <li><a href="transactions">Transactions</a></li>
                                <li><a href="customers">Customers</a></li>
                                <li><a href="staff">Staff</a></li>
                                <li><a href="sms">SMS</a></li>
                                <li><a href="pricing-settings">Pricing Settings</a></li>
                                <li><a href="logout">Logout</a></li>
                            <?php endif; ?>
                            
                            <?php //customer
                                $permission_list = ["2"]; if(in_array($_SESSION["access_level"],$permission_list)):  ?>
                                <li><a href="dashboard">Dashboard</a></li>
                                <li><a href="transactions">Transactions</a></li>
                                <li><a href="download-transactions">Download Transactions</a></li>
                                <li><a href="logout">Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                   
                </div>
            </div>
        </div>
        <?= $main_content; ?>
        

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
        <script src="assets/datatable/datatables.min.js"></script>
        <script src="assets/floating-whatsapp/floating-wpp.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" crossorigin="anonymous"></script>
        <script src="https://js.paystack.co/v1/inline.js"></script> 
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/admin.js"></script>
    </body>
</html>