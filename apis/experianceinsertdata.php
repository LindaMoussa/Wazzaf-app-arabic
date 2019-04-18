<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/20/2019
 * Time: 4:03 PM
 */


$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
if (!empty($object['company_name']) && !empty($object['job_title']) && !empty($object['date_start']) && !empty($object['date_end'])
&& !empty($object['reasonforleaving']) && !empty($object['user_id'])){

    $company_name = $object['company_name'];
    $job_title = $object['job_title'];
    $date_start = $object['date_start'];
    $date_end = $object['date_end'];

    $salary = $object['salary'];
    $reasonforleaving = $object['reasonforleaving'];

    $user_id = $object['user_id'];


    $insertexperiences = "INSERT INTO `experiences`(`company_name`, `job_title`, `date_start`, `date_end`, `salary`, `reasonforleaving`, `user_id`)
                    VALUES ('$company_name','$job_title','$date_start','$date_end','$salary','$reasonforleaving','$user_id')";

    $runinsert1=mysqli_query($con , $insertexperiences);



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