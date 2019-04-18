<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/21/2019
 * Time: 11:23 AM
 */


$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();

if (!empty($object['certification_url']) && !empty($object['user_id']) )
{

    $base=$object['certification_url'];
    $binary=base64_decode($base);
    $filenames=uniqid().'.png';
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen('../certifcations/'.$filenames , 'wb');
    fwrite($file, $binary);
    fclose($file);
    $user_id = $object['user_id'];
    /*define('UPLOAD_DIR', '../certifcations/');
    $image_parts = explode(";base64,", $object['certification_url']);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $nameimage= uniqid() . '.png';
    $file = UPLOAD_DIR . $nameimage;

    file_put_contents($file, $image_base64);*/

    $insertcertification = "INSERT INTO `certification`( `certification_url`, `user_id`) 
                                    VALUES ('$filenames','$user_id')";
    $runinsert1=mysqli_query($con , $insertcertification);



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