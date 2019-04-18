<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/18/2019
 * Time: 2:10 PM
 */
$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
if (!empty($object['fullname']) && !empty($object['birthday']) && !empty($object['address']) && !empty($object['email']) && !empty($object['civil_id_no']) && !empty($object['telephone']) && !empty($object['mobile'])
 && !empty($object['gender']) && !empty($object['martial_status']) && !empty($object['nationality_id']) && !empty($object['country_id']) && !empty($object['religion_id']) && !empty($object['user_id'])){

    $fullname =$object['fullname'];
    $birthday =$object['birthday'];
    $address =$object['address'];
    $email =$object['email'];
    $civil_id_no =$object['civil_id_no'];
    $telephone =$object['telephone'];
    $mobile =$object['mobile'];
    $gender =$object['gender'];
    $martial_status =$object['martial_status'];
    $nationality_id =$object['nationality_id'];
    $country_id =$object['country_id'];
    $religion_id =$object['religion_id'];
    $city_name =$object['city_name'];
    $user_id =$object['user_id'];

   /* $image_name =$object['image_name'];*/
    $base=$object['image_name'];
    $binary=base64_decode($base);
    $filenames=uniqid().'.png';
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen('../upload/'.$filenames , 'wb');
    fwrite($file, $binary);
    fclose($file);


    $insert="INSERT INTO general_information (`fullname`, `birthday`, `address`, `email`, `civil_id_no`, `telephone`, `mobile`, `gender`, `martial_status`, `nationality_id`, `country_id`, `city_name`, `religion_id`, `user_id`, `image_name`)
     VALUES ('$fullname','$birthday','$address','$email','$civil_id_no','$telephone','$mobile','$gender','$martial_status','$nationality_id','$country_id','$city_name','$religion_id','$user_id','$filenames') ";

    $q = mysqli_query($con, $insert);

    if ($q){
        $upda = "UPDATE `users` SET `flag`='2' where user_id ='$user_id'";
        $run = mysqli_query($con , $upda);
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