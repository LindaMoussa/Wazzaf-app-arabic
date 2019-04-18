<?php

require './checksession.php';

if(!isset($_SESSION["id"])) {
  header("location:link-active.php");
} 
require './db/connect.php';
//isset($_GET['user_id']) ||
/*if ( isset($_POST['submit'])) {*/
    $codeactive = $_GET['code'];
    
    $selet="SELECT * FROM `users` WHERE user_id = '".$_SESSION['id']."'";
    $doselet= mysqli_query($con, $selet);
    
    if ($doselet) {
        $fetchselet= mysqli_fetch_array($doselet);
      
        if ($codeactive == $fetchselet['accesscode'] ) {
            $update="UPDATE `users` SET `user_status`='2' WHERE user_id ='".$_SESSION['id']."'";
            $doupdate= mysqli_query($con, $update);
                if ($doupdate) {
                    echo '<script>alert("Activation Successfully");window.location.assign("index.php");</script>';
               } else {
                   echo '<script>alert("Activation not Successfully");window.location.assign("signup.php");</script>';
               }  
        }else {
               echo '<script>alert("Wrong Code");window.location.assign("signup.php");</script>';
           } 
      

    }   

    
/*} else {
    echo '<script>alert("You Must Entered By Active Button");window.location.assign("activeaccount.php");</script>';
}*/





