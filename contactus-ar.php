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
    <link rel="stylesheet" href="css/contactus.css">
    
    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">


</head>

<body>
    <section class="contact">
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
                                    </li>
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
                                        <a class="nav-link sign-out" href="logout.php">خروج</a>
                                   </li>
                                ';
                            }else if ($_SESSION["type"] == "2"){
                                echo '
                                    <li class="nav-item active mx-2">
                                        <a class="nav-link" href="employees.php">الموظفين</a>
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

        <section id="contactUs" class="contact-us">
            <div class="layer"></div>
            <div class="container-fluid">
                <div class="row map">

                    <div class="col-lg-5  info">
                        <div class="row">
                            <div class="col-md-12 m-auto">
                                <p><span><i class="icofont-location-pin"></i></span><span> شارع 26 وادى النيل - المعادي ، القاهرة </span></p>

                            </div>
                            <div class="col-md-12 m-auto">
                                <p><span>  20223807075</span><span><i class="icofont-telephone"></i></span> </p>
                            </div>
                            <div class="col-md-12 m-auto">
                                <p> <span> 201093003177</span><span><i class="icofont-ui-call"></i></span></p>
                                <p><span>  201093003177</span><span><i class="icofont-ui-call"></i></span></p>

                            </div>
                            <div class="col-md-12 m-auto">
                                <a href="http://purevisionegypt.com"> <span> www.purevisionegypt.com </span><span><i class="icofont-globe"></i></span></a>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-5 col-sm-12 pt-5 ml-auto form-border">
                        <div class="contact-form">
                            <div class="titles">
                                <h2 class="mb-3 text-center"><b>اتصل بنا</b></h2>
                                <p class="text-center mb-5">وسوف نتواصل معكم قريبا</p>
                            </div>

                            <form method="post" action="requestmessage.php" class="pt-4">
                                <div class="py-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">الاسم</label>
                                        <input type="text"  name="username" class="form-control border-bottom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">البريد الاليكتروني</label>
                                        <input type="email"  name="email" class="form-control border-bottom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">رسالتك</label>
                                        <textarea class="form-control border-bottom" rows="5" maxlength="700" name="message"></textarea>
                                    </div>
                                    <div class="m-auto text-center mt-3">
                                        <button type="submit" class="btn btn-info mt-3" name="sabreq">إرسال</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-md-2"></div>


                </div>
            </div>

        </section>
    </section>


    <section class="map mt-5">
    <div class=""><h2 class="pl-3 pb-3">اين نحن</h2></div>
        <div class="container-fluid my-5">
            <div class="row">
                <div class="col-md-12 frame">
                    
                        <iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.709211307423!2d31.25520809619822!3d29.959902625643007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU3JzM0LjkiTiAzMcKwMTUnMjUuMSJF!5e0!3m2!1sen!2seg!4v1539824914592" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>


    <!--
    <section class="map">
        <div class="container-fluid my-1 py-5">
            <div class="row">

                <div class="col-md-6 frame">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.709211307423!2d31.25520809619822!3d29.959902625643007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU3JzM0LjkiTiAzMcKwMTUnMjUuMSJF!5e0!3m2!1sen!2seg!4v1539824914592" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <div class="col-md-6 info">
                    <div class="row">
                        <div class="col-md-12 m-auto">
                            <p><span><i class="icofont-location-pin"></i> 26st. wadi El-Nile - Maadi, Cairo</span></p>

                        </div>
                        <div class="col-md-12 m-auto">
                            <p><span><i class="icofont-telephone"></i> +20223807075 </span> </p>
                        </div>
                        <div class="col-md-12 m-auto">
                            <p> <span><i class="icofont-ui-call"></i> 201093003177</span></p>
                            <p><span> <i class="icofont-ui-call"></i> 201093003177</span></p>

                        </div>
                        <div class="col-md-12 m-auto">
                            <a href="http://purevisionegypt.com"> <span><i class="icofont-globe"></i> www.purevisionegypt.com </span></a>
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
    
    <script>
        $('.frame').hover(function(){
            $('iframe').removeClass('gmap');
                          
        });
        $( ".frame" ).mouseleave(function(){
            $('iframe').addClass('gmap');
        
        });
        
//        $(".contact-form").hover(function(){
//           $(".contact-us").css("background-image","url('imges/contactus3-hover.jpg')") ;
//        });
//         $( ".contact-form" ).mouseleave(function(){
//            $(".contact-us").css("background-image","url('imges/contactus3.jpg')") ;
//        
//        });
    
    </script>
</body>

</html>
