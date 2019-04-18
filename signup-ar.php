<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/icofont/icofont.min.css">
    <link rel="shortcut icon" href="imges/search.png">
    <title>SuperCareer</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">


</head>

<body>

    <section class="header">
        <nav class="navbar navbar-expand-lg p-0 scroll-nav">
            <div class="container">
                <!--                <a class="navbar-brand" href="#"><i class="icofont-bag-alt"></i><span>W</span>azeftk</a>-->
                <!--                <a class="navbar-brand" href="#"><span class="j">J</span>obSquare<span>  </span><i class="icofont-square"></i></a>-->
                <a class="navbar-brand " href="#">Logo</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent, #navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="icofont-navigation-menu"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item active mx-2">
                            <a class="nav-link" href="aboutus.php">من نحن</a>
                        </li>
                        <li class="nav-item active mx-2">
                            <a class="nav-link" href="contactus.php">اتصل بنا</a>
                        </li>
                        <!--
                        <li class="nav-item active mx-2">
                            <a class="nav-link sign-out" href="logout.php">Sign Out</a>
                        </li>
-->

                    </ul>
                </div>
                
            </div>
        </nav>


    </section>

    <section class="signup">
        <div class="layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h2 class="firstspan"><span class="get-span">احصل</span></h2>
                            <br>
                            <h2><span class="thebest-span">علي افضل</span></h2>
                            <br>
                            <h2><span class="inegypt-span">! الوظائف</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn signup-btn" data-toggle="modal" data-target="#exampleModalCenter">
            <b> انشاء حساب/ تسجيل دخول </b>
        </button>
    </section>

    <!-- Modal -->
    <div class="modal fade signup-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content mx-auto">
                <div class="modal-header pl-0">

                    <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin" aria-selected="true">تسجيل دخول</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">اشتراك</a>
                        </li>

                    </ul>
                </div>
                <!--Sign in-->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab">
                        <div class="modal-body">

                            <!--
                            <div class="login-btns text-center mb-4">
                                <p>Sign in with</p>
                                <button type="button" class="btn fb-btn ">
                                    <span class="btn fb-span"><i class="fab fa-facebook-f fa-lg p-2"></i> </span>
                                    <span class="px-2"> Facebook</span>
                                </button>

                                <button type="button" class="btn g-btn ">
                                    <span class="btn g-span"><i class="fab fa-google fa-lg p-2"></i> </span>
                                    <span class="px-2"> Google</span>
                                </button>
                            </div>
                            <h4><span>OR</span></h4>
-->
                            <form action="loguser.php" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" value="<?php if (isset($_COOKIE['email'])){echo $_COOKIE['email']; } ?>" class="form-control" aria-describedby="emailHelp" placeholder="البريد الاليكتروني" required>

                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" value="<?php if (isset($_COOKIE['password'])){echo $_COOKIE['password']; } ?>" class="form-control" id="currentPassword" placeholder="كلمة السر" required>
                                </div>
<!--
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" <?php if (isset($_COOKIE['email'])){echo 'checked' ; } ?> name="remember" value="1">
                                    <label class="form-check-label" for="remember">تذكرني</label>
                                </div>
-->
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-2 pr-0">
                                            <input type="checkbox" class="form-check-input" id="remember"  <?php if (isset($_COOKIE['email'])){echo 'checked' ; } ?>   name="remember" value="1">
                                        
                                        </div>
                                        <div class="col-10 pl-0">
                                            <label class="form-check-label" for="remember">تذكرني</label>
                                        </div>
                                    
                                    </div></div>
                                <div class="submit-btn">
                                    <button type="submit" name="login" class="btn btn-primary">دخول</button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Sign up -->
                    <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                        <div class="modal-body">

                            <!--
                            <div class="login-btns text-center mb-4">
                                <p>Sign up with</p>
                                <button type="button" class="btn fb-btn ">
                                    <span class="btn fb-span"><i class="fab fa-facebook-f fa-lg p-2"></i> </span>
                                    <span class="px-2"> Facebook</span>
                                </button>

                                <button type="button" class="btn g-btn ">
                                    <span class="btn g-span"><i class="fab fa-google fa-lg p-2"></i> </span>
                                    <span class="px-2"> Google</span>
                                </button>
                            </div>
                            <h4><span>OR</span></h4>
