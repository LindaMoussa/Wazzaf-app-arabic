<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/12/2019
 * Time: 11:31 AM
 */


require_once ('../db/connect.php');
header('content-type:application/json');

$degree_level="SELECT * FROM `degree_level`";
$result = mysqli_query($con , $degree_level);
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
