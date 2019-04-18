<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/12/2019
 * Time: 2:50 PM
 */

require_once ('../db/connect.php');
header('content-type:application/json');

$countries="SELECT country_id, nicename FROM `countries`";
$result = mysqli_query($con , $countries);
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
