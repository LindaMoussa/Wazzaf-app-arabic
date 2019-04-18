<?php
require './db/connect.php';
require './checksession.php';

if(!isset($_SESSION["id"])  ) {
    header("location:signup.php");
}
$user_id=$_GET['user_id'];


// get general data
$selectgeneraldata="SELECT * FROM general_information g JOIN nationaliity n ON g.nationality_id=n.nationality_id JOIN countries c ON g.country_id =c.country_id JOIN religion r ON g.religion_id =r.religion_id WHERE user_id='".$user_id."'";
$rungeneraldata=mysqli_query($con , $selectgeneraldata);



// get career data
$selectcareerdata="SELECT * FROM career_interest c JOIN career_level l ON c.career_level_id=l.career_level_id JOIN position p ON c.position_id=p.position_id WHERE user_id='".$user_id."'";
$runcareerdata=mysqli_query($con , $selectcareerdata);

if (mysqli_num_rows($runcareerdata)>0){
    $fetchdatacareer=mysqli_fetch_array($runcareerdata);
}else{

}




/*  get experiance data */
$selectexperiencesdata="SELECT * FROM `experiences` WHERE user_id='".$user_id."'";
$runexperiences=mysqli_query($con , $selectexperiencesdata);



/*  get skills data   */
$selectskillsdata="SELECT * FROM skills   WHERE user_id='".$user_id."'";
$runskills=mysqli_query($con , $selectskillsdata);


/*  get language data   */
$selectlanguage_listdata="SELECT * FROM language_list l JOIN languages g ON l.language_id = g.language_id JOIN language_level v ON l.level_lang_id = v.level_lang_id  WHERE user_id='".$user_id."'";
$runlanguage_list=mysqli_query($con , $selectlanguage_listdata);


/*  get courses data */
$selectcoursestraindata="SELECT * FROM `coursestraining` WHERE user_id='".$user_id."'";
$runcoursestrain=mysqli_query($con , $selectcoursestraindata);


/*  get online links data */
$selectonlinedata="SELECT * FROM `onlinelinks` WHERE user_id='".$user_id."'";
$runonline=mysqli_query($con , $selectonlinedata);

if (mysqli_num_rows($runonline)>0){
    $fetchdataonline=mysqli_fetch_array($runonline);
}else{

}



/*  get CV data */
$selectCVdata="SELECT * FROM `uploadcv` WHERE user_id='".$user_id."'";
$runCV=mysqli_query($con , $selectCVdata);



/*  get college data */
$selectcertificationdata="SELECT * FROM `certification` WHERE user_id='".$user_id."'";
$runcertification=mysqli_query($con , $selectcertificationdata);


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
    
    <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">
   
    <link rel="stylesheet" href="css/edite-profile.css">

</head>

