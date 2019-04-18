<?php
    require 'checksession.php';

if(!isset($_SESSION["id"])  ) {
    header("location:signup-ar.php");
    }
    require 'db/connect.php';
$userid=$_GET['user_id'];
// get general data
$selectgeneraldata="SELECT * FROM general_information g 
                    JOIN nationaliity n ON g.nationality_id=n.nationality_id 
                    JOIN countries c ON g.country_id =c.country_id  
                    JOIN religion r ON g.religion_id =r.religion_id 
                    WHERE user_id='$userid'";
$rungeneraldata=mysqli_query($con , $selectgeneraldata);



// get career data
$selectcareerdata="SELECT * FROM career_interest c 
                    JOIN career_level l ON c.career_level_id=l.career_level_id 
                    JOIN position p ON c.position_id=p.position_id 
                    JOIN  currancy cu ON c.currancy_id = cu.currancy_id
                    WHERE user_id='$userid'";
$runcareerdata=mysqli_query($con , $selectcareerdata);



/*  get experiance data */
$selectexperiencesdata="SELECT * FROM `experiences` WHERE user_id='$userid'";
$runexperiences=mysqli_query($con , $selectexperiencesdata);



/*  get skills data   */
$selectskillsdata="SELECT * FROM skills   WHERE user_id='$userid'";
$runskills=mysqli_query($con , $selectskillsdata);


/*  get language data   */
$selectlanguage_listdata="SELECT * FROM language_list l 
                            JOIN languages g ON l.language_id = g.language_id 
                            JOIN language_level v ON l.level_lang_id = v.level_lang_id  
                            WHERE user_id='$userid'";
$runlanguage_list=mysqli_query($con , $selectlanguage_listdata);


/*  get courses data */
$selectcoursestraindata="SELECT * FROM `coursestraining` WHERE user_id='$userid'";
$runcoursestrain=mysqli_query($con , $selectcoursestraindata);


/*  get online links data */
$selectonlinedata="SELECT * FROM `onlinelinks` WHERE user_id='$userid'";
$runonline=mysqli_query($con , $selectonlinedata);



/*  get CV data */
$selectCVdata="SELECT * FROM `uploadcv` WHERE user_id='$userid'";
$runCV=mysqli_query($con , $selectCVdata);

/*  get college data */
$selectcollegedata="SELECT * FROM `college` WHERE user_id='".$userid."'";
$runCollege=mysqli_query($con , $selectcollegedata);


/*  get Education data */
$selecteducationdata="SELECT * FROM education e 
                        JOIN degree_level d ON e.degree_id=d.degree_id 
                        JOIN grade g ON e.grade_id = g.grade_id  
                        WHERE user_id='".$userid."'";
$runeducation=mysqli_query($con , $selecteducationdata);

/*  get college data */
$selectcertificationdata="SELECT * FROM `certification` WHERE user_id='".$userid."'";
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
    <link rel="stylesheet" href="css/profiletocompany.css">
    <link rel="shortcut icon" href="imges/search.png">
        <title>SuperCareer</title>

   <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">
   
</head>

