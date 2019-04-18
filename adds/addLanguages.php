<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 2/28/2019
 * Time: 2:34 PM
 */

require '../db/connect.php';
require '../checksession.php';


if (isset($_POST['submit'])){

    if (!empty($_POST['languagees']) ){
        $languagees =mysqli_real_escape_string($con, $_POST['languagees'])   ;

        $select = "SELECT * FROM `languages` WHERE language_name='$languagees'";
        $runquselect=mysqli_query($con, $select);
        if (mysqli_num_rows($runquselect)>0){
            echo '<script>alert("Name Exists");window.location.assign("../admin.php");</script>';
        }else{
            $insert = "INSERT INTO `languages`( `language_name`) VALUES ('$languagees')";
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