<body>
    <section class="header">

        <nav class="navbar navbar-expand-lg navbarmenu">

            <div class="container">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent, #navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="icofont-navigation-menu text-white"></i></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto">
                        <div class="nav flex-column nav-pills mobile-nav bignav " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <!--                 ------------- General-Information  ---------------------      -->
                            <a class="nav-link active" id="v-pills-General-Infromation-tab" data-toggle="pill" href="#v-pills-General-Infromation" role="tab" aria-controls="v-pills-General-Infromation" aria-selected="true">معلومات عامة</a>
                            <!--                 ------------- Career Interests ---------------------      -->
                            <a class="nav-link " id="v-pills-Career-Interests-tab" data-toggle="pill" href="#v-pills-Career-Interests" role="tab" aria-controls="v-pills-Career-Interests" aria-selected="true">بيانات التوظيف</a>
                            <!--                 ------------- Experiance  ---------------------      -->
                            <a class="nav-link" id="v-pills-Experiance-tab" data-toggle="pill" href="#v-pills-Experiance" role="tab" aria-controls="v-pills-Experiance" aria-selected="true">الخبرات</a>
                            <!--                 ------------- Education  ---------------------      -->
                            <a class="nav-link" id="v-pills-Education-tab" data-toggle="pill" href="#v-pills-Education" role="tab" aria-controls="v-pills-Education" aria-selected="true">التعليم</a>
                            <!--                 ------------- Skills ---------------------      -->
                            <a class="nav-link" id="v-pills-Skills-tab" data-toggle="pill" href="#v-pills-Skills" role="tab" aria-controls="v-pills-Skills" aria-selected="true">المهارات</a>
                            <!--                 ------------- Online Presence  ---------------------      -->
                            <a class="nav-link" id="v-pills-Onlain-Presenc-tab" data-toggle="pill" href="#v-pills-Onlain-Presenc" role="tab" aria-controls="v-pills-Onlain-Presence" aria-selected="true">التواجد على الشبكة</a>
                            <!--                 ------------- Upload CV  ---------------------      -->
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-Upload-CV" role="tab" aria-controls="v-pills-Upload-CV" aria-selected="false">تحميل السيرة الذاتية</a>
                            <!--                 ------------- Achievements  ---------------------      -->
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-Achievements" role="tab" aria-controls="v-pills-Achievements" aria-selected="false">الشهادات</a>
                        </div>
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
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="">
                        <div class="nav flex-column nav-pills mobile-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <!--                 ------------- General-Infromation  ---------------------      -->
                            <a class="nav-link active" id="v-pills-General-Infromation-tab" data-toggle="pill" href="#v-pills-General-Infromation" role="tab" aria-controls="v-pills-General-Infromation" aria-selected="true">معلومات عامة</a>
                            <!--                 ------------- Career Interests ---------------------      -->
                            <a class="nav-link " id="v-pills-Career-Interests-tab" data-toggle="pill" href="#v-pills-Career-Interests" role="tab" aria-controls="v-pills-Career-Interests" aria-selected="true">بيانات التوظيف</a>
                            <!--                 ------------- Experience  ---------------------      -->
                            <a class="nav-link" id="v-pills-Experiance-tab" data-toggle="pill" href="#v-pills-Experiance" role="tab" aria-controls="v-pills-Experiance" aria-selected="true">الخبرات</a>
                            <!--                 ------------- Education  ---------------------      -->
                            <a class="nav-link" id="v-pills-Education-tab" data-toggle="pill" href="#v-pills-Education" role="tab" aria-controls="v-pills-Education" aria-selected="true">التعليم</a>
                            <!--                 ------------- Skills ---------------------      -->
                            <a class="nav-link" id="v-pills-Skills-tab" data-toggle="pill" href="#v-pills-Skills" role="tab" aria-controls="v-pills-Skills" aria-selected="true">المهارات</a>
                            <!--                 ------------- Online Presence  ---------------------      -->
                            <a class="nav-link" id="v-pills-Onlain-Presenc-tab" data-toggle="pill" href="#v-pills-Onlain-Presenc" role="tab" aria-controls="v-pills-Onlain-Presence" aria-selected="true">التواجد على الشبكة</a>
                            <!--                 ------------- Upload CV  ---------------------      -->
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-Upload-CV" role="tab" aria-controls="v-pills-Upload-CV" aria-selected="false">تحميل السيرة الذاتية</a>
                            <!--                 ------------- Achievements  ---------------------      -->
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-Achievements" role="tab" aria-controls="v-pills-Achievements" aria-selected="false">الشهادات</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-8 col-sm-12 mx-auto">
                <div class="tab-content container" id="v-pills-tabContent">
                    <!--                 ------------- General-Information  ---------------------      -->
                    <div class="tab-pane fade show active general-info" id="v-pills-General-Infromation" role="tabpanel" aria-labelledby="v-pills-General-Infromation-tao">
                        <form action="generalupdate.php" method="post" enctype="multipart/form-data">
                            <div class="row profile-row">

                                <div class="col-md-3 col-sm-6 text-center">

                                    <div class="profile-photo">
                                        <div class="photo">
                                            <?php
                                          if (mysqli_num_rows($rungeneraldata)>0){
                                            $fetchgeneral=mysqli_fetch_array($rungeneraldata);
                                            echo "<img src='upload/".$fetchgeneral['image_name']."' class='img-fluid'>";
                                            }else{
                                              echo "<img src='imges/download%20(1).jpg' class='img-fluid'>";
                                            }
                                            ?>
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
                                            <input type="hidden" value="<?php echo $fetchgeneral['image_name'];?>" name="imagename">
                                            <input type="file" id="input03" multiple="multiple" class="filestyle" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row information">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>الاسم </label><span class="css-dv1j8g">*</span>
                                        <?php
                                        if (mysqli_num_rows($rungeneraldata)>0){

                                            echo '
                                             <input required type="text" class="form-control" value="'.$fetchgeneral['fullname'].'"  name="fullname" placeholder="Full Name">
                                            ';
                                        }else{
                                            echo '
                                            <input required type="text" class="form-control"   name="fullname" placeholder="الاسم بالكامل">
                                            ';
                                        }

                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>تاريخ الميلاد</label><span class="css-dv1j8g">*</span>
