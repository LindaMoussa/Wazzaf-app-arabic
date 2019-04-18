<?php
require './checksession.php';


if(!isset($_SESSION["id"])  || $_SESSION["type"] != "2" ) {
    header("location:logout.php");

}else{


}
require './db/connect.php';

// get general data
$selectgeneraldata="SELECT * FROM general_information g JOIN nationaliity n ON g.nationality_id=n.nationality_id JOIN countries c ON g.country_id =c.country_id  JOIN religion r ON g.religion_id =r.religion_id ";
$rungeneraldata=mysqli_query($con , $selectgeneraldata);



// get career data
$selectcareerdata="SELECT * FROM career_interest c JOIN career_level l ON c.career_level_id=l.career_level_id JOIN position p ON c.position_id=p.position_id ";
$runcareerdata=mysqli_query($con , $selectcareerdata);


/*  get experiance data */
$selectexperiencesdata="SELECT * FROM `experiences`";
$runexperiences=mysqli_query($con , $selectexperiencesdata);


/*  get language data   */
$selectlanguage_listdata="SELECT * FROM language_list l JOIN languages g ON l.language_id = g.language_id JOIN language_level v ON l.level_lang_id = v.level_lang_id ";
$runlanguage_list=mysqli_query($con , $selectlanguage_listdata);


/*  get courses data */
$selectcoursestraindata="SELECT * FROM `coursestraining`";
$runcoursestrain=mysqli_query($con , $selectcoursestraindata);


/*  get online links data */
$selectonlinedata="SELECT * FROM `onlinelinks` ";
$runonline=mysqli_query($con , $selectonlinedata);



/*  get CV data */
$selectCVdata="SELECT * FROM `uploadcv`";
$runCV=mysqli_query($con , $selectCVdata);
if (mysqli_num_rows($runCV)>0) {
    $fetchCV = mysqli_fetch_array($runCV);
}else{

}



?>

<!doctype html>
<html lang="en">

