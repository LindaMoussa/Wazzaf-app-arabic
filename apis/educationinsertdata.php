<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/20/2019
 * Time: 2:40 PM
 */

$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
if (!empty($object['college_name']) && !empty($object['graduationyear']) && !empty($object['university_name']) && !empty($object['fields_study']) && !empty($object['endyear']) && !empty($object['degree_id']) && !empty($object['grade_id'])){

    $college_name=$object['college_name'];
    $graduationyear=$object['graduationyear'];
    $university_name=$object['university_name'];
    $fields_study=$object['fields_study'];

    $endyear=$object['endyear'];
    $degree_id=$object['degree_id'];
    $grade_id=$object['grade_id'];
    $user_id =$object['user_id'];


$insertuniversity="INSERT INTO `education`( `university_name`, `fields_study`, `endyear`, `degree_id`, `grade_id`, `user_id`) 
                    VALUES ('$university_name','$fields_study','$endyear','$degree_id','$grade_id','$user_id')";

$runinsert1=mysqli_query($con , $insertuniversity);

$inserthighschool= "INSERT INTO `college`(`college_name`, `graduationyear`, `user_id`)
                              VALUES ('$college_name','$graduationyear','$user_id')";

$runinsert2=mysqli_query($con , $inserthighschool);

if ($runinsert2 == true && $runinsert1 == true){
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