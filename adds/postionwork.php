<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 2/28/2019
 * Time: 11:21 AM
 */
require '../db/connect.php';
require '../checksession.php';


if (isset($_POST['submit'])){

    if (!empty($_POST['postionwork']) ){
        $position_name =mysqli_real_escape_string($con, $_POST['postionwork'])   ;

        $select = "SELECT * FROM `position` WHERE position_name='$position_name'";
        $runquselect=mysqli_query($con, $select);
        if (mysqli_num_rows($runquselect)>0){
            echo '<script>alert("Name Exists");window.location.assign("../admin.php");</script>';
        }else{
            $insert = "INSERT INTO `position`( `position_name`) VALUES ('$position_name')";
            $runqueryisert=mysqli_query($con, $insert);
            if ($runqueryisert){
                echo '<script>alert("registration done");window.location.assign("../admin.php");</script>';
            }else{
                echo '<script>alert("Some Occure problem");window.location.assign("../admin.php");</script>';
            }

        }

    }else{
        echo '<script>alert("plz fill all fields");window.location.assign("../admin.php");</script>';
    }

}else{
    echo '<script>alert("error , you must entered by submit form Button");window.location.assign("../admin.php");</script>';
}




