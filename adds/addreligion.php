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

    if (!empty($_POST['religionname']) ){
        $religionname =mysqli_real_escape_string($con, $_POST['religionname'])   ;

        $select = "SELECT * FROM `religion` WHERE religion_name='$religionname'";
        $runquselect=mysqli_query($con, $select);
        if (mysqli_num_rows($runquselect)>0){
            echo '<script>alert("Name Exists");window.location.assign("../admin.php");</script>';
        }else{
            $insert = "INSERT INTO `religion`( `religion_name`) VALUES ('$religionname')";
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




