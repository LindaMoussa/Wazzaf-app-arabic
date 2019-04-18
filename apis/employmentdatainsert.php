<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/20/2019
 * Time: 3:47 PM
 */


$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
if (!empty($object['salary']) && !empty($object['smoke']) && !empty($object['license_drive']) && !empty($object['currency_id'])
    && !empty($object['youafterfive']) && !empty($object['position_id']) && !empty($object['career_level_id'])
    && !empty($object['user_id'])){

    $salary=$object['salary'];
    $smoke=$object['smoke'];
    $license_drive=$object['license_drive'];
    $currency=$object['currency_id'];

    $youafterfive=$object['youafterfive'];
    $position_id=$object['position_id'];
    $career_level_id=$object['career_level_id'];
    $user_id =$object['user_id'];


    $insertcareer_interest="INSERT INTO `career_interest`(`salary`, `smoke`, `license_drive`, `youafterfive`, `position_id`, `career_level_id`, `user_id`,currency)
                      VALUES ('$salary','$smoke','$license_drive','$linkcv','$youafterfive','$position_id','$career_level_id','$user_id','$currency')";

    $runinsert1=mysqli_query($con , $insertcareer_interest);



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