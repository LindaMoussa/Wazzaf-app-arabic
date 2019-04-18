<?php
/**
 * Created by PhpStorm.
 * User: Amr Waheed
 * Date: 2/23/2019
 * Time: 5:59 PM
 */


require './db/connect.php';


if(isset($_POST["login"])){
    // must fill all fields to access
    if (!empty($_POST['email']) && !empty($_POST['password'])){



        $emai=filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL);
        $password= mysqli_real_escape_string($con, $_POST['password']);
        $selecte = "SELECT * FROM `users` where user_email= '$emai' ";
        $querys= mysqli_query($con, $selecte);

        if(mysqli_num_rows($querys)>0){

            $row=  mysqli_fetch_array($querys);
            //password right
            if(password_verify($password, $row["user_password"])){
//              $selecstatus = "select status from users where email = '$emai'" ;
//              $dostatus = mysqli_query($con, $selecstatus);
//              $fetctstatus = mysqli_fetch_array($dostatus);

//              if($row["status"] == '1'){
//                  echo '<script>alert("You Must Be Active Your Account");window.location.assign("activeaccount.php");</script>';
//              } else {

                if (!empty($_POST['remember'])){

                    setcookie("email" , $emai , time()+ (10*365*24*60*60));
                    setcookie("password" , $password , time()+ (10*365*24*60*60));

                    session_start();
                    $_SESSION["id"]=$row["user_id"];
                    $_SESSION["type"]=$row["user_type"];
                    $_SESSION["status"]=$row["user_status"];
                    $_SESSION["flag"]=$row["flag"];



                    if($_SESSION["id"]== TRUE && $_SESSION["type"] == "3" ) {
                        if ($row['user_status'] == '1'){
                            //header("location:activeaccount.php");
                            echo '<script>alert("You Must Be Active Your Account");window.location.assign("link-active.php");</script>';
                        } else {
                            if ( $_SESSION["flag"] == "1"){
                                header("location:index-ar.php");
                            }else{
                                header("location:profile-ar.php");
                            }

                        }
//

                    }
                    else if($_SESSION["id"]== TRUE && $_SESSION["type"] =="2") {
                        if ($_SESSION["status"] == '1'){
                            //header("location:activeaccount.php");
                            echo '<script>alert("You Must Be Active Your Account");window.location.assign("link-active.php");</script>';
                        } else {

                            header("location:employees-ar.php");
                        }
                    }
                    else if ($_SESSION["id"]== TRUE && $_SESSION["type"] == "1"){
                        if ($row['user_status'] == '1'){
                            //header("location:activeaccount.php");
                            echo '<script>alert("You Must Be Active Your Account");window.location.assign("link-active.php");</script>';
                        } else {

                            header("location:admin-ar.php");
                        }
                    }
                    /*else{
                        echo '<script>alert("Welcome To Invice Page");window.location.assign("signup.php");</script>';
                    }*/


//              }

                }else{

                    if (isset($_COOKIE['email']))
                    {
                        setcookie("email", "");
                    }
                    if (isset($_COOKIE['password']))
                    {
                        setcookie("password", "");
                    }

                    session_start();
                    $_SESSION["id"]=$row["user_id"];
                    $_SESSION["type"]=$row["user_type"];
                    $_SESSION["status"]=$row["user_status"];
                    $_SESSION["flag"]=$row["flag"];



                    if($_SESSION["id"]== TRUE && $_SESSION["type"] == "3" ) {
                        if ($row['user_status'] == '1'){
                            //header("location:activeaccount.php");
                            echo '<script>alert("You Must Be Active Your Account");window.location.assign("link-active.php");</script>';
                        } else {
                            if ( $_SESSION["flag"] == "1"){
                                header("location:index.php");
                            }else{
                                header("location:profile.php");
                            }

                        }
//

                    }
                    else if($_SESSION["id"]== TRUE && $_SESSION["type"] =="2") {
                        if ($_SESSION["status"] == '1'){
                            //header("location:activeaccount.php");
                            echo '<script>alert("You Must Be Active Your Account");window.location.assign("link-active.php");</script>';
                        } else {

                            header("location:employees-ar.php");
                        }
                    }
                    else if ($_SESSION["id"]== TRUE && $_SESSION["type"] == "1"){
                        if ($row['user_status'] == '1'){
                            //header("location:activeaccount.php");
                            echo '<script>alert("You Must Be Active Your Account");window.location.assign("link-active.php");</script>';
                        } else {

                            header("location:admin-ar.php");
                        }
                    }
                    /*else{
                        echo '<script>alert("Welcome To Invice Page");window.location.assign("signup.php");</script>';
                    }*/


//              }
                }

            }
            //password wrong
            else{
                echo '<script>alert("password wrong");window.location.assign("signup-ar.php");</script>';

            }


        } else {
            echo '<script>alert("Email not Found plz register");window.location.assign("signup-ar.php");</script>';
        }



    }else {
        echo '<script>alert("plz fill all fields");window.location.assign("signup-ar.php");</script>';
    }
}else {
    echo '<script>alert("error , you must entered by log in Button");window.location.assign("signup.php");</script>';
}


