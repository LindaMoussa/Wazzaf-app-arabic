<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 4/14/2019
 * Time: 10:57 AM
 */


require_once ('../db/connect.php');
header('content-type:application/json');
$og=file_get_contents('php://input');
$object =  json_decode($og, true);

ob_start('ob_gzhandler');
if (!empty($object['country_id'])) {

    $selectdata = "SELECT g.user_id,  `fullname`,  `email`,  `mobile`,
                     `image_name` , p.position_name

FROM general_information g 
INNER JOIN career_interest car ON g.user_id = car.user_id
INNER JOIN position p ON car.position_id = p.position_id

WHERE g.country_id ={$object['country_id']}

";


    $selectdata = mysqli_query($con, $selectdata);
    $result = array();
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
} else {
    echo json_encode(array("status" => 404));
}


