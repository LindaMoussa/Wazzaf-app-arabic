<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/24/2019
 * Time: 2:20 PM
 */

$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
//Check for Mandatory parameters

foreach ($object['experiences'] as $experiences){



    $insert="INSERT INTO `experiences`(`company_name`, `job_title`, `date_start`, `date_end`, `salary`, `reasonforleaving`, `user_id`)
                    VALUES ('".$experiences['company_name']."','".$experiences['job_title']."','".$experiences['date_start']."','".$experiences['date_end']."','".$experiences['salary']."','".$experiences['reasonforleaving']."','".$experiences['user_id']."')";

    $run=mysqli_query($con , $insert);
}
if ($run){
    $response["status"] = 200;
    $response["message"] = "experiences Inserted";
}else{
    $response["status"] = 404;
    $response["message"] = "experiences not Inserted";
}

echo json_encode($response);