<?php
/**
 * Created by PhpStorm.
 * User: Amr Waheed
 * Date: 4/1/2019
 * Time: 12:05 AM
 */


require_once ('../db/connect.php');
header('content-type:application/json');

$og=file_get_contents('php://input');
$object =  json_decode($og, true);
ob_start('ob_gzhandler');
if (!empty($object['user_id'])) {

    $selectdata = "SELECT  g.user_id,`general_id`, `fullname`, `birthday`,
`address`, `email`, `civil_id_no`, `telephone`,
`mobile`, `gender`, `martial_status`, n.nationality_enNationality,
c.nicename, `city_name`, r.religion_name,  `image_name` ,
car.car_interest_id , car.salary, car.smoke , car.license_drive ,
car.linkcv ,car.youafterfive, p.position_name, clevel.career_name , 
col.college_id , col.college_name , col.graduationyear,
ed.education_id , ed.university_name , ed.fields_study , ed.endyear ,
deg.degree_name , gr.grade_name ,onlin.link_id , onlin.linkedin ,
onlin.facebook , onlin.behance , onlin.instgram , onlin.instgram ,
onlin.github , onlin.stack_overview , onlin.youtube ,onlin.blog ,
onlin.website , onlin.others 

FROM general_information g 
INNER JOIN nationaliity n ON g.nationality_id =n.nationality_id
INNER JOIN countries c ON g.country_id = c.country_id
INNER JOIN religion r ON g.religion_id = r.religion_id
INNER JOIN career_interest car ON g.user_id = car.user_id
INNER JOIN position p ON car.position_id = p.position_id
INNER JOIN career_level clevel ON car.career_level_id = clevel.career_level_id
INNER JOIN college col ON g.user_id = col.user_id
INNER JOIN education ed ON g.user_id = ed.user_id
INNER JOIN degree_level deg ON ed.degree_id = deg.degree_id
INNER JOIN grade gr ON ed.grade_id = gr.grade_id
INNER JOIN onlinelinks onlin ON g.user_id = onlin.user_id

WHERE g.user_id = {$object['user_id']}

";


    $selectdata = mysqli_query($con, $selectdata);
    $result = array();
    while ($row = mysqli_fetch_assoc($selectdata)) {

        $imagedatau = file_get_contents("../upload/" . $row['image_name']);
        // alternatively specify an URL, if PHP settings allow
        $base64u = base64_encode($imagedatau);
        $baseimageu = array("image_name" => $base64u);

        $row = array_merge($row, $baseimageu);

        // skills
        $skills_query = "SELECT `skill_id`, `skill_name` FROM `skills` WHERE user_id={$row['user_id']}";
        $skillsResult = mysqli_query($con, $skills_query);
        $row['skills'] = array();
        while ($skillsRow = mysqli_fetch_assoc($skillsResult)) {
            array_push($row['skills'], $skillsRow);
        }

        // experieance
        $experiences_query = "SELECT `experience_id`, `company_name`, `job_title`,
                          `date_start`, `date_end`, `salary`, `reasonforleaving`
                   FROM `experiences` 
                   WHERE user_id={$row['user_id']}";
        $experiencesResult = mysqli_query($con, $experiences_query);
        $row['experiences'] = array();
        while ($experiencesRow = mysqli_fetch_assoc($experiencesResult)) {
            $date1 = $experiencesRow['date_start'];
            $date2 = $experiencesRow['date_end'];
            $diff = abs(strtotime($date2) - strtotime($date1));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            $da= array("Worked_Time"=>($years . " years, " . $months . " Months, " .  $days . " Days"));
            $combien = $experiencesRow + $da ;
            /*array_push($experiencesRow ,$da);*/
            array_push($row['experiences'], $combien);
        }

        // language_list
        $language_list_query = "SELECT  la.language_name, lalevel.level_lang_name
                                FROM language_list lang 
                                JOIN languages la ON lang.language_id = la.language_id
                                JOIN language_level lalevel ON lang.level_lang_id = lalevel.level_lang_id
                                WHERE user_id={$row['user_id']}";
        $language_list_query = mysqli_query($con, $language_list_query);
        $row['language_listRow'] = array();
        while ($language_listRow = mysqli_fetch_assoc($language_list_query)) {
            array_push($row['language_listRow'], $language_listRow);
        }


        // courses / training
        $coursestraining_query = "SELECT `course_id`, `course_name`, 
                                    `organization_name`, `start_date`, `end_date`
                           FROM `coursestraining` 
                           WHERE user_id={$row['user_id']}";
        $coursestraining_query = mysqli_query($con, $coursestraining_query);
        $row['courses'] = array();
        while ($coursesRow = mysqli_fetch_assoc($coursestraining_query)) {
            array_push($row['courses'], $coursesRow);
        }


        // courses / training
        $certification_query = "SELECT `certification_id`, `certification_url`
                           FROM `certification` 
                           WHERE user_id={$row['user_id']}";
        $certification_query = mysqli_query($con, $certification_query);
        $row['certification'] = array();
        while ($certificationRow = mysqli_fetch_assoc($certification_query)) {

            $imagedata = file_get_contents("../certifcations/" . $certificationRow['certification_url']);
            // alternatively specify an URL, if PHP settings allow
            $base64 = base64_encode($imagedata);
            $baseimage = array("certification_url" => $base64);

            $certificationRow = array_merge($certificationRow, $baseimage);

            array_push($row['certification'], $certificationRow);
        }


        array_push($result, $row);
    }

    echo json_encode(array("data" => $result));

}else{
    echo json_encode(array("data" => 404));
}



