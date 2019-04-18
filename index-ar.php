<?php
require './db/connect.php';
require './checksession.php';

if(!isset($_SESSION["id"])  ) {
    header("location:signup.php");
}


?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Open+Sans" rel="stylesheet">
    <link rel="shortcut icon" href="imges/search.png">
    <title>SuperCareer</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">

    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/icofont/icofont.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="header">

        <nav class="navbar navbar-expand-lg  navbarmenu">

            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent, #navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><i class="icofont-navigation-menu text-white"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto">
                        <div class="nav flex-column nav-pills mobile-nav bignav " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <!--                 ------------- General-Infromation  ---------------------      -->
                            <a class="nav-link active" id="v-pills-General-Infromation-tab" data-toggle="pill" href="#v-pills-General-Infromation" role="tab" aria-controls="v-pills-General-Infromation" aria-selected="true">معلومات عامة</a>
                            <!--                 ------------- Career Interests ---------------------      -->
                            <a class="nav-link " id="v-pills-Career-Interests-tab" data-toggle="pill" href="#v-pills-Career-Interests" role="tab" aria-controls="v-pills-Career-Interests" aria-selected="true">بيانات التوظيف</a>
                            <!--                 ------------- Experiance  ---------------------      -->
                            <a class="nav-link" id="v-pills-Experiance-tab" data-toggle="pill" href="#v-pills-Experiance" role="tab" aria-controls="v-pills-Experiance" aria-selected="true">الخبرات </a>
                            <!--                 ------------- Education  ---------------------      -->
                            <a class="nav-link" id="v-pills-Education-tab" data-toggle="pill" href="#v-pills-Education" role="tab" aria-controls="v-pills-Education" aria-selected="true">التعليم </a>
                            <!--                 ------------- Skills ---------------------      -->
                            <a class="nav-link" id="v-pills-Skills-tab" data-toggle="pill" href="#v-pills-Skills" role="tab" aria-controls="v-pills-Skills" aria-selected="true">المهارات </a>
                            <!--                 ------------- Online Presence  ---------------------      -->
                            <a class="nav-link" id="v-pills-Onlain-Presenc-tab" data-toggle="pill" href="#v-pills-Onlain-Presenc" role="tab" aria-controls="v-pills-Onlain-Presence" aria-selected="true">التواجد على الشبكة </a>
                            <!--                 ------------- Upload CV  ---------------------      -->
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-Upload-CV" role="tab" aria-controls="v-pills-Upload-CV" aria-selected="false">تحميل السيرة الذاتية</a>
                            <!--                 ------------- Achievements  ---------------------      -->
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-Achievements" role="tab" aria-controls="v-pills-Achievements" aria-selected="false"> الشهادات</a>
                        </div>
<!--
                        <li class="nav-item mr-2">
                            <a class="nav-link btn btn-outline-info" href="profile.php">My Profile</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link btn btn-outline-danger" href="logout.php">Sign Out</a>
                        </li>
