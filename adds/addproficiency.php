<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/4/2019
 * Time: 10:32 AM
 */


require '../db/connect.php';
require '../checksession.php';


if (isset($_POST['submit'])){

    if (!empty($_POST['submit']) ){
        $addcity =mysqli_real_escape_string($con, $_POST['addproficiency'])   ;
        $countries = mysqli_real_escape_string($con, $_POST['country']) ;

        $select = "SELECT * FROM `cities` WHERE city_name='$addcity'";
        $runquselect=mysqli_query($con, $select);
        if (mysqli_num_rows($runquselect)>0){
            echo '<script>alert("Name Exists");window.location.assign("../admin.php");</script>';
        }else{
            $insert = "INSERT INTO `cities`(  `city_name`, `country_id`) VALUES ('$addcity','$countries')";
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

