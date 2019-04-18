<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/24/2019
 * Time: 2:31 PM
 */


$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
//Check for Mandatory parameters

foreach ($object['certification'] as $certification){

    $base=$certification['certification_url'];
    $binary=base64_decode($base);
    $filenames=uniqid().'.png';
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen('../certifcations/'.$filenames , 'wb');
    fwrite($file, $binary);
    fclose($file);
    $user_id = $certification['user_id'];

    $insert="INSERT INTO `certification`(`certification_url`, `user_id`)
                          VALUES ('".$filenames."','".$certification['user_id']."')";

    $run=mysqli_query($con , $insert);
}
if ($run){
    $response["status"] = 200;
    $response["message"] = "certification Inserted";
}else{
    $response["status"] = 404;
    $response["message"] = "certification not Inserted";
}

echo json_encode($response);




