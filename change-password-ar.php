<?php

require './checksession.php';

if(!isset($_SESSION["id"])   ) {
    header("location:signup.php");

}else{

}
require './db/connect.php';
$selct="SELECT * FROM users ";
$runsel=mysqli_query($con, $selct);


?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/icofont/icofont.min.css">
    <link rel="shortcut icon" href="imges/search.png">
    <title>SuperCareer</title>

    <link rel="stylesheet" href="css/change-password.css"/>
    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">

</head>

<body>
    <section class="header">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent, #navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-white"><i class="icofont-navigation-menu"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto ">
                        
                         <li class="nav-item mx-2">
                            <a class="nav-link" href="profile.php">ملفي الشخصي</a>
                        </li>
                        <li class="nav-item active mx-2">
                            <a class="nav-link" href="aboutus.php">من نحن</a>
                        </li>
                        <li class="nav-item active mx-2">
                            <a class="nav-link" href="contactus.php">اتصل بنا</a>
                        </li>
                        <li class="nav-item active mx-2">
                            <a class="nav-link sign-out" href="logout.php">خروج</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </section>


    <section class="container form-container mb-5">
        <div class="row mt-5">
            <div class="col-md-6 col-10 m-auto pass-inputs">
                <div class="row">
                    <div class="col-md-1 px-0">
                        <div class="back-btn">
                    <a href="profile-ar.php" data-toggle="tooltip" data-placement="bottom" title="Back">
                        <i class="icofont-hand-drawn-left"></i>
                    </a>
                </div>
                    </div>
                    </div>
                    <div class="row mt-4 mb-3">
                    <div class="col-md-12 px-0 text-center">
                        <h3>إعادة تعيين كلمة المرور</h3>
                    </div>
                
                </div>
                
                
                <form action="resetpassword.php" method="post">
                    <div class="form-group">
                        <label>كلمة المرور الحالية</label>
                        <input type="password" class="form-control" id="currentPass" placeholder="" name="currentpassword" required>

                    </div>
                    <div class="form-group">
                        <label>كلمة المرور الجديدة</label>
                        <input type="password" class="form-control" id="newPassword" placeholder="" name="newpassword" required>
                    </div>
                    <div class="form-group">
                        <label>تأكيد كلمة المرور</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="" name="confirmpassword" required>
                    </div>
                    <span class="error-msg"><i class="icofont-warning-alt"></i>كلمات السر غير متطابقة</span>
                    <div class="text-center mt-5">

                        <input type="submit" class="btn btn-primary" name="submit" value="حفظ">
                    </div> 

                </form>

            </div>

        </div>

    </section>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {
            
            $('.submit-btn').click(function(){
                if ($('#newPassword').val() != $('#confirmPassword').val() && ($('#newPassword').val() != "") && ($('#confirmPassword').val() != "")) {
                    $('.error-msg').css('opacity','1');
                }
            });
        });

    </script>
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>