-->
                            <form action="insertlogin.php" method="post" id="signUpForm">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="الاسم" required>

                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="البريد الاليكتروني" required>

                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="كلمة السر" required>
                                    <small></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="repassword" class="form-control" id="newPassword" placeholder="تأكيد كلمة السر" required>
                                    <span class="error-msg"><i class="icofont-warning-alt"></i> كلمات السر غير متطابقة! </span>
                                </div>
                                <!--<div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>-->
                                <div class="submit-btn">
                                    <button type="submit" name="signup" class="btn btn-primary">تسجيل</button>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <section id="aboutUs" class="about-us mt-5 mb-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt-5 mx-3">
                    <h2 class="mb-5"><b>من نحن</b></h2>
                    <p>
الرؤية النقية شركة متخصصة في تقديم خدمات تصميم مواقع الإنترنت وتطويرها، نحن شركة مبدعة تقدم خدمات كاملة ونستخدم وسائط رقمية متعددة لخلق حلول تسويقية وإعلانية مبتكرة لنشاطك التجاري.
نحن نقدم مجموعة كاملة من الخدمات التقنية سهلة الإستخدام مثل خدمات تصميم مواقع الإنترنت وتطويرها والإستضافة الموثوق بها لمواقع الإنترنت، ونظام تهيئة المواقع لملاءمة محركات البحث (SEO) وحلول التجارة الإلكترونية وتصميم شعارات مخصصة وعروض برمجيات الوسائط المتعددة المخزنة على أقراص مدمجة وغيرها من الخدمات.
كما تقدم خدمات مثل حلول لإدارة المحتوى (CMS) ذات طابع شخصي للغاية وعقود صيانة شاملة لمواقع الإنترنت وتقارير تعقب الإستخدام وتجميع تقارير استراتيجية لتسهيل اتخاذ قرارات عمل ذكية وخدمات أخرى كثيرة.
                    </p>

                </div>
            </div>
        </div>
    </section>


    <section class="register mb-5">
        <div class="container-fluid text-center register-container">
            <div class="row justify-content-center">
                <div class="col- register-col">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenter" class="register-now px-3 py-2">!سجل الان </a>
                </div>

            </div>

        </div>

    </section>

    <section id="contactUs" class="contact-us pt-4 pb-5 mb-5">
        <div class="container-fluid">
            <div class="m-auto text-center">
                <h2 class="my-5"><b>ابقى على تواصل</b></h2>
            </div>

        </div>

        <div class="container">


            <div class="row">

                <div class="col-md-6">
                    <div class="pt-5">
                        <div class="">
                            <h4 class="my-5"><b>تواصل معنا</b></h4>
                        </div>

                        <form method="post" action="requestmessage.php">
                            <div class="py-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">الاسم</label>
                                    <input type="text" class="form-control border-bottom" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">البريد الاليكتروني</label>
                                    <input type="email" class="form-control border-bottom" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">رسالتك</label>
                                    <textarea class="form-control border-bottom" rows="6" maxlength="500" name="message"></textarea>
                                </div>
                                <div class="m-auto text-center mt-3">
                                    <button type="submit" class="btn btn-info mt-3 py-2" name="sabreq">تسجيل</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pt-5 h-100">
                        <div class="">
                            <h4 class="my-5"><b>اين نحن</b></h4>
                        </div>
                        <iframe class="border" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.709211307423!2d31.25520809619822!3d29.959902625643007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU3JzM0LjkiTiAzMcKwMTUnMjUuMSJF!5e0!3m2!1sen!2seg!4v1539824914592" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>

    </section>

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
                        <a href=""><i class="icofont-facebook"></i></a>
                        <a href=""><i class="icofont-twitter"></i></a>
                        <a href=""><i class="icofont-linkedin"></i></a>
                        <a href=""><i class="icofont-google-plus"></i></a>

                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-2 pt-3">
                <div class="col-md-12  text-center">
                    <p class="allRights"> © 2019 Pure Vision Company All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scroll.js"></script>

    <script>
        $(document).ready(function() {
            $('#signUpForm').on("submit", function() {

                if ($('#password').val() != $('#newPassword').val() && ($('#newPassword').val() != "") && ($('#password').val() != "")) {
                    $('.error-msg').css('opacity', '1');
                    return false;
                } else {
                    return true;
                }
                $('#signUpForm').submit();
            });
        });

    </script>

</body>

</html>