<body>

    <section class="header">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent, #navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-white"><i class="icofont-navigation-menu"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto ">
                        
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

    <section class="profile-cv py-5">
        <div class="container py-5">
             <div class="back-btn">
                    <a href="employees-ar.php" data-toggle="tooltip" data-placement="bottom" title="Back">
                        <i class="icofont-hand-drawn-left"></i>
                    </a>
                </div>
            <div class="employee">
                <div class="row mt-3">
                    <div class="col-md-3 col-7 mx-auto mb-5">
                        <div class="image">
                            <?php
                                if (mysqli_num_rows($rungeneraldata)>0){
                                    $fetchgeneral=mysqli_fetch_array($rungeneraldata);
                                    echo "<img src='upload/".$fetchgeneral['image_name']."' class='img-fluid'>";
                                }else{

                                }
                                ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="caption ml-4">

                            <h4 class="name mb-3">
                                <?php if (mysqli_num_rows($rungeneraldata)>0){ echo $fetchgeneral['fullname']; } else { } ?>
                            </h4>

                            <?php if (mysqli_num_rows($runcareerdata)>0){
                                    $fetchcareer = mysqli_fetch_array($runcareerdata);
                                    echo " <p class='title-work'> " . $fetchcareer['position_name']." </p>"; } else { echo ''; }
                                ?>


                            <?php if (mysqli_num_rows($rungeneraldata)>0){ echo '<p class="country">'. $fetchgeneral['city_name'] .' , '.$fetchgeneral['nicename'] .'</p>';
                                } else { } ?>



                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div class="icon">
                            <?php
                                if (mysqli_num_rows($runonline)>0) {
                                    $fetchonline = mysqli_fetch_array($runonline);

                                    echo '
                                    
                                    <a href="'.$fetchonline["facebook"].'" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="'.$fetchonline["stack_overview"].'" target="_blank"><i class="fab fa-stack-overflow"></i></a>
                                    <a href="'.$fetchonline["github"].'" target="_blank"><i class="fab fa-github"></i></a>
                                    <a href="'.$fetchonline["linkedin"].'" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="'.$fetchonline["instgram"].'" target="_blank"><i class="fab fa-instagram"></i></a> 
                                    ';
                                }else{
                                    echo "";
                                }

                                ?>


                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="info">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="general-info mt-3 pb-5">


                                <h3 class="mb-4 pb-3 title"><span><i class="icofont-info px-1"></i></span>معلومات عامة</h3>
                                <div class="ml-5">
                                    <h5 class="py-2"><b>تاريخ الميلاد:</b><span>
                                            <?php if (mysqli_num_rows($rungeneraldata)>0){ echo $fetchgeneral['birthday']; } else { } ?>
                                        </span></h5>

                                    <?php if (mysqli_num_rows($runcareerdata)>0){
                                            $salaryint = intval($fetchcareer['salary']);
                                    echo " <h5 class='title-work py-2'><b>experience level:</b>   ".$fetchcareer['career_name']." </h5>
                                            <h5 class='title-work'> <b>Expected Salary:</b> <span> ".$salaryint."</span> <span> ".$fetchcareer['currancy_name']."</span></h5>
 
                                        ";

                                } else { echo ''; }
                                ?>


                                    <h5 class="pt-2"><b>الحالة الاجتماعية: </b><span>
                                            <?php if (mysqli_num_rows($rungeneraldata)>0){ echo $fetchgeneral['martial_status']; } else { } ?>
                                        </span></h5>
                                    <h5 class="pt-2"><b>النوع: </b><span>
                                            <?php if (mysqli_num_rows($rungeneraldata)>0){ echo $fetchgeneral['gender']; } else { } ?>
                                        </span></h5>
                                    <h5 class="pt-2"><b>الديانة: </b><span>
                                            <?php if (mysqli_num_rows($rungeneraldata)>0){ echo $fetchgeneral['religion_name']; } else { } ?>
                                        </span></h5>

                                    <h5 class="pt-2"><b>الجنسية: </b><span>
                                            <?php if (mysqli_num_rows($rungeneraldata)>0){ echo $fetchgeneral['nationality_enNationality']; } else { } ?>
                                        </span>
                                    </h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info ml-3 mt-3">
                                <h3 class="mb-4 pb-3 title"><span><i class="icofont-contacts px-2"></i></span>بيانات التواصل</h3>
                                <div class="ml-5">
                                    <h6 class="mb-4">
                                        <div class="row">
                                            <div class="col-1"><i class="icofont-iphone mr-3"></i></div>
                                            <div class="col-11"><?php if (mysqli_num_rows($rungeneraldata)>0){ echo $fetchgeneral['mobile']; } else { } ?></div>
                                            
                                        
                                        </div>
                                    </h6>
                                    <h6 class="mb-4 email">
                                         <div class="row">
                                            <div class="col-1">
                                                <i class="icofont-envelope mr-3"></i>
                                            </div>
                                            <div class="col-11">
                                                <?php if (mysqli_num_rows($rungeneraldata)>0){ echo $fetchgeneral['email']; } else { } ?>
                                            </div>
                                        </div>

                                    </h6>
                                  <!--  --><?php