<!--                                        <p>Date: <input type="text" id="datepicker"></p>-->

                                        <?php
                                        if (mysqli_num_rows($rungeneraldata)>0){

                                            echo '
                                             <input type="date"  class="form-control" value="'.$fetchgeneral['birthday'].'" name="birthday" placeholder="تاريخ ميلادك">
                                             
                                            ';
                                        }else{
                                            echo '
                                             <input type="date" class="form-control"  name="birthday" placeholder="تاريخ ميلادك">
                                             
                                            ';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>العنوان</label><span class="css-dv1j8g">*</span>
                                        <?php
                                        if (mysqli_num_rows($rungeneraldata)>0){
                                            echo '
                                            
                                             <input required type="text" value="'.$fetchgeneral['address'].'" class="form-control" name="adress" placeholder="العنوان">
                                            ';
                                        }else{
                                            echo '
                                            
                                             <input required type="text"  class="form-control" name="adress" placeholder="العنوان">
                                            ';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>بريد الالكتروني</label><span class="css-dv1j8g">*</span>
                                        <?php
                                        if (mysqli_num_rows($rungeneraldata)>0){
                                            echo '
                                            <input required type="email" class="form-control" value="'.$fetchgeneral['email'].'" name="email" placeholder="بريدك  الالكتروني">
                                            
                                            ';
                                        }else{
                                            echo '
                                            <input required type="email" class="form-control"  name="email" placeholder="بريدك  الالكتروني">
                                            
                                            ';
                                        }
                                        ?>

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
                                                if (mysqli_num_rows($rungeneraldata)>0){
                                                    if ($fetchgeneral['nationality_id'] == $rownationalite["nationality_id"]){
                                                        echo '<option value="'.$rownationalite["nationality_id"].'" selected>'.$rownationalite["nationality_enNationality"].'</option>';
                                                    }else{
                                                        echo '<option value="'.$rownationalite["nationality_id"].'">'.$rownationalite["nationality_enNationality"].'</option>';
                                                    }

                                                 }else{}
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>البلد  </label>
                                        <select class="form-control" id="search" name="countries">
                                            <option value="">Select country</option>
                                            <?php
                                              $getcountries = "select * from countries";
                                              $runquery2 = mysqli_query($con ,$getcountries);

                                              while ($rowcountries=  mysqli_fetch_array($runquery2)) {
                                                  if (mysqli_num_rows($rungeneraldata)>0){
                                                      if ($fetchgeneral['country_id'] == $rowcountries["country_id"]){
                                                          echo '<option value="'.$rowcountries["country_id"].'" selected>'.$rowcountries["nicename"].'</option>';
                                                      }else{
                                                          echo '<option value="'.$rowcountries["country_id"].'">'.$rowcountries["nicename"].'</option>';
                                                      }

                                                  }else{}

                                              }
                                              ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>المدينة </label><span class="css-dv1j8g">*</span>
                                        <div class="option ">
                                            <?php
                                            if (mysqli_num_rows($rungeneraldata)>0){
                                                echo '
                                            <input type="text" value="'.$fetchgeneral['city_name'].'" class="form-control" name="cities">
                                            ';
                                            }else{
                                                echo '
                                            <input type="text"  class="form-control" name="cities">
                                            ';
                                            }
                                            ?>

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
                                        if (mysqli_num_rows($rungeneraldata)>0){
                                            if ($fetchgeneral['religion_id'] == $rowreligion["religion_id"]){
                                                echo '<option value="'.$rowreligion["religion_id"].'" selected>'.$rowreligion["religion_name"].'</option>';
                                            }else{
                                                echo '<option value="'.$rowreligion["religion_id"].'">'.$rowreligion["religion_name"].'</option>';
                                            }

                                        }else{}

                                    }
                                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label><span class="css-dv1j8g">*</span>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-phone"></span>
                                                <?php
                                                if (mysqli_num_rows($rungeneraldata)>0){
                                                    $num = $fetchgeneral['mobile'];
                                                    $strlen=$num[strlen($num)-11];

                                                    $mobile = substr( $num,$strlen,3);
                                                    echo '
                                                    <input class=" code input-group-text" id="searchresult"  value="'.$mobile.'"  name="codes" placeholder="Code" readonly>
                                                     ';
                                                }else{
                                                    echo '
                                                    <input class=" code input-group-text" id="searchresult"    name="codes" placeholder="Code" readonly>
                                                     ';
                                                }
                                                ?>


                                            </div>
                                            <?php
                                            if (mysqli_num_rows($rungeneraldata)>0){
                                            $mobile = substr($fetchgeneral['mobile'] ,-10);
                                            echo '
                                             <input type="text" class="form-control" value="'.$mobile.'" name="Phone" aria-label="Amount (to the nearest dollar)" placeholder="Phone">
                                            ';
                                            }else{
                                                echo '
                                             <input type="text" class="form-control" name="Phone" aria-label="Amount (to the nearest dollar)" placeholder="Phone">
                                            ';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>الرقم القومي </label><span class="css-dv1j8g">*</span>
                                        <?php
                                        if (mysqli_num_rows($rungeneraldata)>0){
                                            echo '
                                           
                                            <input required type="number" value="'.$fetchgeneral['civil_id_no'].'" class="form-control" name="civil_id" placeholder="الرقم القومي">
                                            ';
                                        }else{
                                            echo '
                                           
                                            <input required type="number"  class="form-control" name="civil_id" placeholder="الرقم القومي">
                                            ';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">رقم التليفون</label>
                                        <span class="css-dv1j8g">*</span>
                                        <?php
                                        if (mysqli_num_rows($rungeneraldata)>0){
                                            echo '
                                           <input required type="number"  value="'.$fetchgeneral['telephone'].'"  class="form-control" name="telephone" placeholder="رقم التليفون">
                                          
                                            ';
                                        }else{
                                            echo '
                                           <input required type="number"    class="form-control" name="telephone" placeholder="رقم التليفون">
                                          
                                            ';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-6 gender">
                                    <label>النوع</label><span class="css-dv1j8g">*</span>
                                    <div class="form-group">
                                        <?php
                                        if (mysqli_num_rows($rungeneraldata)>0){

                                            if ($fetchgeneral['gender'] == 'male' ){
                                                echo '
                                              <input type="radio" name="gender" checked value="male" id="male">
                                                <label for="male">ذكر</label>
                                                <input type="radio" name="gender" value="female" id="famale">
                                                <label for="famale">انثي</label>
                                            ';
                                            }else{
                                                echo '
                                              <input type="radio" name="gender"  value="male" id="male">
                                                <label for="male">ذكر</label>
                                                <input type="radio" name="gender" checked value="female" id="famale">
                                                <label for="famale">انثي</label>
                                            ';
                                            }


                                        }else{}
                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>الحالة الاجتماعية </label><span class="css-dv1j8g">*</span>
                                    <div class="form-group">

                                        <?php
                                        if (mysqli_num_rows($rungeneraldata)>0){

                                            if ($fetchgeneral['martial_status'] == 'single' ){
                                                echo '
                                              <input type="radio" name="marital_stats" checked value="single" id="Single">
                                            <label for="Single">اعزب</label>
                                            <input type="radio" name="marital_stats" value="Married" id="Marrid">
                                            <label for="Marrid">متزوج</label>
                                            ';
                                            }else{
                                                echo '
                                              <input type="radio" name="marital_stats" value="single" id="Single">
                                            <label for="Single">اعزب</label>
                                            <input type="radio" name="marital_stats" checked value="Married" id="Marrid">
                                            <label for="Marrid">متزوج</label>
                                            ';
                                            }


                                        }else{}
                                        ?>
                                    </div>
                                </div>


                                <div class="col-md-12 mt-4">
                                    <div class="text-center m-auto">
                                        <input type="hidden" value="<?php echo $fetchgeneral['user_id'];?>"  name="userid">
                                        <input type="hidden" value="<?php echo $fetchgeneral['general_id'];?>"  name="general_id">
                                        <input type="submit" class="btn btn-info" name="submitupdate" value="حفظ">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--                 ------------- Career-Interests  ---------------------      -->
                    <div class="tab-pane fade career-interest" id="v-pills-Career-Interests" role="tabpanel" aria-labelledby="v-pills-Career-Interests-tap">
                        <!--                        <h3 class="mb-3">Career Interests</h3>-->
                        <form action="carrerupdate.php" method="post">
                            <div class="row information">

                                <div class="col-md-6 my-3">
                                    <label>المنصب المتقدم لشغله بالطلب</label><span class="css-dv1j8g">*</span>
                                    <select name="position" id="" class="form-control">
                                        <option value="">اختر وظيفة</option>
                                        <?php
                                    $getposition = "SELECT * FROM `position`";
                                    $runqueryposition = mysqli_query($con ,$getposition);

                                    while ($rowposition=  mysqli_fetch_array($runqueryposition)) {
                                        if (mysqli_num_rows($runcareerdata)>0){
                                            if ($fetchdatacareer['position_id'] == $rowposition["position_id"]){
                                                echo '<option value="'.$rowposition["position_id"].'" selected>'.$rowposition["position_name"].'</option>';
                                            }else{
                                                echo '<option value="'.$rowposition["position_id"].'">'.$rowposition["position_name"].'</option>';
                                            }

                                        }else{}
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
                                      if (mysqli_num_rows($runcareerdata)>0){
                                          if ($fetchdatacareer['career_level_id'] == $rowcareer["career_level_id"]){
                                              echo '<option value="'.$rowcareer["career_level_id"].'" selected>'.$rowcareer["career_name"].'</option>';
                                          }else{
                                              echo '<option value="'.$rowcareer["career_level_id"].'">'.$rowcareer["career_name"].'</option>';
                                          }

                                      }else{}

                                  }

                                  ?>
                                    </select>
                                </div>
                                <div class="col-md-6 my-3">
                                    <label>الراتب المتوقع</label> <span class="css-dv1j8g">*</span>
                                    <?php
                                    if (mysqli_num_rows($runcareerdata)>0){
                                       echo '
                                        <input class="form-control" value="'.$fetchdatacareer['salary'].'" name="salaryexpected" type="number" placeholder="الراتب المتوقع">
                                       ';
                                    }else{
                                        echo '
                                        <input class="form-control"  name="salaryexpected" placeholder="الراتب المتوقع">
                                       ';
                                    }

                                    ?>
                                </div>
                                <div class="col-md-6 my-3">
                                    <label>العملة</label><span class="css-dv1j8g">*</span>
                                    <select name="currancy" id="" class="form-control">
                                        <option value="">اختر العملة</option>
                                        <?php
                                        $getcurrancy = "SELECT * FROM `currancy`";
                                        $runquerycurrancy = mysqli_query($con ,$getcurrancy);

                                        while ($rowcurrancy=  mysqli_fetch_array($runquerycurrancy)) {
                                            if (mysqli_num_rows($runcareerdata)>0){
                                                if ($fetchdatacareer['currancy_id'] == $rowcurrancy["currancy_id"]){
                                                    echo '<option value="'.$rowcurrancy["currancy_id"].'" selected>'.$rowcurrancy["currancy_name"].'</option>';
                                                }else{
                                                    echo '<option value="'.$rowcurrancy["currancy_id"].'">'.$rowcurrancy["currancy_name"].'</option>';
                                                }

                                            }else{}

                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>هل انت مدخن؟</label><span class="css-dv1j8g">*</span>
                                    <div class="form-group">
                                        <?php
                                        if (mysqli_num_rows($runcareerdata)>0){
                                            if ($fetchdatacareer['smoke'] == 'yes'){
                                                echo '
                                                 <input type="radio" name="smoke" checked value="Yes" id="Yes">
                                                <label for="Yes">نعم</label>
                                                <input type="radio" name="smoke" value="No" id="No">
                                                <label for="No">لا</label>
                                                ';
                                            }else if ($fetchdatacareer['smoke'] == 'No'){
                                                echo '
                                                <input type="radio" name="smoke" value="Yes" id="Yes">
                                                <label for="Yes">نعم</label>
                                                <input type="radio" name="smoke" checked value="No" id="No">
                                                <label for="No">لا</label>
                                                ';
                                            }else{
                                                echo '
                                                 <input type="radio" name="smoke" value="Yes" id="Yes">
                                                <label for="Yes">نعم</label>
                                                <input type="radio" name="smoke"  value="No" id="No">
                                                <label for="No">لا</label>
                                                ';
                                            }

                                        }else{}

                                        ?>



                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>هل لديك رخصة قيادة؟</label><span class="css-dv1j8g">*</span>
                                    <div class="form-group">
                                        <?php
                                        if (mysqli_num_rows($runcareerdata)>0){
                                            if ($fetchdatacareer['license_drive'] == 'Yes'){
                                                echo '
                                                 <input type="radio" name="license" checked id="licenseYes" value="Yes">
                                                 <label for="licenseYes">نعم</label>
                                                 <input type="radio" name="license" id="licenseNo" value="No">
                                                 <label for="licenseNo">لا</label>
                                                ';
                                            }else if ($fetchdatacareer['license_drive'] == 'No'){
                                                echo '
                                                <input type="radio" name="license" id="licenseYes" value="Yes">
                                                <label for="licenseYes">نعم</label>
                                                <input type="radio" name="license" checked id="licenseNo" value="No">
                                                <label for="licenseNo">لا</label>
                                                ';
                                            }else{
                                                echo '
                                                 <input type="radio" name="license" id="licenseYes" value="Yes">
                                                 <label for="licenseYes">نعم</label>
                                                 <input type="radio" name="license" id="licenseNo" value="No">
                                                 <label for="licenseNo">لا</label>
                                                ';
                                            }

                                        }else{}

                                        ?>


                                    </div>
                                </div>

                                <div class="col-md-6 my-3">
                                    <label>أين ترى نفسك بعد خمس سنوات؟</label> <span class="css-dv1j8g">*</span>

                                    <?php
                                    if (mysqli_num_rows($runcareerdata)>0){
                                        echo '
                                            
                                        <textarea class="form-control" name="fiveyears"  id="fiveyears" cols="30" rows="6" placeholder="أين ترى نفسك بعد خمس سنوات؟">'.$fetchdatacareer['youafterfive'].'</textarea>
                                       ';
                                    }else{
                                        echo '
                                            
                                        <textarea class="form-control" name="fiveyears"  id="fiveyears" cols="30" rows="6" placeholder="أين ترى نفسك بعد خمس سنوات؟"></textarea>
                                       ';
                                    }

                                    ?>

                                </div>





                                <div class="col-md-12 my-3">
                                    <div class="text-center m-auto">
                                        <input type="hidden" name="car_interest_id" value="<?php echo $fetchdatacareer['car_interest_id'];?>">
                                        <input type="submit" name="subcareer" id="subcareer" class="btn btn-info" value="تعديل"></div>
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
                                                        <div class="col-sm-12 edit-exp text-right">
                                                         
                                                         <a href="" data-id="'.$rowexper['experience_id'].'" class="expera" data-toggle="modal" data-target="#editexperience"><i class="icofont-edit-alt"></i></a>
            
                                                      </div>
                                                      <div class="col-sm-10 ">
                                                          <h6 class="display-5 lead">'.$rowexper['job_title'].'</h6><hr>
                                                           <p class="company-name">at  '.$rowexper['company_name'].'</p>
                                                      </div>
                                                      
                                                      <p class="mt-3 px-3">'.$rowexper['date_start'].' -> '.$rowexper['date_end'].'</p> </div>

                                                     ';
                                                  }
                                              }
                                              ?>
                                            <form action="updateexperiance.php" method="post" id="updateExperience">
                                                <!-- Modal -->
                                                <div class="modal fade" id="editexperience" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">تعديل الخبرات</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" id="ressearch">

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                                <input type="submit" name="updateexperiences" value="حفظ" id="" class="btn btn-info mr-3 px-2 pr-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#experience">
                                    + اضافة خبرة عمل
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
                                                <h5 class="modal-title" id="exampleModalCenterTitle">اضافة خبرة عمل</h5>
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
                                                    <label>تاريخ البدء </label>  <span class="css-dv1j8g">*</span>
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
                                                    <input type="number" class="form-control" name="salary" placeholder="المرتب ">
                                                </div>
                                                <div class="col-md-12 my-3">

                                                </div>
                                                <div class="col-md-12 my-3">
                                                    <label>سبب المغادرة  </label>
                                                    <textarea name="leaving" class="form-control" id="" cols="10" rows="5" placeholder="Reason for leaving" maxlength="500"></textarea><span class="text-danger">الحد الأقصى 500 حرف
 </span>

                                                </div>
                                                <div class="col-md-12 my-3">


                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                <input type="submit" name="submitaddexperienceup" id="" class="btn btn-info mr-3 px-3" value="حفظ">
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
                                                      <div class="col-sm-6 p-0">
                                                          <h6 class=""> '.$rowcollege['college_name'].'</h6><hr>
                                                      </div>
                                                      <div class="col-sm-6 text-center">
                                                         <a href="" data_college_id="'.$rowcollege['college_id'].'" class="highschoolajx" data-toggle="modal" data-target="#editHighSchool"><i class="icofont-edit-alt"></i></a>
                                                        
            
                                                      </div>
                                                      <p class="grad-year">سنة التخرج :'.$rowcollege['graduationyear'].'</p>
                                                      
                                                      </div>
                                                      

                                                     ';
                                        }
                                    }

                                    ?>
                                    </div>
                                </div>
                                <!--  Edit Modal-->
                                <div class="modal fade" id="editHighSchool" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="updatehighschool.php" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="highschoolajaxx">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                                    <input type="submit" class="btn btn-primary" name="submit" value="حفظ">
                                                </div>
                                            </form>
                                        </div>
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
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">اضافة مدرسة ثانوية</h5>
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
                                                                    <label>المدرسة الثانوية</label><span class="css-dv1j8g">*</span>
                                                                    <input type="text" class="form-control" placeholder="" id="universityName" name="college" title="Add your University">
                                                                </div>
                                                            </div>
                                                            <!--

-->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>سنة التخرج</label><span class="css-dv1j8g">*</span><br>
                                                                    <select class="years form-control px-4 py-2" required name="yeargraduation">
                                                                        <option disabled selected hidden>سنة التخرج</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <!--

-->
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <input type="submit" name="submitupdate" class="btn btn-primary my-3" value="حفظ">
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
                                                      <div class="col-sm-6 p-0">
                                                          <h6 class=" ">'.$roweducat['university_name'].'</h6><hr>
                                                      </div>
                                                      <div class="col-sm-6 text-center">
                                                         <a href="" data_education_id="'.$roweducat['education_id'].'" class="higheducationajx" data-toggle="modal" data-target="#editHigherEdu"><i class="icofont-edit-alt"></i></a>
                                                     
                                                      </div>
                                                    </div>
                                                      <p class="">'.$roweducat['fields_study'].' / '.$roweducat['endyear'].'</p>
                                                      

                                                     ';
                                        }
                                    }

                                    ?>
                                    </div>
                                </div>
                                <!--Edit Modal -->
                                <div class="modal fade" id="editHigherEdu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل الجامعة</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="updateeducation.php" method="post">
                                                <div class="modal-body" id="educationajax">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                                    <input type="submit" name="updateeducation" class="btn btn-primary" value="حفظ">
                                                </div>
                                            </form>
                                        </div>
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
                                                                        <option disabled selected hidden>اختر الدرجة العلمية</option>
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
                                                        <input type="submit" name="educationupdate" class="btn btn-primary my-3" value="حفظ">
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
                                                      <div class="col-sm-6 px-0">
                                                          <h6 class="">  '.$rowcourse['course_name'].'</h6><hr>
                                                      </div>
                                                      <div class="col-sm-6 text-center">
                                                         <a href="" data_course_id="'.$rowcourse['course_id'].'" class="highcourseajx" data-toggle="modal" data-target="#editTrCourses"><i class="icofont-edit-alt"></i></a>
                                                     
                                                      </div></div>
                                                      <p class="organization">organization Name :- '.$rowcourse['organization_name'].' </p>
                                                      <p class=""> Start: '.$rowcourse['start_date'].' / End: '.$rowcourse['end_date'].'</p>
                                                      
                                                 
                                                     ';
                                      }
                                  }

                                  ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editTrCourses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="updatecourses.php" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="modal-body" id="coueseajax">

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <input type="submit" name="updatecourses" class="btn btn-primary my-3" value="حفظ">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
                                                    <input type="submit" name="coursesupdates" class="btn btn-primary my-3" value="حفظ">
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
                                                      <div class="col-sm-6 skill-name">
                                                          <h6 class="">'.$rowskills['skill_name'].'</h6><hr>
                                                          
                                                      </div>
                                                      <div class="col-sm-6 skill-edit">
                                                          <a href="" data_skill_id="'.$rowskills['skill_id'].'" class="highskillajx" data-toggle="modal" data-target="#editSkills">
                                                              <i class="icofont-edit-alt"></i>
                                                          </a>
                                                      </div>
                                                     ';
                                      }
                                  }
                       ?>
                                    </div>
                                </div>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editSkills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="updateskillss.php" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل المهارات</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="skillupdate">


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                                    <input type="submit" name="submit" class="btn btn-primary" value="حفظ">
                                                </div>
                                            </form>
                                        </div>
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">اضافة مهارات</h5>
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
                                                                /*$getproficiency = "SELECT * FROM `proficiency`";
                                                                $runqueryproficiency = mysqli_query($con ,$getproficiency);

                                                                while ($rowproficiency=  mysqli_fetch_array($runqueryproficiency)) {
                                                                    echo '<option value="'.$rowproficiency["proficiency_id"].'">'.$rowproficiency["proficiency_name"].'</option>';
                                                                }*/

                                                                ?>

                                                                </select>
                                                            </div>
                                                        </div>
