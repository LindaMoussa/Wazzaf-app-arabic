<?php



$host="localhost";
$dbuser="root";
$dbpass="";
$dbname="wazeftak";

//mysqli

@$con=mysqli_connect($host, $dbuser, $dbpass, $dbname);
            mysqli_query(@$con,"SET NAMES utf8");
            mysqli_query(@$con,"SET CHARACTER SET utf8");
//mysqli_error($con);
if(!$con){
    die('nooo connection') ;
   // echo ;
    
}




//pdo