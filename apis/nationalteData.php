<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/12/2019
 * Time: 2:50 PM
 */

require_once ('../db/connect.php');
header('content-type:application/json');
ob_start('ob_gzhandler');

$nationality="SELECT `nationality_id`, `nationality_enNationality`, `nationality_arNationality` FROM `nationaliity`";
$result = mysqli_query($con , $nationality);
$rowCount= mysqli_num_rows($result);

if ($rowCount >0){
    $data=array();
    while ($row=mysqli_fetch_assoc($result)){
        $data[] = $row;

    }
   /* $arrayss=array("nationality_id" => "0" , "nationality_enNationality" => "select nationality" , "nationality_arNationality" => "اختار" );

    $sd= $arrayss + $data ;*/

    $resultData = array( "data" => $data ) ;

}else{
    $resultData = array("message" => 'No Data Found') ;
}

echo json_encode($resultData);