<head>
    <title>Employees</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/icofont/icofont.min.css">
    <link rel="stylesheet" href="css/employees.css">
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
                    <span><i class="icofont-navigation-menu"></i></span>
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
        <!--        <img src="imges/btnAsset%201.png">-->
    </section>
  
    <section class="mt-3 filters">
        <div class="container-fluid my-4">

            <div id="filterIcon" class="row closed-filters justify-content-center">
                <div class="col-md-1 mt-4 pb-3 col-3">
                    <div class=" mx-auto">
                        <a href="javascript:void(0)"><img src="imges/closedAsset%202.png" class="filterimg w-50" data-toggle="tooltip" data-placement="bottom" title="Filters"></a>
                    </div>
                </div>
                <div class="col-md-4 mt-3 col-sm-6 col-6 filter">
                    <form>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-4 col-12 col-form-label">المسمي الوظيفي</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="positionwork" class="positionworks">
                                    <option value="0">اختر الوظيفة </option>
                                    <?php
                                    $selectposition = "SELECT * FROM `position`";
                                    $runposition = mysqli_query($con , $selectposition);
                                    while ($row = mysqli_fetch_array($runposition)){
                                        echo  '<option value="'.$row['position_id'].'">'.$row['position_name'].'</option>';

                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <!----------------------------------------------------------------------->
                <div class="col-md-4 mt-3 col-sm-6 col-6 filter">
                    <form>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-4 col-12 col-form-label">مستوى الخبرة</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="level" class="levels">
                                    <option value="0">اختر مستوى الخبرة </option>
                                    <?php
                                    $selectcareer_level_id = "SELECT * FROM `career_level`";
                                    $selectcareer_level_id = mysqli_query($con , $selectcareer_level_id);
                                    while ($rows = mysqli_fetch_array($selectcareer_level_id)){
                                        echo  '<option value="'.$rows['career_level_id'].'">'.$rows['career_name'].'</option>';

                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <!------------------------------------------------------------------->
                <!------------------------------------------------------------------->
                <div class="col-md-4 mt-3 col-sm-6 col-6 filter">
                    <form>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-4 col-12 col-form-label">البلد</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="countries" class="countriess">
                                    <option value="0">اختر البلد </option>
                                    <?php
                                    $selectcountries = "SELECT * FROM `countries`";
                                    $runcountries = mysqli_query($con , $selectcountries);
                                    while ($rowcountries = mysqli_fetch_array($runcountries)){
                                        echo  '<option value="'.$rowcountries['country_id'].'">'.$rowcountries['nicename'].'</option>';

                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                    </form>
                </div>     
                <!------------------------------------------------------------------->
               
                
                
                
<!---------------------- Filter Button ------------------------>
                <div class="col-md-1 col-3 col-sm-3 pt-2 mt-1"><button type="submit" id="filterBtn" class="btn btn-primary">بحث</button></div>
                
            </div>
        </div>
    </section>
    <?php

    if (mysqli_num_rows($rungeneraldata)>0) {
        while ($fetchgeneral = mysqli_fetch_array($rungeneraldata)) {
            /*  get skills data   */
            $selectskillsdata="SELECT * FROM skills WHERE user_id='". $fetchgeneral['user_id']."'";
            $runskills=mysqli_query($con , $selectskillsdata);
            // get career data
            $selectcareerdata="SELECT * FROM career_interest c 
                                JOIN career_level l ON c.career_level_id=l.career_level_id 
                                JOIN position p ON c.position_id=p.position_id 
                                WHERE user_id='". $fetchgeneral['user_id']."'";
            $runcareerdata=mysqli_query($con , $selectcareerdata);
            if (mysqli_num_rows($runcareerdata)>0){
                $fetchcareerdata=mysqli_fetch_array($runcareerdata);
            }else {
            }
    echo ' 
    <section class="emp numberemp " id="yy">
        <div class="emp-card border mx-auto ">
            <div class="container m-auto pb-0">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mx-auto">
                        <div class="emp-img m-auto">
                            <a href="profiletocompany.php?user_id='.$fetchgeneral["user_id"].'">
                                <img class="img-fluid" src="upload/'.$fetchgeneral['image_name'].'">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <div class="">
                            <a href="profiletocompany.php?user_id='.$fetchgeneral["user_id"].'">
                                <h3 class="emp-name pb-3">
                                      '. $fetchgeneral["fullname"].'
                                </h3>
                            </a>';
              if (mysqli_num_rows($runcareerdata)>0){
                   echo'<h6 class="emp-job-title pb-3">'.$fetchcareerdata['position_name'].'</h6>';
              }else{}
                  while ($fetchskillsdata=mysqli_fetch_array($runskills)){
                      if (mysqli_num_rows($runskills)>0){
                          echo '
                            <span class="emp-p px-1 skill" style="font-size: 18px" >'.$fetchskillsdata['skill_name'].'</span> ';
                      }else
                      {}
                  }
              echo'

                            
                        </div>
                    </div>
                   
                </div>
                 <div class="row emp-contacts mt-3">
                                <div class="col-md-12  mb-3 text-center contacts">
                                </div>
                                <div class="col-md-6 border-top border-right py-2 px-0">
                                    <a href="">
                                        <p class="emp-contact"><span> ' . $fetchgeneral["email"] . '</span></p>
                                    </a>
                                </div>
                                
                                <div class="col-md-6 border-top border-left py-2 px-0">
                                    <a href="">
                                        <p class="emp-contact"><span> ' . $fetchgeneral["mobile"] . ' </span> </p>
                                    </a>
                                </div>
                            </div>
            </div>
        </div>
    </section> ';
              }
    }else{

    }
    ?>

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
            <div class="row mt-3 pb-2">
                <div class="col-md-12 text-center">
                    <p class="allRights"> © 2019 Pure Vision Company All rights reserved.</p>
                </div>
            </div>

        </div>

    </footer>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
    <!--    Filters display-->
    <script>
        $(document).ready(function() {

            var isClicked = true;

                $('#filterIcon a').click(function() {
                     
                    if (isClicked) {
                         
                        $('#filterIcon').addClass('opened-filters');
                        $('#filterIcon a img').attr("src", 'imges/openedAsset%203.png');
                        $('#filterIcon .filter').css('visibility', 'visible');
                        $('#filterBtn').css('display','block');
                        $('#filterIcon').removeClass('closed-filters');
                        
                        // remove closed add open 
                        isClicked = !isClicked;
                        
                    }
                    else {
                        
                            $('#filterIcon').addClass('closed-filters');
                            $('#filterIcon a img').attr("src", 'imges/closedAsset%202.png');
                            $('#filterIcon .filter').css('visibility', 'hidden');
                            $('#filterBtn').css('display','none');
                            $('#filterIcon').removeClass('opened-filters');
                            isClicked = !isClicked;
                            
                    }

                });


            //            $('#filterIcon.opened-filters a').click(function(){
            //                console.log('gggggggg');
            //                alert("ffffff");
            //                $('.opened-filters').addClass('closed-filters');       
            //                $('.opened-filters a img').attr("src",'imges/closedAsset%202.png');
            //                $('.opened-filters .filter').css('visibility','visible');
            //                $('.opened-filters').removeClass('opened-filters');
            //            });

        });

    </script>
</body>

</html>
<script>
    $(document).ready(function() {
      /*  //        to get data of position work
        $("#positionwork").change(function() {
            var txt = $(this).val();
           var level = $("#level").val();
            if (txt != "") {

                $.ajax({
                    url: "positionuserdata.php", //action
                    method: "POST",
                    data: {
                        search: txt ,
                        search1 :level
                    },
                    dataType: "text",
                    success: function(data) {

                        $(".numberemp").html("");
                        $("#yy").html(data);
                    }
                });
            }
        });

        //        to get data of position work
        $("#level").change(function() {
            var txt = $(this).val();
            if (txt != "") {

                $.ajax({
                    url: "leveluserdata.php", //action
                    method: "POST",
                    data: {
                        search: txt
                    },
                    dataType: "text",
                    success: function(data) {

                        $(".numberemp").html("");
                        $("#yy").html(data);
                    }
                });
            }
        });
*/
        //        to get code number of countries
        $("#filterBtn").on("click",function() {

            var country = $("#countries").val();
            var level = $("#level").val();
            var position = $("#positionwork").val();


                $.ajax({
                    url: "countriesuserdata.php", //action
                    method: "POST",
                    data: {
                        countrys: country,
                        levels :level,
                        position:position
                    },
                    dataType: "text",
                    success: function(data) {

                        $(".numberemp").html("");
                        $("#yy").html(data);
                    }
                });

        });
    });

</script>
