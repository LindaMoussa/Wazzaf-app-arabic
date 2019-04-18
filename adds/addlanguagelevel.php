<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 2/28/2019
 * Time: 2:45 PM
 */


require '../db/connect.php';
require '../checksession.php';


if (isset($_POST['submit'])){

    if (!empty($_POST['languagelevel']) ){
        $languagees =mysqli_real_escape_string($con, $_POST['languagelevel'])   ;

        $select = "SELECT * FROM `language_level` WHERE level_lang_name='$languagees'";
        $runquselect=mysqli_query($con, $select);
        if (mysqli_num_rows($runquselect)>0){
            echo '<script>alert("Name Exists");window.location.assign("../admin.php");</script>';
        }else{
            $insert = "INSERT INTO `language_level`( `level_lang_name`) VALUES ('$languagees')";
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

