<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/31/2019
 * Time: 10:39 AM
 */


require_once ('../db/connect.php');
header('content-type:application/json');
/* ------------------------ select users data -------------------------------- */
$selectusers="select user_id from users";
$runusers = mysqli_query($con , $selectusers);
while ($fetchusers= mysqli_fetch_assoc($runusers)){

/*    print_r($fetchusers);*/
    /* ------------------------ select general data -------------------------------- */
    $selectgeneral = "select `general_id`, `fullname`, `birthday`, `address`, `email`, `civil_id_no`, `telephone`,
                              `mobile`, `gender`, `martial_status`, n.nationality_enNationality,c.nicename , 
                              `city_name`, r.religion_name,  `image_name`
                      from general_information g 
                      INNER JOIN nationaliity n ON g.nationality_id = n.nationality_id 
                      INNER JOIN countries c ON g.country_id = c.country_id 
                      INNER JOIN religion r ON g.religion_id = r.religion_id
                       WHERE user_id = '".$fetchusers['user_id']."'";
    $rungeneral=mysqli_query($con , $selectgeneral);

    $fetchgeneral= mysqli_fetch_assoc($rungeneral);

    $imagedata = file_get_contents("../upload/" . $fetchgeneral['image_name']);
    // alternatively specify an URL, if PHP settings allow
    $base64 = base64_encode($imagedata);
    $baseimage = array("image_name" => $base64);

    $datageneral = array_merge($fetchgeneral, $baseimage);

/*    print_r($fetchgeneral);*/


    /* ------------------------ select  career data -------------------------------- */
    $selectcareer = "SELECT `car_interest_id`, `salary`, `smoke`, `license_drive`, `linkcv`, 
                            `youafterfive`, p.position_name , clevel.career_name
                    FROM career_interest ca 
                    INNER JOIN position p ON ca.position_id = p.position_id 
                    INNER JOIN  career_level clevel ON ca.career_level_id = clevel.career_level_id 
                    WHERE user_id = '".$fetchusers['user_id']."'";
    $runcareer=mysqli_query($con , $selectcareer);

    $fetchcareer= mysqli_fetch_assoc($runcareer);
/*    print_r($fetchcareer);*/




    /* ------------------------ select  skills data -------------------------------- */

    /*$selectskills = "SELECT * FROM `skills` WHERE user_id = '".$fetchusers['user_id']."'";
    $runskills=mysqli_query($con , $selectskills);
    $fetchskills= mysqli_fetch_all($runskills);*/

   /* print_r($fetchskills);*/

   $add =   array($fetchusers,$datageneral,$fetchcareer);

/*print_r($add);*/
    echo json_encode($add);
}// close braket while loop










