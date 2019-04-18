<?php
require './checksession.php';

if(!isset($_SESSION["id"])) {
    header("location:signup.php");

}else{

}


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
     <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">
    <link rel="stylesheet" href="css/new-password.css">

</head>

<body>
    <section class="header">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container">
                <a class="navbar-brand" href="#">Logo</a>
            </div>
        </nav>
    </section>


    <section class="container form-container mb-5">
        <div class="row mt-5">
            <div class="col-md-6 col-10 m-auto pass-inputs">

                <div class="row mt-4 mb-3">
                    <div class="col-md-12 px-0 text-center">
                        <h3> تعيين كلمة سر جديدة</h3>
                    </div>

                </div>


                <form action="newpassword2.php" method="post">
                
                    <div class="form-group">
                        <label>كلمة السر الجديدة</label>
                        <input type="password" class="form-control" id="newPassword" placeholder="" name="newpassword" required>
                    </div>
                    <div class="form-group">
                        <label>تأكيد كلمة السر</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="" name="confirmpassword" required>
                    </div>
                    <span class="error-msg"><i class="icofont-warning-alt"></i>كلمات السر غير متطابقة</span>
                    <div class="text-center mt-3">

                        <input type="submit" class="btn btn-primary" name="fropassword" value="تغيير">
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

            $('.submit-btn').click(function() {
                if ($('#newPassword').val() != $('#confirmPassword').val() && ($('#newPassword').val() != "") && ($('#confirmPassword').val() != "")) {
                    $('.error-msg').css('opacity', '1');
                }
            });
        });

    </script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>

</body>

</html>
