<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/20/2019
 * Time: 4:15 PM
 */


$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();

    $linkedin=$object['linkedin'];
    $facebook=$object['facebook'];
    $behance=$object['behance'];
    $instgram=$object['instgram'];

    $github=$object['github'];
    $stack_overview=$object['stack_overview'];
    $youtube=$object['youtube'];
    $blog=$object['blog'];
    $website=$object['website'];
    $others=$object['others'];
    $user_id =$object['user_id'];


    $insertonlinelinks="INSERT INTO `onlinelinks`(`linkedin`, `facebook`, `behance`, `instgram`, `github`, `stack_overview`, `youtube`, `blog`, `website`, `others`, `user_id`)
                                             VALUES ('$linkedin','$facebook','$behance','$instgram','$github','$stack_overview','$youtube','$blog','$website','$others','$user_id')";

    $runinsert1=mysqli_query($con , $insertonlinelinks);



    if ($runinsert1 == true){
        $response["status"] = "200";
        $response["message"] = "Successfully";
    }else{
        $response["status"] = "404";
        $response["message"] = "Failed";
    }


echo json_encode($response);

