<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/20/2019
 * Time: 4:08 PM
 */


$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
if (!empty($object['course_name']) && !empty($object['organization_name']) && !empty($object['start_date']) && !empty($object['end_date'])
    && !empty($object['user_id'])){

    $course_name = $object['course_name'];
    $organization_name = $object['organization_name'];
    $start_date = $object['start_date'];
    $end_date = $object['end_date'];
    $user_id = $object['user_id'];


    $insertcoursestraining = "INSERT INTO `coursestraining`(`course_name`, `organization_name`, `start_date`, `end_date`, `user_id`)
                                          VALUES ('$course_name','$organization_name','$start_date','$end_date','$user_id')";

    $runinsert1=mysqli_query($con , $insertcoursestraining);



    if ($runinsert1 == true){
        $response["status"] = "200";
        $response["message"] = "Successfully";
    }else{
        $response["status"] = "404";
        $response["message"] = "Failed";
    }

}else{
    $response["status"] = "403";
    $response["message"] = "Missing mandatory parameters";
}
echo json_encode($response);