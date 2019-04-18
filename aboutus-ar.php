<?php
require './checksession.php';

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/icofont/icofont.min.css">
    <link rel="shortcut icon" href="imges/search.png">
        <title>SuperCareer</title>
    <link rel="stylesheet" href="css/aboutus.css">

    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">


</head>

<body>

    <section class="header">
        <nav class="navbar navbar-expand-lg p-0 scroll-nav">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent, #navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="icofont-navigation-menu"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto ">

                        <?php
                            if (!isset($_SESSION["type"]) ){

                                echo '
//                                    <li class="nav-item active mx-2">
//                                        <a class="nav-link" href="signup-ar.php">Home</a>
//                                    </li>
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link" href="aboutus-ar.php">من نحن</a>
                                    </li>
                                    <li class="nav-item active mx-2">
                                         <a class="nav-link" href="contactus-ar.php">اتصل بنا</a>
                                    </li>
                                ';
                            }else{
                                if ($_SESSION["type"] == "3"){
                                    echo '
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link" href="profile-ar.php">الصفحة الشخصية</a>
                                    </li>
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link" href="aboutus-ar.php">من نحن</a>
                                    </li>
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link" href="contactus-ar.php">اتصل بنا</a>
                                    </li>
                                        <li class="nav-item active mx-2">
                                        <a class="nav-link sign-out" href="logout.php">خروج</a>
                                   </li>
                                ';
                                }else if ($_SESSION["type"] == "2"){
                                    echo '
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link" href="employees-ar.php">الموظفين</a>
                                    </li>
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link" href="aboutus-ar.php">من نحن</a>
                                    </li>
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link" href="contactus-ar.php">اتصل بنا</a>
                                    </li>
                                        <li class="nav-item active mx-2">
                                        <a class="nav-link sign-out" href="logout.php">خروج</a>
                                   </li>
                                ';
                                }


                            }
                        ?>



                    </ul>
                </div>

            </div>
        </nav>

    </section>

    <section class="about-us mb-4">
        <div class="container-fluid px-0">
            <div class="row bg-img ">


            </div>
        </div>
        <div class="container about-txt">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-5 mt-1"><b>من نحن</b></h2>
                    <p>الرؤية النقية شركة متخصصة في تقديم خدمات تصميم مواقع الإنترنت وتطويرها، نحن شركة مبدعة تقدم خدمات كاملة ونستخدم وسائط رقمية متعددة لخلق حلول تسويقية وإعلانية مبتكرة لنشاطك التجاري.
نحن نقدم مجموعة كاملة من الخدمات التقنية سهلة الإستخدام مثل خدمات تصميم مواقع الإنترنت وتطويرها والإستضافة الموثوق بها لمواقع الإنترنت، ونظام تهيئة المواقع لملاءمة محركات البحث (SEO) وحلول التجارة الإلكترونية وتصميم شعارات مخصصة وعروض برمجيات الوسائط المتعددة المخزنة على أقراص مدمجة وغيرها من الخدمات.
كما تقدم خدمات مثل حلول لإدارة المحتوى (CMS) ذات طابع شخصي للغاية وعقود صيانة شاملة لمواقع الإنترنت وتقارير تعقب الإستخدام وتجميع تقارير استراتيجية لتسهيل اتخاذ قرارات عمل ذكية وخدمات أخرى كثيرة.</p>
                    <br>
                    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed commodo arcu, sed molestie elit. Nulla non placerat nibh. Pellentesque at eleifend metus. Vivamus aliquam enim risus, gravida dignissim ante bibendum ut. Aenean vitae laoreet ligula. Sed eget neque nisl. Phasellus condimentum commodo dictum. Aliquam erat volutpat. In hac habitasse platea dictumst.</p>-->

                </div>
            </div>
        </div>
    </section>

    <!--
      <section class="vision-mission">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pt-5">

                    <div class="vc-hover-box-wrapper shape-rouned align-center">
                        <div class="vc-hover-box">
                            <div class="vc-hover-box-inner">
                                <div class="vc-hover-box-front">
                                    <div class="vc-hover-box-front-inner">
                                        <img src="imges/img1-v2.jpg"/>
                                                    <h2>Mission</h2>
                                    </div>
                                </div>
                                <div class="vc-hover-box-back">
                                    <div class="vc-hover-box-back-inner">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed commodo arcu, sed molestie elit. Nulla non placerat nibh. Pellentesque at eleifend metus. Vivamus aliquam enim risus, gravida dignissim ante bibendum ut. Aenean vitae laoreet ligula. Sed eget neque nisl. Phasellus condimentum commodo dictum. Aliquam erat volutpat. In hac habitasse platea dictumst.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 pt-5">
                    <div class="vc-hover-box-wrapper shape-rouned align-center">
                        <div class="vc-hover-box">
                            <div class="vc-hover-box-inner">
                                <div class="vc-hover-box-front">
                                    <div class="vc-hover-box-front-inner">
                                        <img src="imges/vision-3.jpg" />
                                    </div>
                                </div>
                                <div class="vc-hover-box-back">
                                    <div class="vc-hover-box-back-inner">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed commodo arcu, sed molestie elit. Nulla non placerat nibh. Pellentesque at eleifend metus. Vivamus aliquam enim risus, gravida dignissim ante bibendum ut. Aenean vitae laoreet ligula. Sed eget neque nisl. Phasellus condimentum commodo dictum. Aliquam erat volutpat. In hac habitasse platea dictumst.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>
-->



<footer>
        <div class="container">

            <div class="row pt-4">
                <div class="col-md-4">
                    <h6>Explore</h6>
                    <a href="">
                        <p>Profile</p>
                    </a>
                    <a href="">
                        <p>Profile</p>
                    </a>
                    <a href="">
                        <p>Profile</p>
                    </a>

                </div>
                <div class="col-md-4">
                    <h6>About us</h6>
                    <a href="aboutus.php">
                        <p>About us</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <h6>Contact us</h6>
                    <a href="contactus.php">
                        <p>Contact us</p>
                    </a>
                    <div class="mt-5 icons">
                        <a href="https://www.facebook.com/Purevision-274076099895867/"><i class="icofont-facebook"></i></a>
                        <a href="https://twitter.com/purevision17"><i class="icofont-twitter"></i></a>
                        <a href=""><i class="icofont-linkedin"></i></a>
                        <a href="https://plus.google.com/u/0/103056900203929165300"><i class="icofont-google-plus"></i></a>

                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-2 pt-3">
                <div class="col-md-12 text-center">
                    <p class="allRights"> © 2019 Pure Vision Company All rights reserved.</p>
                </div>
            </div>

        </div>

    </footer>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
