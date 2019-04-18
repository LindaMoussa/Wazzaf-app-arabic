<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/20/2019
 * Time: 3:41 PM
 */

$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
if (!empty($object['language_id']) && !empty($object['level_lang_id']) && !empty($object['user_id']) ){

    $language_id=$object['language_id'];
    $level_lang_id=$object['level_lang_id'];

    $user_id =$object['user_id'];


    $insertlanguage_list="INSERT INTO `language_list`( `language_id`, `level_lang_id`, `user_id`)
                                  VALUES ('$language_id','$level_lang_id','$user_id')";

    $runinsert1=mysqli_query($con , $insertlanguage_list);


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