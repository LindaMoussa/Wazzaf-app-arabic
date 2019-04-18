<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/24/2019
 * Time: 12:06 PM
 */
$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
//Check for Mandatory parameters

foreach ($object['skills'] as $skills){

    $insert="INSERT INTO `skills`(`skill_name`, `user_id`)
              VALUES ('".$skills['skill_name']."','".$skills['user_id']."')";

    $run=mysqli_query($con , $insert);
}
if ($run){
    $response["status"] = 200;
    $response["message"] = "skills Inserted";
}else{
    $response["status"] = 404;
    $response["message"] = "skills not Inserted";
}

echo json_encode($response);