-->


                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                                    <input type="submit" class="btn btn-info" name="skilllls" value="حفظ">
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
                                              <div class="col-sm-6">
                                                  <span style="font-size: 20px ; font-weight:400" class="display-5 lead">'.$rowlanguageees['language_name'].'</span> <i class="icofont-long-arrow-right px-2"></i>
                                                  <span style="font-size: 20px ; font-weight:400" class="display-5 lead">'.$rowlanguageees['level_lang_name'].'</span><hr>
                                                  
                                              </div>
                                              <div class="col-sm-6 skill-edit">
                                                          <a href="" data_language_id="'.$rowlanguageees['lang_list_id'].'" class="languageajax" data-toggle="modal" data-target="#editLanguages" class="pt-3">
                                                              <i class="icofont-edit-alt"></i>
                                                          </a>
                                                      </div>
                                             ';
                                      }
                                  }
                                  ?>
                                    </div>
                                </div>
                                <!--Edit Modal -->
                                <div class="modal fade" id="editLanguages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="updatelanguagedata.php" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل اللغة</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="languageupdate">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                                    <input type="submit" name="udatalang" class="btn btn-primary" value="حفظ">
                                                </div>
                                            </form>
                                        </div>
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
                                                    <h5 class="modal-title" id="exampleModalLongTitle">اضافة لغة</h5>
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

                                                    <input type="submit" class="btn btn-info" name="languageees" value="حفظ">
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
                        <form action="onlinelinksupdate.php" method="post">
                            <div class="information ">
                                <div class="p-3">
                                    <div class="col-md-12">
                                        <p class="alert alert-info work">وجودك على الانترنت</p>
                                    </div>

                                    <div class="form-group row">
                                        <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>

                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                                <input type="url"  value="'.$fetchdataonline['linkedin'].'" class="form-control mb-2 " id="linkedin" name="linkedin">
                                                ';
                                            }else{echo '<input type="url"  class="form-control mb-2 " id="linkedin" name="linkedin">';}
                                            ?>
                                        </div>
                                    </div>

                                    <!---->
                                    <div class="form-group row">
                                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                              
                                               <input type="url"  value="'.$fetchdataonline['facebook'].'" class="form-control mb-2 " id="facebook" name="facebook">
                                                ';
                                            }else{echo '<input type="url"  class="form-control mb-2 " id="facebook" name="facebook">';}
                                            ?>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="behance" class="col-sm-2 col-form-label">Behance</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                              <input type="url" class="form-control mb-2 "  value="'.$fetchdataonline['behance'].'"  id="behance" name="behance">
                                               
                                                ';
                                            }else{echo '<input type="url" class="form-control mb-2 "  id="behance" name="behance">';}
                                            ?>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                              
                                               <input type="url" class="form-control mb-2 " value="'.$fetchdataonline['instgram'].'"  id="instagram" name="instagram">
                                                ';
                                            }else{echo '<input type="url" class="form-control mb-2 "  id="instagram" name="instagram">';}
                                            ?>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="gitHub" class="col-sm-2 col-form-label">GitHub</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                               <input type="url" class="form-control mb-2 "  value="'.$fetchdataonline['github'].'"   id="gitHub" name="gitHub">
                                               
                                                ';
                                            }else{echo '<input type="url" class="form-control mb-2 "  id="gitHub" name="gitHub">';}
                                            ?>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="stackoverflow" class="col-sm-2 col-form-label">Stack Overflow</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                            
                                                 <input type="url" class="form-control mb-2 "  value="'.$fetchdataonline['stack_overview'].'"   id="stackoverflow" name="stackoverflow">
                                                ';
                                            }else{echo '<input type="url" class="form-control mb-2 "  id="stackoverflow" name="stackoverflow">';}
                                            ?>
                                        </div>
                                    </div>

                                    <!---->
                                    <div class="form-group row">
                                        <label for="youTube" class="col-sm-2 col-form-label">YouTube</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                             <input type="url" class="form-control mb-2 "  value="'.$fetchdataonline['youtube'].'"  id="youTube" name="youTube">
                                               
                                                ';
                                            }else{echo ' <input type="url" class="form-control mb-2 "  id="youTube" name="youTube">';}
                                            ?>
                                        </div>
                                    </div>
                                    <!---->
                                    <div class="form-group row">
                                        <label for="blog" class="col-sm-2 col-form-label">Blog</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                            
                                               <input type="url" class="form-control mb-2 " value="'.$fetchdataonline['blog'].'"  id="blog" name="blog">
                                                ';
                                            }else{echo '<input type="url" class="form-control mb-2 "   id="blog" name="blog">';}
                                            ?>
                                        </div>
                                    </div>

                                    <!---->
                                    <div class="form-group row">
                                        <label for="website" class="col-sm-2 col-form-label">Website</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                                <input type="url" class="form-control mb-2 " value="'.$fetchdataonline['website'].'" id="website" name="website">
                                               
                                                ';
                                            }else{echo '<input type="url" class="form-control mb-2 "  id="website" name="website">';}
                                            ?>
                                        </div>
                                    </div>

                                    <!---->
                                    <div class="form-group row">
                                        <label for="other" class="col-sm-2 col-form-label">Other</label>
                                        <div class="col-sm-7">
                                            <?php
                                            if (mysqli_num_rows($runonline)>0){
                                                echo '
                                               
                                               <input type="url" class="form-control mb-2 " value="'.$fetchdataonline['others'].'"  id="other" name="other">
                                                ';
                                            }else{echo '<input type="url" class="form-control mb-2 "   id="other" name="other">';}
                                            ?>

                                        </div>
                                    </div>
                                    <!--                                -->



                                    <div class="col-md-12 col-sm-6 my-5">
                                        <input type="hidden" value="<?php echo $fetchdataonline['link_id'] ?>" name="linkid">
                                        <!--                                            <div class="form-group">-->
                                        <div class="text-center m-auto">
                                            <input type="submit" class="mb-2 btn btn-primary" id="submit" name="update" value="حفظ">
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
                        <form action="updateuploadcv.php" method="post" enctype="multipart/form-data">
                            <div class="row information">

                                <div class="col-md-6 my-3 mb-5">
                                    <label>يرجى تحميل سيرتك الذاتية </label><span class="css-dv1j8g">*</span>
                                    <?php
                                    if (mysqli_num_rows($runCV)>0){
                                        $fetchcv=mysqli_fetch_array($runCV);
                                        echo '<div class="row mb-5">
                                         <div class="form-group col-md-6">
                                         <input type="file" id="input02" multiple="multiple" value="'.$fetchcv['cv_url'].'" class="filestyle" name="file">
                                         </div>
                                         
                                          <div class="col-md-6 pl-0">
                                            <div class="text-left col-auto">
                                                <a href="deletecv.php?cv_id='.$fetchcv['cv_id'].'"  name="cv" id="" class="btn btn-danger">Delete Your CV</a>
                                            </div>
                                        </div>
                                        </div>
                                        ';
                                    }else{
                                        echo '
                                         <div class="form-group">
                                         <input type="file" id="input02" multiple="multiple"  class="filestyle" name="file">
                                         </div>
                                         
                                        
                                        ';
                                    }
                                    ?>


                                   
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
                        <form class="form" action="updateachievemrnts.php" method="post" enctype="multipart/form-data">
                            <div class="container">
                                <div class="alert alert-primary mx-4" role="alert">
                                     يرجى تحميل الصور فقط .jpg ، .png ...
                                </div>
                                <div class="row information">
                                    <div class="col-md-6">
                                        <input type="file" accept="image/*" id="input01" multiple="multiple" class="filestyle" name="file[]">
                                        <div class="achievement py-3"></div>
                                        <input type="button" id="btn2" class="btn btn-secondary" value="تحميل المزيد">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="certificates">
                                        <div class="m-auto">
                                            <div class="row">
                                                <?php
                                                if (mysqli_num_rows($runcertification)>0){
                                                    $i=0;
                                                    while ($fetchdatacertification=mysqli_fetch_array($runcertification)){
                                                        $i++;
                                                        echo '
                                    <div class="col-md-4 img-col col-sm-6 my-3 mx-auto text-center"><a href="#ex'.$i.'" rel="modal:open" id="imgModal"><img src="certifcations/'.$fetchdatacertification['certification_url'].'" class="img-fluid"> </a>
                                    <a href="deleteceryify.php?certifcation_id='.$fetchdatacertification['certification_id'].'"  class="btn btn-danger my-4">Remove</a>
                                    
                                    </div>

                                                <!-- Modal HTML embedded directly into document -->
                                                <div id="ex'.$i.'" class="modal img-modal">
                                                    <img src="certifcations/'.$fetchdatacertification['certification_url'].'" class="img-fluid">

                                                </div>

                                               
                                                        ';
                                                    }
                                                }else{

                                                }

                                                ?>



                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 my-3  ">
                                    <div class="text-center col-auto">
                                        <input type="submit" name="acheive" value="حفظ" id="" class="btn btn-info ">
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
<!-- jQuery Modal -->

    <link rel="stylesheet" href="css/jQueryModal.css" />
    <script src="js/jQueryModal.js"></script>
    
