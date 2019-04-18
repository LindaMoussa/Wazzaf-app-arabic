<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/12/2019
 * Time: 10:43 AM
 */

require_once ('../db/connect.php');
header('content-type:application/json');

$position="SELECT * FROM `position`";
$result = mysqli_query($con , $position);
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



/*     $resultData = array("status" => true , 'data' => $data);

    }else{
        $resultData = array("status" => false , 'message' => 'No Data Found');
    }*/