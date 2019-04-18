<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/21/2019
 * Time: 2:34 PM
 */

$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
//Check for Mandatory parameters

    if (!empty($object['user_id']) && !empty($object['degree_english']) && !empty($object['degree_iq']) && !empty($object['final_degree']) ){
        $final_degree = $object['final_degree'];
        $degree_iq = $object['degree_iq'];
        $degree_english = $object['degree_english'];
        $user_id = $object['user_id'];

        $insertresukt="INSERT INTO `resultexams`(`degree_english`, `degree_iq`, `final_degree`, `user_id`)
                              VALUES ('$degree_english','$degree_iq','$final_degree','$user_id')";

        $runinsert1=mysqli_query($con , $insertresukt);



        if ($runinsert1 == true){
            $response["status"] = "200";
            $response["message"] = "Successfully";
        }else{
            $response["status"] = "404";
            $response["message"] = "Failed";
        }



}
else{
    $response["status"] = "403";
    $response["message"] = "Missing mandatory parameters";
}



echo json_encode($response);