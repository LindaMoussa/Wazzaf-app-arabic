<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/11/2019
 * Time: 3:55 PM
 */

require_once ('../db/connect.php');
header('content-type:application/json');

$religion="select * from religion";
$result = mysqli_query($con , $religion);
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



