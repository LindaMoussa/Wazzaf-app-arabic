<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/26/2019
 * Time: 1:00 PM
 */

require_once ('../db/connect.php');
header('content-type:application/json');

$selectuser = "
    Select user_id 
    from users
";
$runuser = mysqli_query($con , $selectuser);

if (mysqli_num_rows($runuser) >0){
while ($fetchuser = mysqli_fetch_assoc($runuser)) {


    $data = $fetchuser;
    $arrayusers = $data;
    /*--------------------------------------------------------------------------------------------*/
    $selectgeneral = "
   SELECT `general_id`, 
      `fullname`, 
       `birthday`, 
       `address`, 
       `email`, 
       `civil_id_no`, 
       `telephone`, 
       `mobile`, 
       `gender`, 
       `martial_status`, 
       n.nationality_enNationality, 
       c.nicename, `city_name`, 
       r.religion_name, 
        image_name 
FROM general_information g 
LEFT JOIN countries c ON g.country_id = c.country_id 
LEFT JOIN religion r ON g.religion_id = r.religion_id 
LEFT JOIN nationaliity n ON g.nationality_id = n.nationality_id 
WHERE user_id='" . $fetchuser['user_id'] . "'
    
";
    $rungeneral = mysqli_query($con, $selectgeneral);
    $fetchgeneral = mysqli_fetch_assoc($rungeneral);


    $imagedata = file_get_contents("../upload/" . $fetchgeneral['image_name']);
    // alternatively specify an URL, if PHP settings allow
    $base64 = base64_encode($imagedata);
    /*   var_dump($base64);die();*/
    /*$image="../upload/".$fetchgeneral['image_name'];
*/
    $baseimage = array("image_name" => $base64);

    $data1 = array_merge($fetchgeneral, $baseimage);

    $arraygeneral = array("general" => $data1);
    /*--------------------------------------------------------------------------------------------*/
    $selectcollege = "
    SELECT   `college_id`,
             `college_name`, 
             `graduationyear`
    FROM college
    WHERE user_id ='" . $fetchuser['user_id'] . "'
    ";

    $runcollege = mysqli_query($con, $selectcollege);
    $fetchcollege = mysqli_fetch_assoc($runcollege);
    $data3 = $fetchcollege;
    $arraycollege = array("college" => $data3);
    /*--------------------------------------------------------------------------------------------*/
    $selecteducation = "
     SELECT `education_id`, 
            `university_name`,
            `fields_study`,
            `endyear`, 
            dg.degree_name, 
            gr.grade_name
     FROM education e 
     LEFT JOIN degree_level dg ON e.degree_id = dg.degree_id 
     LEFT JOIN grade gr ON e.grade_id = gr.grade_id
     WHERE  user_id ='" . $fetchuser['user_id'] . "'
     ";

    $runeducation = mysqli_query($con, $selecteducation);
    $fetcheducation = mysqli_fetch_assoc($runeducation);
    $data4 = $fetcheducation;
    $arrayeducation = array("education" => $data4);

    /*--------------------------------------------------------------------------------------------*/

    $selectresult = "
     SELECT `result_id`,
            `degree_english`, 
            `degree_iq`,
            `final_degree`,
            
     FROM resultexams  
    
     WHERE  user_id ='".$fetchuser['user_id']."'
     ";

    $runresultexams = mysqli_query($con, $selectresult);
    if (mysqli_num_rows($runresultexams) > 0) {

    $fetchresultexams = mysqli_fetch_assoc($runresultexams);
    $data5 = $fetchresultexams;
    $arrayresult = array("result" => $data5);
}else
    {
        $arrayresult = array("result" => "NO Data Yet");
    }
    /*--------------------------------------------------------------------------------------------*/
    $selectonlinelinks= "
     SELECT `link_id`, 
      `linkedin`,
       `facebook`, 
       `behance`, 
       `instgram`, 
       `github`, 
       `stack_overview`, 
       `youtube`,
       `blog`,
       `website`,
       `others`
  FROM `onlinelinks` 
  WHERE user_id ='".$fetchuser['user_id']."'
     ";

    $runonlinelinks = mysqli_query($con , $selectonlinelinks);
    $fetchonlinelinks = mysqli_fetch_assoc($runonlinelinks);
    $data6 =  $fetchonlinelinks;
    $arrayonlinelinks = array("onlinelinks" => $data6);

    /*--------------------------------------------------------------------------------------------*/

    $selectlanguage_list= "
     SELECT `lang_list_id`,
      laname.language_name,
       lalevel.level_lang_name
 FROM language_list la 
 LEFT JOIN languages laname ON la.language_id = laname.language_id
 LEFT JOIN language_level lalevel ON la.level_lang_id = lalevel.level_lang_id
 WHERE user_id='".$fetchuser['user_id']."'
     ";

    $runlanguage_list = mysqli_query($con , $selectlanguage_list);
    $fetchlanguage_list = mysqli_fetch_assoc($runlanguage_list);
    $data7 =  $fetchlanguage_list;
    $arraylanguage_list = array("language_list" => array($data7));

    /*--------------------------------------------------------------------------------------------*/
    $selectcourses= "SELECT `course_id`,
                        `course_name`, 
                        `organization_name`,
                        `start_date`, 
                        `end_date`

                FROM `coursestraining`
                WHERE user_id ='".$fetchuser['user_id']."'
    ";

    $runcourses = mysqli_query($con , $selectcourses);
    while ($fetchcourses = mysqli_fetch_assoc($runcourses)){
        $data8 =$fetchcourses  ;

    }

    $arraycourses = array("courses" => array($data8));
    /*--------------------------------------------------------------------------------------------*/
    $selectexperiences= "SELECT `experience_id`,
                       `company_name`, 
                       `job_title`,
                       `date_start`,
                       `date_end`,
                       `salary`,
                       `reasonforleaving`
                 FROM `experiences`
                 WHERE user_id ='".$fetchuser['user_id']."'
    ";

    $runexperiences = mysqli_query($con , $selectexperiences);
    while ($fetchexperiences = mysqli_fetch_assoc($runexperiences)){
        $data9 =$fetchexperiences  ;

    }

    $arrayexperiences = array("experiences" => array($data9));

    /*--------------------------------------------------------------------------------------------*/
    $selectcertification= "SELECT `certification_id`, 
                                `certification_url`
                        FROM `certification`
                        WHERE user_id ='".$fetchuser['user_id']."'
    ";

    $runcertification = mysqli_query($con , $selectcertification);
    while ($fetchcertification = mysqli_fetch_assoc($runcertification)){


        $imagedata = file_get_contents("../certifcations/".$fetchcertification['certification_url']);
        // alternatively specify an URL, if PHP settings allow
        $base64 = base64_encode($imagedata);
        /*   var_dump($base64);die();*/
        /*$image="../upload/".$fetchgeneral['image_name'];
    */
        $baseimage =array("certification_url" => $base64) ;
        $data10 =$fetchcertification  ;
        $data11 = array_merge($data10 , $baseimage)   ;

    }

    $arraycertification = array("certification" => array($data11));
    /*--------------------------------------------------------------------------------------------*/
    $selectskills= "
    SELECT skill_id , skill_name 
    FROM skills
    WHERE user_id ='".$fetchuser['user_id']."'";

    $runskills = mysqli_query($con , $selectskills);

    if (mysqli_num_rows($runskills)){
    while ($fetchskills = mysqli_fetch_assoc($runskills) ){
        $data2 =$fetchskills  ;

    }

    $arrayskills = array("skills" => array($data2));


    }
}
}
$concat = array_merge($arrayusers,$arraygeneral,$arrayskills,$arraycollege,$arrayeducation ,$arrayonlinelinks,$arraylanguage_list,$arraycourses,$arrayexperiences ,$arraycertification,$arrayresult);





echo json_encode(array($concat));