-->
                         <li class="nav-item mx-2">
                            <a class="nav-link" href="profile-ar.php">ملفي الشخصي</a>
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

                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <section class="profile">
        <div class="row mx-auto py-5">
            <div class="col-md-3 col-sm-12 profnav">
                <nav class="navbar navbar-expand-lg small-nav">
                    <div class="collapse navbar-collapse" id="">
                        <div class="nav flex-column nav-pills mobile-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <!--                 ------------- General-Infromation  ---------------------      -->
                            <a class="nav-link active" id="v-pills-General-Infromation-tab" data-toggle="pill" href="#v-pills-General-Infromation" role="tab" aria-controls="v-pills-General-Infromation" aria-selected="true">معلومات عامة</a>
                            <!--                 ------------- Career Interests ---------------------      -->
                            <a class="nav-link " id="v-pills-Career-Interests-tab" data-toggle="pill" href="#v-pills-Career-Interests" role="tab" aria-controls="v-pills-Career-Interests" aria-selected="true">بيانات التوظيف</a>
                            <!--                 ------------- Experiance  ---------------------      -->
                            <a class="nav-link" id="v-pills-Experiance-tab" data-toggle="pill" href="#v-pills-Experiance" role="tab" aria-controls="v-pills-Experiance" aria-selected="true">الخبرات </a>
                            <!--                 ------------- Education  ---------------------      -->
                            <a class="nav-link" id="v-pills-Education-tab" data-toggle="pill" href="#v-pills-Education" role="tab" aria-controls="v-pills-Education" aria-selected="true">التعليم </a>
                            <!--                 ------------- Skills ---------------------      -->
                            <a class="nav-link" id="v-pills-Skills-tab" data-toggle="pill" href="#v-pills-Skills" role="tab" aria-controls="v-pills-Skills" aria-selected="true">المهارات </a>
                            <!--                 ------------- Onlain Presence  ---------------------      -->
                            <a class="nav-link" id="v-pills-Onlain-Presenc-tab" data-toggle="pill" href="#v-pills-Onlain-Presenc" role="tab" aria-controls="v-pills-Onlain-Presence" aria-selected="true">التواجد على الشبكة </a>
                            <!--                 ------------- Upload CV  ---------------------      -->
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-Upload-CV" role="tab" aria-controls="v-pills-Upload-CV" aria-selected="false">تحميل السيرة الذاتية </a>
                            <!--                 ------------- Achievements  ---------------------      -->
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-Achievements" role="tab" aria-controls="v-pills-Achievements" aria-selected="false">الشهادات </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-8 col-sm-12 mx-auto">
                <div class="tab-content container" id="v-pills-tabContent">
                    <!--                 ------------- General-Information  ---------------------      -->
                    <div class="tab-pane fade show active general-info" id="v-pills-General-Infromation" role="tabpanel" aria-labelledby="v-pills-General-Infromation-tao">
                        <form action="generalinsert.php" method="post" enctype="multipart/form-data">
                            <div class="row profile-row">

                                <div class="col-md-3 text-center">

                                    <div class="profile-photo">
                                        <div class="photo">
                                            <img id="myImg" src="imges/download (1).jpg" alt="your image" class="img-fluid ">
                                            <!--<img src="imges/download (1).jpg" class="img-fluid">-->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">

                                    <div class="Edit-photo">
                                        <div class="title">
                                            <h3>الصورة الشخصية</h3>
                                            <p>يمكنك تحميل صورة بتنسيق jpg أو png. أو gif بحجم أقصى 5 ميجابايت.</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" id="input03" multiple="multiple" class="filestyle" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row information">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>الاسم </label><span class="css-dv1j8g">*</span>
                                        <input required type="text" class="form-control" name="fullname" placeholder="الاسم بالكامل">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>تاريخ الميلاد</label><span class="css-dv1j8g">*</span>
                                        <input type="date" class="form-control" name="birthday" placeholder="تاريخ ميلادك">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>العنوان</label><span class="css-dv1j8g">*</span>
                                        <input required type="text" class="form-control" name="adress" placeholder="العنوان">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>بريد الالكتروني</label><span class="css-dv1j8g">*</span>
                                        <input required type="email" class="form-control" name="email" placeholder="بريدك  الالكتروني">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label>الجنسية </label><span class="css-dv1j8g">*</span>
                                        <select class=" form-control" name="nationality">
                                            <option value="">Select Nationality</option>
                                            <?php
                                            $getnationalite = "select * from nationaliity";
                                            $runquery = mysqli_query($con ,$getnationalite);

                                            while ($rownationalite=  mysqli_fetch_array($runquery)) {
                                                echo '<option value="'.$rownationalite["nationality_id"].'">'.$rownationalite["nationality_enNationality"].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>البلد </label>
                                        <select class="form-control" id="search" name="countries">
                                            <option value="">Select country</option>
                                            <?php
                                              $getcountries = "select * from countries";
                                              $runquery2 = mysqli_query($con ,$getcountries);

                                              while ($rowcountries=  mysqli_fetch_array($runquery2)) {
                                                  echo '<option value="'.$rowcountries["country_id"].'">'.$rowcountries["nicename"].'</option>';
                                              }
                                              ?>
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="col-md-4">
                                    <div class="form-group">
                                        <label>City</label><span class="css-dv1j8g">*</span>
                                        <div class="option ">
                                            <select class="form-control" name="cities" id="cities">
                                                <option value="">Select City </option>
                                            </select>

                                        </div>
                                    </div>
                                </div>-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>المدينة </label><span class="css-dv1j8g">*</span>
                                        <div class="option ">

                                            <input type="text" class="form-control" name="cities">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الديانة </label><span class="css-dv1j8g">*</span>
                                        <select class=" form-control" name="religion">
                                            <option disabled selected hidden>select</option>
                                            <?php
                                    $getreligion = "select * from religion";
                                    $runquery3 = mysqli_query($con ,$getreligion);

                                    while ($rowreligion=  mysqli_fetch_array($runquery3)) {
                                        echo '<option value="'.$rowreligion["religion_id"].'">'.$rowreligion["religion_name"].'</option>';
                                    }
                                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف </label><span class="css-dv1j8g">*</span>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-phone"></span>
                                                <!--                                            <span class="input-group-text">-->
                                                <input class=" code input-group-text" id="searchresult" name="codes" placeholder="Code" readonly>
                                                <!--                                            </span>-->
                                            </div>
                                            <input type="text" class="form-control" name="Phone" aria-label="Amount (to the nearest dollar)" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الرقم القومي </label><span class="css-dv1j8g">*</span>
                                        <input required type="number" class="form-control" name="civil_id" placeholder="الرقم القومي">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">رقم التليفون</label><span class="css-dv1j8g">*</span>
                                        <input required type="number" class="form-control" name="telephone" placeholder="رقم التليفون">
                                    </div>
                                </div>
                                <div class="col-md-6 gender">
                                    <label>النوع</label><span class="css-dv1j8g">*</span>
                                    <div class="form-group">
                                        <input type="radio" name="gender" value="male" id="male">
                                        <label for="male">ذكر</label>
                                        <input type="radio" name="gender" value="female" id="famale">
                                        <label for="famale">انثي</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>الحالة الاجتماعية </label><span class="css-dv1j8g">*</span>
                                    <div class="form-group">
                                        <input type="radio" name="marital_stats" value="single" id="Single">
                                        <label for="Single">اعزب</label>
                                        <input type="radio" name="marital_stats" value="Married" id="Marrid">
                                        <label for="Marrid">متزوج</label>
                                    </div>
                                </div>


                                <div class="col-md-12 mt-4">
                                    <div class="text-center m-auto">
                                        <input type="submit" class="btn btn-info" name="submit" value="حفظ">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--                 ------------- Career-Interests  ---------------------      -->
                    <div class="tab-pane fade career-interest" id="v-pills-Career-Interests" role="tabpanel" aria-labelledby="v-pills-Career-Interests-tap">
                        <!--                        <h3 class="mb-3">Career Interests</h3>-->
                        <form action="carrerinsert.php" method="post">
                            <div class="row information">

                                <div class="col-md-6 my-3">
                                    <label>المنصب المتقدم لشغله بالطلب</label><span class="css-dv1j8g">*</span>
                                    <select name="position" id="" class="form-control">
                                        <option value="">اختر وظيفة</option>
                                        <?php
                                    $getposition = "SELECT * FROM `position`";
                                    $runqueryposition = mysqli_query($con ,$getposition);

                                    while ($rowposition=  mysqli_fetch_array($runqueryposition)) {
                                        echo '<option value="'.$rowposition["position_id"].'">'.$rowposition["position_name"].'</option>';
                                    }

                                    ?>
                                    </select>
                                </div>
                                <div class="col-md-6 my-3">
                                    <label>ما هو مستواك الوظيفي الحالي؟</label><span class="css-dv1j8g">*</span>
                                    <select name="career_level" id="" class="form-control">
                                        <option value="">اختر مستواك</option>
                                        <?php
                                  $getcareer = "SELECT * FROM `career_level`";
                                  $runquerycareer = mysqli_query($con ,$getcareer);

                                  while ($rowcareer=  mysqli_fetch_array($runquerycareer)) {
                                      echo '<option value="'.$rowcareer["career_level_id"].'">'.$rowcareer["career_name"].'</option>';
                                  }

                                  ?>
                                    </select>
                                </div>
                                <div class="col-md-6 my-3">


                                    <label>الراتب المتوقع</label> <span class="css-dv1j8g">*</span>
                                    <input class="form-control" name="salaryexpected" placeholder="الراتب المتوقع">
                                </div>
                                <div class="col-md-6 my-3">
                                    <label>العملة</label><span class="css-dv1j8g">*</span>
                                    <select name="currency" id="" class="form-control">
                                        <option value="">اختر العملة</option>
                                        <?php
                                        $getcurrancy = "SELECT * FROM `currancy`";
                                        $runquerycurrancy = mysqli_query($con ,$getcurrancy);

                                        while ($rowcurrancy=  mysqli_fetch_array($runquerycurrancy)) {
                                            echo '<option value="'.$rowcurrancy["currancy_id"].'">'.$rowcurrancy["currancy_name"].'</option>';
                                        }

                                        ?>
                                    </select>
                                   <!-- <div class="form-group ">
                                        <label for="linkcv" class="">Link CV Google Drive</label>

                                        <input type="url" class="form-control mb-2 " id="linkcv" name="linkcv">

                                    </div>-->
                                </div>
                                <div class="col-md-6">
                                    <label>هل انت مدخن؟</label><span class="css-dv1j8g">*</span>
                                    <div class="form-group">
                                        <input type="radio" name="smoke" value="Yes" id="Yes">
                                        <label for="Yes">نعم</label>
                                        <input type="radio" name="smoke" value="No" id="No">
                                        <label for="No">لا</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>هل لديك رخصة قيادة؟</label><span class="css-dv1j8g">*</span>
                                    <div class="form-group">
                                        <input type="radio" name="license" id="licenseYes" value="Yes">
                                        <label for="licenseYes">نعم</label>
                                        <input type="radio" name="license" id="licenseNo" value="No">
                                        <label for="licenseNo">لا</label>
                                    </div>
                                </div>

                                <div class="col-md-6 my-3">
                                    <label>أين ترى نفسك بعد خمس سنوات؟</label> <span class="css-dv1j8g">*</span>
                                    <textarea class="form-control" name="fiveyears" id="fiveyears" cols="30" rows="6" placeholder="أين ترى نفسك بعد خمس سنوات؟"></textarea>
                                </div>





                                <div class="col-md-12 my-3">
                                    <div class="text-center m-auto">
                                        <input type="submit" name="subcareer" id="subcareer" class="btn btn-info" value="حفظ"></div>
                                </div>

                            </div>
                        </form>

                    </div>
                    <!--                 -------------Experience  ---------------------      -->
                    <div class="tab-pane fade experience" id="v-pills-Experiance" role="tabpanel" aria-labelledby="v-pills-Experiance-tap">

                        <div class="row">
                            <p class="alert alert-info work mt-3"> خبرات العمل --- تلميح: ابدأ بتجربة عملك الحالية أو الأحدثبعد خمس سنوات؟</p>
                            <div class="col-sm-6 px-0 my-3">
                                <div class="jumbotron jumbotron-fluid j-experience">
                                    <div class="container">
                                        <div class="row">

                                            <?php
                                              $selectexperience="SELECT * FROM `experiences` WHERE user_id='".$_SESSION['id']."'";
                                              $queryexperiencerun=mysqli_query($con , $selectexperience);

                                              if (mysqli_num_rows($queryexperiencerun)>0 ){
                                                  while ($rowexper=mysqli_fetch_array($queryexperiencerun)){
                                                     echo '<div class="row border pb-4 j-row">
                                                        <div class="mt-1 px-1" style="margin-top: 25px !important;"><br></div>
                                                   
                                                      <div class="col-sm-10 mt-3 ">
                                                          <h6 class="display-5 lead">'.$rowexper['job_title'].'</h6><hr>
                                                           <p class="company-name">at  '.$rowexper['company_name'].'</p>
                                                      </div>
                                                      
                                                      <p class="mt-3 px-3">'.$rowexper['date_start'].' - '.$rowexper['date_end'].'</p> </div>

                                                     ';
                                                  }
                                              }
                                              ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#experience">
                                    + إضافة خبرة
                                </button>
                            </div>
                        </div>
                        <form action="addexperience.php" method="post">
                            <div class="row">
                                <!-- Modal -->
                                <div class="modal fade" id="experience" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">إضافة خبرة</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12 my-3">
                                                    <label>اسم الشركة</label><span class="css-dv1j8g">*</span>
                                                    <input class="form-control" name="companyname" placeholder="Company Name">
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>المسمي الوظيفي</label> <span class="css-dv1j8g">*</span>
                                                    <input class="form-control" name="jobtitle" placeholder="Job Title">
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>تاريخ البدء </label> <span class="css-dv1j8g">*</span>
                                                    <input type="date" class="form-control" name="datestart">
                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <div class="form-group" id="date-end">
                                                        <label>تاريخ النهاية </label> <span class="css-dv1j8g">*</span>
                                                        <input type="date" class="form-control" name="dateend">
                                                    </div>

                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>المرتب </label> <span class="css-dv1j8g"></span>
                                                    <input type="number" class="form-control" name="salary" placeholder="Salary">
                                                </div>
                                                <div class="col-md-12 my-3">

                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>سبب المغادرة </label>
                                                    <textarea name="leaving" class="form-control" id="" cols="10" rows="5" placeholder="Reason for leaving" maxlength="500"></textarea><span class="text-danger">الحد الأقصى 500 حرف
 </span>

                                                </div>
                                                <div class="col-md-12 my-3">


                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                <input type="submit" name="submitaddexperience" id="" class="btn btn-info mr-3 px-3" value="حفظ">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!--                 ------------- Education  ---------------------      -->
                    <div class="tab-pane fade educationtap" id="v-pills-Education" role="tabpanel" aria-labelledby="v-pills-Education-tab">
                        <section class="education">
                            <h3 class="mb-3">المدرسة الثانوية</h3>
                            <div class="row information">
                                <div class="col-md-12">
                                    <div class="language-data">
                                        <?php

                                    $selectcollege="SELECT * FROM `college` WHERE user_id='".$_SESSION['id']."'";
                                    $querycollegerun=mysqli_query($con , $selectcollege);
                                    if (mysqli_num_rows($querycollegerun)>0 ){
                                        while ($rowcollege=mysqli_fetch_array($querycollegerun)){
                                            echo '
                                                    <div class="" style="margin-top: 10px !important;"><br></div>
                                                    <div class="row mt-5">
                                                      <div class="col-sm-12 p-0">
                                                          <h6 class=""> '.$rowcollege['college_name'].'</h6><hr>
                                                      </div>
                                                     
                                                      <p class="grad-year">سنة التخرج:  '.$rowcollege['graduationyear'].'</p>
                                                      
                                                      </div>
                                                      

                                                     ';
                                        }
                                    }

                                    ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#Eduction">
                                        + اضافة
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="Eduction" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <form action="collegeinsert.php" method="post">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">اضافة مدرسة</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <!--

-->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>المدرسة</label><span class="css-dv1j8g">*</span>
                                                                    <input type="text" class="form-control" placeholder="" id="universityName" name="college" title="Add your University">
                                                                </div>
                                                            </div>
                                                            <!--

-->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>سنة التخرج</label><span class="css-dv1j8g">*</span><br>
                                                                    <select class="years form-control px-4 py-2" required name="yeargraduation">
                                                                        <option disabled selected hidden>اختر سنة التخرج</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <!--

-->
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <input type="submit" name="submit" class="btn btn-primary my-3" value="حفظ التغييرات">
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="higher-education">
                            <h3 class="mt-5 mb-3">الجامعة</h3>
                            <div class="row information">
                                <div class="col-md-12">
                                    <div class="language-data">
                                        <?php

                                    $selecteducation="SELECT * FROM `education` WHERE user_id='".$_SESSION['id']."'";
                                    $queryeducationrun=mysqli_query($con , $selecteducation);
                                    if (mysqli_num_rows($queryeducationrun)>0 ){
                                        while ($roweducat=mysqli_fetch_array($queryeducationrun)){
                                            echo '
                                                    <div class="" style="margin-top: 10px !important;"><br></div>
                                                    <div class="row"> 
                                                      <div class="col-sm-12 p-0">
                                                          <h6 class=" ">'.$roweducat['university_name'].'</h6><hr>
                                                      </div>
                                                     
                                                    </div>
                                                      <p class="">'.$roweducat['fields_study'].' / '.$roweducat['endyear'].'</p>
                                                      

                                                     ';
                                        }
                                    }

                                    ?>
                                    </div>
                                </div>
                            
                                
                                <div class="col-md-12">
                                    <!-- Button trigger modal -->

                                    <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#higher-Eduction">
                                        + اضافة
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="higher-Eduction" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <form action="educationinsert.php" method="post">
                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">اضافة جامعة</h5>

                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">


                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>الدرجة العلمية</label><span class="css-dv1j8g">*</span>
                                                                    <select class="form-control" id="degree" name="degreelevel">
                                                                        <option disabled selected hidden>اختر المستوي</option>
                                                                        <?php
                                                                $selectdegre="SELECT * FROM `degree_level`";
                                                                $runquerydegre=mysqli_query($con,$selectdegre);
                                                                while ($rowdegre=mysqli_fetch_array($runquerydegre)){
                                                                    echo '<option value="'.$rowdegre["degree_id"].'">'.$rowdegre["degree_name"].'</option>';
                                                                }


                                                                ?>
                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>الجامعة/المعهد</label><span class="css-dv1j8g">*</span>
                                                                    <input type="text" class="form-control" placeholder="e.g Ain Shams" id="universityName" name="university" title="الجامعة">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>مجالات الدراسة</label><span class="css-dv1j8g">*</span>
                                                                    <input type="text" class="form-control" id="fieldName" placeholder="e.g finance political science,...." name="Field" title="Add your Field">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>سنة التخرج</label><span class="css-dv1j8g">*</span><br>
                                                                    <select class="years form-control px-4 py-2" required name="yeargraduation">
                                                                        <option disabled selected hidden>اختر سنة التخرج</option>
                                                                    </select>
                                                                </div>


                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>التقدير</label><span class="css-dv1j8g">*</span>
                                                                    <select class="form-control" name="grade">
                                                                        <option disabled selected hidden>اختر التقدير</option>
                                                                        <?php
                                                                $selectgrade="SELECT * FROM `grade`";
                                                                $runquerygrade=mysqli_query($con,$selectgrade);
                                                                while ($rowgrade=mysqli_fetch_array($runquerygrade)){
                                                                    echo '<option value="'.$rowgrade["grade_id"].'">'.$rowgrade["grade_name"].'</option>';
                                                                }
                                                                ?>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <input type="submit" name="education" class="btn btn-primary my-3" value="حفظ ">
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="training-courses">
                            <h3 class="mt-5 mb-3">دورات تدريبية</h3>
                            <div class="row information">
                                <!-- Button trigger modal -->
                                <div class="col-12">
                                    <?php
                                  $selectcoursestraining="SELECT * FROM `coursestraining` WHERE user_id='".$_SESSION['id']."'";
                                  $querycoursestrainingrun=mysqli_query($con , $selectcoursestraining);
                                  if (mysqli_num_rows($querycoursestrainingrun)>0 ){
                                      while ($rowcourse=mysqli_fetch_array($querycoursestrainingrun)){
                                          echo '
                                                    <div class="" style="margin-top: 10px !important;"><br></div>
                                                    <div class="row">
                                                      <div class="col-sm-12 px-0">
                                                          <h6 class="">  '.$rowcourse['course_name'].'</h6><hr>
                                                      </div>
                                                     
                                                      </div>
                                                      <p class="organization">organization Name :- '.$rowcourse['organization_name'].' </p>
                                                      <p class=""> Start: '.$rowcourse['start_date'].' / End: '.$rowcourse['end_date'].'</p>
                                                      
                                                 
                                                     ';
                                      }
                                  }

                                  ?>
                                  
                                    
                                </div>
                                <button type="button" class="btn btn-primary ml-3 mt-4" data-toggle="modal" data-target="#exampleModalLong">
                                    + اضافة
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="coursesinsert.php" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">التدريب والدورات</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>موضوع التدريب / الدورات</label><span class="css-dv1j8g">*</span>
                                                                <input type="text" class="form-control" placeholder="e.g JavaScript, Php" name="training_courses" title="اضف التدريب او الدورات">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>اسم المنظمة / المؤسسة</label><span class="css-dv1j8g">*</span>
                                                                <input type="text" class="form-control" placeholder="e.g AUC, Route" name="Organization_Institution" title="Add your Organization">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>سنة البدء</label><span class="css-dv1j8g">*</span><br>
                                                            <input type="date" class="form-control" name="date_start_course">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>سنة النهاية</label><span class="css-dv1j8g">*</span><br>
                                                            <input type="date" class="form-control" name="date_end_course">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                    <input type="submit" name="courses" class="btn btn-primary my-3" value="حفظ التغييرات">
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--                 ------------- Skills  ---------------------      -->
                    <div class="tab-pane fade skills" id="v-pills-Skills" role="tabpanel" aria-labelledby="v-pills-Skills-tab">
                        <h3 class="mb-3">المهارات</h3>
                        <section class="Skill mb-5">

                            <div class="row information">

                                <div class="col-md-12">
                                    <div class="skills row">
                                        <?php

                                  $selectskills="SELECT * FROM skills  WHERE user_id='".$_SESSION['id']."' ";

                                  $queryskillsrun=mysqli_query($con , $selectskills);
                                  if (mysqli_num_rows($queryskillsrun)>0 ){
                                      while ($rowskills=mysqli_fetch_array($queryskillsrun)){
                                          echo '
                                                        <div class="" style="margin-top: 45px !important;"><br></div>
                                                      <div class="col-sm-8 skill-name">
                                                          <h6 class="">'.$rowskills['skill_name'].'</h6><hr>
                                                          
                                                      </div>
                                                      
                                                     ';
                                      }
                                  }
                       ?>
                                    </div>
                                </div>
                            

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#Skill">

                                    + اضافة

                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="Skill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="skillsinsert.php" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">اضافة مهارة</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>اسم المهارة</label><span class="css-dv1j8g">*</span>
                                                                <input type="text" class="form-control" name="skillname" placeholder="Java , Html , Php" title="add your Skill">
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Experience</label><span class="css-dv1j8g">*</span>
                                                                <select class="form-control" name="proficiency">

                                                                    <option value="">Select Experience</option>
                                                                    <?php
                                                                $getproficiency = "SELECT * FROM `proficiency`";
                                                                $runqueryproficiency = mysqli_query($con ,$getproficiency);

                                                                while ($rowproficiency=  mysqli_fetch_array($runqueryproficiency)) {
                                                                    echo '<option value="'.$rowproficiency["proficiency_id"].'">'.$rowproficiency["proficiency_name"].'</option>';
                                                                }

                                                                ?>

                                                                </select>
                                                            </div>
                                                        </div>
-->


                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                                    <input type="submit" class="btn btn-info" name="skilllls" value="حفظ ">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h3 class="mb-3">اللغات</h3>
                        <section class="language">
                            <div class="row information">
                                <div class="col-md-12">
                                    <div class="languageees row">
                                        <?php
                                  $selectlanguageees="SELECT * FROM language_list l JOIN languages e ON l.language_id=e.language_id JOIN language_level v ON l.level_lang_id=v.level_lang_id WHERE user_id='".$_SESSION['id']."'";
                                  $querylanguageeesrun=mysqli_query($con , $selectlanguageees);
                                  if (mysqli_num_rows($querylanguageeesrun)>0 ){
                                      while ($rowlanguageees=mysqli_fetch_array($querylanguageeesrun)){
                                          echo '
                                                <div class="" style="margin-top: 45px !important;"><br></div>
                                              <div class="col-sm-8">
                                                  <span style="font-size: 20px ; font-weight:400" class="display-5 lead">'.$rowlanguageees['language_name'].'</span> <i class="icofont-long-arrow-right px-2"></i>
                                                  <span style="font-size: 20px ; font-weight:400" class="display-5 lead">'.$rowlanguageees['level_lang_name'].'</span><hr>
                                                  
                                              </div>
                                       
                                             ';
                                      }
                                  }
                                  ?>
                                    </div>
                                </div>
                            
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#language">

                                    + اضافة

                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="language" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="languageinsert.php" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Language</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>اللغة</label><span class="css-dv1j8g">*</span>
                                                                <select class="form-control" name="lang_name">
                                                                    <option disabled selected hidden>select languages</option>
                                                                    <?php
                                                              $getlanguages = "SELECT * FROM `languages`";
                                                              $runquerylanguages = mysqli_query($con ,$getlanguages);

                                                              while ($rowlanguages=  mysqli_fetch_array($runquerylanguages)) {
                                                                  echo '<option value="'.$rowlanguages["language_id"].'">'.$rowlanguages["language_name"].'</option>';
                                                              }

                                                              ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>المهارة</label><span class="css-dv1j8g">*</span>
                                                                <select class="form-control" name="lang_exper">
                                                                    <option disabled selected hidden>select language level</option>
                                                                    <?php
                                                              $getlanguage_level = "SELECT * FROM `language_level`";
                                                              $runquerylanguage_level = mysqli_query($con ,$getlanguage_level);

                                                              while ($rowlanguage_level=  mysqli_fetch_array($runquerylanguage_level)) {
                                                                  echo '<option value="'.$rowlanguage_level["level_lang_id"].'">'.$rowlanguage_level["level_lang_name"].'</option>';
                                                              }

                                                              ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                                    <input type="submit" class="btn btn-info" name="languageees" value="حفظ ">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--                 ------------- Online-Presence  ---------------------      -->
                    <div class="tab-pane fade online-presence" id="v-pills-Onlain-Presenc" role="tabpanel" aria-labelledby="v-pills-Onlain-Presenc-tab">
                        <!--                        <h3 class="mb-3">Online Presence</h3>-->
                        <form action="onlinelinksinsert.php" method="post">
                            <div class="information ">
                                <div class="p-3">
                                    <div class="col-md-12">
                                        <p class="alert alert-info work">وجودك على الانترنت</p>
                                    </div>

                                    <div class="form-group row">
                                        <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="linkedin" name="linkedin">
                                        </div>
                                    </div>

                                    <!---->
                                    <div class="form-group row">
                                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="facebook" name="facebook">
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="behance" class="col-sm-2 col-form-label">Behance</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="behance" name="behance">
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="instagram" name="instagram">
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="gitHub" class="col-sm-2 col-form-label">GitHub</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="gitHub" name="gitHub">
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="stackoverflow" class="col-sm-2 col-form-label">Stack Overflow</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="stackoverflow" name="stackoverflow">
                                        </div>
                                    </div>

                                    <!---->
                                    <div class="form-group row">
                                        <label for="youTube" class="col-sm-2 col-form-label">YouTube</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="youTube" name="youTube">
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="blog" class="col-sm-2 col-form-label">Blog</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="blog" name="blog">
                                        </div>
                                    </div>

                                    <!---->
                                    <div class="form-group row">
                                        <label for="website" class="col-sm-2 col-form-label">Website</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="website" name="website">
                                        </div>
                                    </div>

                                    <!---->
                                    <div class="form-group row">
                                        <label for="other" class="col-sm-2 col-form-label">Other</label>
                                        <div class="col-sm-7">
                                            <input type="url" class="form-control mb-2 " id="other" name="other">
                                        </div>
                                    </div>
                                    <!--                                -->



                                    <div class="col-md-12 col-sm-6 my-5">
                                        <!--                                            <div class="form-group">-->
                                        <div class="text-center m-auto">
                                            <input type="submit" class="mb-2 btn btn-primary" id="submit" name="save" value="حفظ">
                                        </div>
                                        <!--                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--                 ------------- Upload-CV  ---------------------      -->
                    <div class="tab-pane fade upload-cv" id="v-pills-Upload-CV" role="tabpanel" aria-labelledby="v-pills-Upload-CV-tab">
                        <!--                        <h3 class="mb-3">Upload CV</h3>-->
                        <form action="uploadcv.php" method="post" enctype="multipart/form-data">
                            <div class="row information">

                                <div class="col-md-6 my-3">
                                    <label>يرجى تحميل سيرتك الذاتية </label><span class="css-dv1j8g">*</span>

                                    <div class="form-group">
                                        <input type="file" id="input02" multiple="multiple" class="filestyle" name="file">
                                    </div>

                                </div>


                                <div class="col-md-12 my-3">
                                    <div class="text-center col-auto">
                                        <input type="submit" name="cv" id="" class="btn btn-info" value="حفظ">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!--                 ------------- Achievements  ---------------------      -->
                    <div class="tab-pane fade achievements" id="v-pills-Achievements" role="tabpanel" aria-labelledby="v-pills-Achievements-tab">
                        <!--                        <h3 class="mb-3">Achievements</h3>-->
                        <form class="form" action="achievemrnts.php" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="alert alert-primary mx-4" role="alert">
                                   يرجى تحميل الصور فقط .jpg ، .png ...
                                </div>
                                <div class="row information">
                                    <div class="col-md-6">
                                        <input type="file" accept="image/*" id="input01" multiple="multiple" class="filestyle" name="file[]">
                                        <div class="achievement py-3"></div>
                                        <input type="button" id="btn2" class="btn btn-secondary" value="add new achievement">
                                    </div>
                                </div>
                                <div class="col-md-12 my-3  ">
                                    <div class="text-center col-auto">
                                        <input type="submit" name="acheive" id="" class="btn btn-info ">
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>



    </section>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        $('#input03').filestyle({
            badge: true,
            input: false,
            btnClass: 'btn-primary',
            htmlIcon: '<span class="oi oi-folder"></span>'

        });
        $('#input02').filestyle({
            badge: true,
            input: false,
            btnClass: 'btn-primary',
            htmlIcon: '<span class="oi oi-folder"></span>'
        });
        $('#input01').filestyle({
            badge: true,
            input: false,
            btnClass: 'btn-primary',
            htmlIcon: '<span class="oi oi-folder"></span>'
        });

    </script>
</body>

</html>
<script>
    $(document).ready(function() {
        //        to get code number of countries
        $("#search").change(function() {
            var txt = $(this).val();
            if (txt != "") {

                $.ajax({
                    url: "ajax2.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#searchresult").attr("value", data);
                    }
                });
            }
        });
        //       to get cities of the countries
        /*$("#search").change(function() {
            var txt = $(this).val();
            if (txt != "") {

                $.ajax({
                    url: "ajax3.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#cities").html(data);
                    }
                });
            }
        });*/
        /*         to get information of experienace from data base          */
        $(".expera").on("click", function() {
            var txt = $(this).attr("data-id");
            console.log(txt);
            if (txt != "") {

                $.ajax({
                    url: "ajax4.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#ressearch").html(data);
                    }
                });
            }
        });
    });

    /*  to upload image immediate in div to show it */
    window.addEventListener('load', function() {
        document.querySelector('input[type="file"]').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var img = document.querySelector('img'); // $('img')[0]
                img.src = URL.createObjectURL(this.files[0]); // set src to file url
                img.onload = imageIsLoaded; // optional onload event listener
            }
        });
    });

    function imageIsLoaded(e) { /* alert(e);*/ }

</script>
