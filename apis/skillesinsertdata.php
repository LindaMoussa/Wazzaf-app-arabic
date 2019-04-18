<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/20/2019
 * Time: 3:44 PM
 */


$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
if (!empty($object['skill_name'])  && !empty($object['user_id']) ){

    $skill_name=$object['skill_name'];


    $user_id =$object['user_id'];


    $insertskills="INSERT INTO `skills`( `skill_name`, `user_id`)
                            VALUES ('$skill_name','$user_id')";

    $runinsert1=mysqli_query($con , $insertskills);


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