<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/24/2019
 * Time: 2:11 PM
 */
$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
//Check for Mandatory parameters

foreach ($object['courses'] as $courses){

    $insert="INSERT INTO `coursestraining`(`course_name`, `organization_name`, `start_date`, `end_date`, `user_id`)
                    VALUES ('".$courses['course_name']."','".$courses['organization_name']."','".$courses['start_date']."','".$courses['end_date']."','".$courses['user_id']."')";


    $run=mysqli_query($con , $insert);
}
if ($run){
    $response["status"] = 200;
    $response["message"] = "courses Inserted";
}else{
    $response["status"] = 404;
    $response["message"] = "courses not Inserted";
}

echo json_encode($response);