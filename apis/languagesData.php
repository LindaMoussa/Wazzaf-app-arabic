<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/12/2019
 * Time: 11:39 AM
 */
require_once ('../db/connect.php');
header('content-type:application/json');

$languages="SELECT * FROM `languages`";
$result = mysqli_query($con , $languages);
$rowCount= mysqli_num_rows($result);
if ($rowCount >0){
    $data=array();
    while ($row=mysqli_fetch_assoc($result)){
        $data[] = $row;

    }
    $resultData = array("data" => $data) ;

}else{
    $resultData = array("message" => 'No Data Found') ;
}
echo json_encode($resultData);
