<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 4/14/2019
 * Time: 10:40 AM
 */


require_once ('../db/connect.php');
header('content-type:application/json');
$og=file_get_contents('php://input');
$object =  json_decode($og, true);

ob_start('ob_gzhandler');
/*if (!empty($object['position_id']) ) {*/


if ($object['country_id'] == "0" &&  $object['position_id'] == "0" && $object['experience_id'] == "0" || empty($object['country_id']) && empty($object['position_id']) && empty($object['experience_id']) ) {
    echo json_encode(array("status" => 404,"data" => array()));
die();
}else{

if ($object['country_id'] != "0" &&  $object['position_id'] != "0" && $object['experience_id'] != "0"){
    $selectdata ="
SELECT g.user_id,  `fullname`,  `email`,  `mobile`,
                  g.image_name  ,  p.position_name

FROM general_information g 
INNER JOIN career_interest car ON g.user_id = car.user_id
INNER JOIN position p ON car.position_id = p.position_id 
 WHERE 
( g.country_id ={$object['country_id']} AND p.position_id={$object['position_id']} AND car.career_level_id={$object['experience_id']} )

";
}else if ($object['country_id'] == "0" &&  $object['position_id'] != "0" && $object['experience_id'] != "0"){
    $selectdata ="
SELECT g.user_id,  `fullname`,  `email`,  `mobile`,
                    g.image_name  ,    p.position_name

FROM general_information g 
INNER JOIN career_interest car ON g.user_id = car.user_id
INNER JOIN position p ON car.position_id = p.position_id 
 WHERE 
(  p.position_id={$object['position_id']} AND car.career_level_id={$object['experience_id']} )

";
}
else if ($object['country_id'] != "0" &&  $object['position_id'] == "0" && $object['experience_id'] != "0"){
    $selectdata ="
SELECT g.user_id,  `fullname`,  `email`,  `mobile`,
                     g.image_name  ,   p.position_name

FROM general_information g 
INNER JOIN career_interest car ON g.user_id = car.user_id
INNER JOIN position p ON car.position_id = p.position_id 
 WHERE 
( g.country_id ={$object['country_id']}  AND car.career_level_id={$object['experience_id']} )

";
}
else if ($object['country_id'] != "0" &&  $object['position_id'] != "0" && $object['experience_id'] == "0"){
    $selectdata ="
SELECT g.user_id,  `fullname`,  `email`,  `mobile`,
                     g.image_name  ,   p.position_name

FROM general_information g 
INNER JOIN career_interest car ON g.user_id = car.user_id
INNER JOIN position p ON car.position_id = p.position_id 
 WHERE 
( g.country_id ={$object['country_id']} AND p.position_id={$object['position_id']} )

";
}else{
    $selectdata ="
SELECT g.user_id,  `fullname`,  `email`,  `mobile`,
                      g.image_name  ,  p.position_name

FROM general_information g 
INNER JOIN career_interest car ON g.user_id = car.user_id
INNER JOIN position p ON car.position_id = p.position_id 
 WHERE 
( g.country_id ={$object['country_id']} OR p.position_id={$object['position_id']} OR car.career_level_id={$object['experience_id']} )

";
}

}



    $selectdata = mysqli_query($con, $selectdata);
    $result = array();
    if (mysqli_num_rows($selectdata)>0){
        while ($row = mysqli_fetch_assoc($selectdata)) {

            $imagedata = file_get_contents("../upload/" . $row['image_name']);
            // alternatively specify an URL, if PHP settings allow
            $base64 = base64_encode($imagedata);
            $baseimage = array("image_name" => $base64);

            $row = array_merge($row, $baseimage);


            array_push($result, $row);
        }
        if ($selectdata) {
            echo json_encode(array("status" => 150, "data" => $result));
        } else {
            echo json_encode(array("status" => 404));
        }
    }else{
        echo json_encode(array("status" => 404,"data" => array()));
    }