<!--    Date Picker-->
  <script src="js/jquery-datePicker.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<!--    File Style-->
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
<style>
        .img-modal{
            width: auto !important;
        }
    </style><style>
        .img-modal{
            width: auto !important;
        }
    </style>

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
            
            if (txt != "") {

                $.ajax({
                    url: "experianceajax4.php", //action
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

        /*         to get information of highbschool from data base          */

        $(".highschoolajx").on("click", function() {
            var txt = $(this).attr("data_college_id");
           
            if (txt != "") {

                $.ajax({
                    url: "highschoolajax.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#highschoolajaxx").html(data);
                    }
                });
            }
        });

        /*         to get information of high education ajx from data base          */
        $(".higheducationajx").on("click", function() {
            var txt = $(this).attr("data_education_id");
            
            if (txt != "") {

                $.ajax({
                    url: "higheducationajax.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#educationajax").html(data);
                    }
                });
            }
        });

        /*         to get information of high courses ajx from data base          */
        $(".highcourseajx").on("click", function() {
            var txt = $(this).attr("data_course_id");
            
            if (txt != "") {

                $.ajax({
                    url: "updatecourseajax.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#coueseajax").html(data);
                    }
                });
            }
        });

        /*         to get information of skills ajax from data base          */
        $(".highskillajx").on("click", function() {
            var txt = $(this).attr("data_skill_id");
           
            if (txt != "") {

                $.ajax({
                    url: "ajaxskilldata.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#skillupdate").html(data);
                    }
                });
            }
        });

        /*         to get information of languages ajax from data base          */
        $(".languageajax").on("click", function() {
            var txt = $(this).attr("data_language_id");
           
            if (txt != "") {

                $.ajax({
                    url: "ajaxlanguagedata.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {
                        $("#languageupdate").html(data);
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
    
//    updateExperience
    $('#updateExperience').on("submit",function(){
       
        var date1 = new Date($("#dateStarted").val());    
        var date2 = new Date($("#dateEnd").val());

        if(date1.getTime()  >= date2.getTime()){
            $('.DateError').css('display','block');
//            console.log('erroooooor');
            return false;
        }else{
            return true;
        }
  
        $('#updateExperience').submit();
        
       
    });
    
//    $('#updateExperience').on('click', function(){
//  var dateend = new Date($('#dateEnd').val());
//  var datestart = new Date($('#dateStarted').val());
//  day = dateend.getDate();
//  month = dateend.getMonth() + 1;
//  year = dateend.getFullYear();
//  alert([day, month ,year]);
//});

</script>