/*                                    if (mysqli_num_rows($runCV)>0) {
                                        $fetchCV = mysqli_fetch_array($runCV);
                                        echo '
                                         <h6 class="mb-4"><i class="icofont-file-alt mr-3"></i><a href="personcv/'.$fetchCV['cv_url'].'" target="_blank">Download CV </a></h6>
                                        ';
                                    }else{

                                    }*/
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Education  -->
                <div class="experience">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="edu mt-2 pb-5">
                                <h3 class="pb-3 mb-4 title"><span><i class="icofont-book px-2"></i></span>التعليم</h3>
                                <div class="caption ml-5">
                                    <?php
                                    if (mysqli_num_rows($runCollege)>0){
                                        while ($fetchcollege=mysqli_fetch_array($runCollege)){
                                            echo '
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <h5><b>الثانوية: </b><span class="school-name">'.$fetchcollege['college_name'].'</span></h5>             
                                                    <h6><b>سنة التخرج: </b><span>'.$fetchcollege['graduationyear'].'</span></h6> 
                                                
                                                </div>
                                            </div>
                                            
                                            ';
                                        }

                                    }else{

                                    }



                                    if (mysqli_num_rows($runeducation)>0){
                                        while ($fetcheducation=mysqli_fetch_array($runeducation)){
                                            echo '
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <h5><b>الجامعة:</b>  <span class="uni-name">'.$fetcheducation['university_name'].'</span></h5>
                                                    <h6><b>التقدير: </b> <span>'.$fetcheducation['degree_name'].'</span></h6>
                                                    <h6><b>مجالات الدراسة: </b> <span>'.$fetcheducation['fields_study'].'</span></h6>
                                                    <h6><b>سنة التخرج: </b> <span>'.$fetcheducation['endyear'].'</span></h6>
                                                    <h6><b>التقدير:  </b> <span>'.$fetcheducation['grade_name'].'</span></h6>
                                                </div>
                                            </div>
                                            
                                            ';
                                        }

                                    }else{

                                    }


                                    ?>
                                    

                                    
                                    


                                </div>
                            </div>
                        </div>




                        <div class="col-md-6 ">
                            <div class="exper mt-2">
                                <h3 class="pb-3 mb-4 title"><span><i class="icofont-worker px-2"></i></span>خبرات العمل</h3>
                                <div class="caption ml-5">
                                    <?php

                                    if (mysqli_num_rows($runexperiences)>0){

                                        while ($fetchexperiences=mysqli_fetch_array($runexperiences)){
                                            $date1 = $fetchexperiences['date_start'];
                                            $date2 = $fetchexperiences['date_end'];
                                            $diff = abs(strtotime($date2) - strtotime($date1));
                                            $years = floor($diff / (365*60*60*24));
                                            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                            echo '<h5><b>'.$fetchexperiences['job_title'].'</b> &nbsp; في &nbsp; <b> '.$fetchexperiences['company_name'].'</b></h5>';

                                            $originalDateF = "{$date1}";
                                            $newDateF = date("d-m-Y", strtotime($originalDateF));

                                            $originalDateT = "{$date2}";
                                            $newDateT = date("d-m-Y", strtotime($originalDateT));

                                            echo '<p><b>من : </b>'.$newDateF.'    <span>  &nbsp; &nbsp; &nbsp;</span><b>الي : </b>'.$newDateT.'</p>';
                                            echo '<p> '.$years.' Years  '.$months.' months '.$days.' days </p>';
                                        }

                                    }else{

                                    }

                                    ?>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="lan-cor">
                    <div class="row">

                        <div class="col-md-6 ">
                            <div class="language pb-5">
                                <h3 class="pb-3 mb-4 title"><span><i class="icofont-globe px-2"></i></span>اللغات</h3>
                                <div class="ml-5">
                                    <?php
                                if (mysqli_num_rows($runlanguage_list)>0) {

                                    while ($fetchlanguage_list = mysqli_fetch_array($runlanguage_list)){
                                        echo '
                                            
                                             <span><b>'.$fetchlanguage_list['language_name'].'</b> <i class="icofont-long-arrow-right"></i> </span>
                                             <span> '.$fetchlanguage_list['level_lang_name'].'</span>
                                             <br>       
                                        ';
                                    }

                                }else{

                                }

                                ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="skill">
                                <h3 class="pb-3 mb-4 title"><span><i class="icofont-brain-alt px-2"></i></span>المهارات</h3>
                                <div class="ml-5">
                                    <div class="row">

                                    <?php

                                    if (mysqli_num_rows($runskills)>0){
                                        while ($fetchskills=mysqli_fetch_array($runskills)){
                                            echo '
                                            
                                              <div class="col-md-6 my-1">
                                               <span><i class="icofont-minus px-1"></i></span><span class="skillname"><b>'
                                                .$fetchskills['skill_name'].'</b></span>  <br/>                         </div>                                           
                                            ';
                                        }

                                    }else{
                                        echo "";
                                    }
                                ?>


                                    <!-- Button trigger modal -->

                                   </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="courses-certif">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="courses pb-5">

                                <h3 class="pb-3 mb-4 title"><span><i class="icofont-badge px-1"></i> </span>الدورات و التدريبات</h3>
                                <div class="ml-5">
                                    <?php
                                if (mysqli_num_rows($runcoursestrain)>0) {

                                    while ($fetchcoursestrain = mysqli_fetch_array($runcoursestrain)){
                                        $originalDate = "{$fetchcoursestrain['start_date']}";
                                        $newDate = date("d-m-Y", strtotime($originalDate));

                                        $originalDate1 = "{$fetchcoursestrain['end_date']}";
                                        $newDate1 = date("d-m-Y", strtotime($originalDate1));

                                        echo '
                                              <p><b>'.$fetchcoursestrain['course_name'].' &nbsp;</b> <span> في </span> &nbsp; <b>'.$fetchcoursestrain['organization_name'].' </b></p>
                                              <p>'.$newDate.'<span>&nbsp; to &nbsp;</span>'.$newDate1.' </p>
                                        
                                        ';
                                    }

                                }else{

                                }

                                ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="certificates">

                                <h3 class="pb-3 mb-4 title"><span><i class="icofont-certificate px-1"></i> </span>الشهادات</h3>
                                <div class="ml-5">
                                    <div class="row">
                                        <?php
                                        $i=0;
                                        if (mysqli_num_rows($runcertification)>0){

                                            while ($fetchcertify=mysqli_fetch_array($runcertification)){
                                                $i++;
                                             echo '
                                             
            <div class="col-md-4 img-col col-sm-6"><a href="#ex'.$i.'" rel="modal:open"><img src="certifcations/'.$fetchcertify['certification_url'].'" class="img-fluid"> </a></div>
            
            <!-- Modal HTML embedded directly into document -->
            <div id="ex'.$i.'" class="modal img-modal">
            <img src="certifcations/'.$fetchcertify['certification_url'].'" class="img-fluid">
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
                    <a href=""><p>Profile</p></a>
                    <a href=""><p>Profile</p></a>
                    <a href=""><p>Profile</p></a>

                </div>
                <div class="col-md-4">
                    <h6>About us</h6>
                    <a href="#aboutUs"><p>About us</p></a>
                </div>
                <div class="col-md-4">
                    <h6>Contact us</h6>
                    <a href="#contactUs"><p>Contact us</p></a>
                    <div class="mt-5">
                        <a href="https://www.facebook.com/Purevision-274076099895867/"><i class="icofont-facebook"></i></a>
                        <a href="https://twitter.com/purevision17"><i class="icofont-twitter"></i></a>
                        <a href=""><i class="icofont-linkedin"></i></a>
                        <a href="https://plus.google.com/u/0/103056900203929165300"><i class="icofont-google-plus"></i></a>

                    </div>
               </div>
            </div>

        </div>

    </footer>
    
    <style>
        .img-modal{
            width: auto !important;
            height: auto !important;
        }
    </style>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    
     <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

 
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>
