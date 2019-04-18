<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/24/2019
 * Time: 11:35 AM
 */
$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
//Check for Mandatory parameters

   foreach ($object['languages'] as $languages){

       $insert="INSERT INTO `language_list`( `language_id`, `level_lang_id`, `user_id`) 
                VALUES ('".$languages['language_id']."','".$languages['level_lang_id']."','".$languages['user_id']."')";
        $run=mysqli_query($con , $insert);
   }
    if ($run){
        $response["status"] = 200;
        $response["message"] = "languages Inserted";
    }else{
        $response["status"] = 404;
        $response["message"] = "languages not Inserted";
    }

echo json_encode($response);