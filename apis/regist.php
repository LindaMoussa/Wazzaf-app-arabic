<?php
/**
 * Created by PhpStorm.
 * User: amr waheed
 * Date: 3/13/2019
 * Time: 9:35 AM
 */
$og=file_get_contents('php://input');
$object =  json_decode($og, true);

require '../db/connect.php';
$response = array();
//Check for Mandatory parameters
if(isset($object['username']) && isset($object['email']) && isset($object['password'])){
    if (!empty($object['username']) && !empty($object['email']) && !empty($object['password']) ){
    $username = $object['username'];
    $password = $object['password'];
    $email = $object['email'];
// bin2hex(random_bytes($length))

    $token = bin2hex(random_bytes(64));
    $selc="SELECT * FROM users WHERE user_email = '$email'";
    $sqlq= mysqli_query($con, $selc);

    if(mysqli_num_rows($sqlq) > 0){

        $response["status"] = 1;
        $response["message"] = "email exists";
    }else {
        $rowa= mysqli_fetch_array($sqlq);
        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
        $accesscode = rand(1, 1000000) ;
        $insert = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`, `user_type`, `user_status`, `accesscode`,token,flag)
                         VALUES ('$username','$email','$passwordhash','3','1','$accesscode','$token','1');";
        $q = mysqli_query($con, $insert);
        if ($q) {
            $last_id = mysqli_insert_id($con);
            $selects = "select * from users where user_id = '$last_id'";
            $queryys= mysqli_query($con, $selects) ;
            $dataofuser = mysqli_fetch_array($queryys);

            // $dir = 'https://amrwahed.000webhostapp.com/invice/activation.php?user_id="'.$last_id.'"';
//                        echo $dir;
            $to = $email;
            $subject = 'Pure Vision Egypt';
            $message = "
                                <html>
                                <head>
                                <title>Pure Vision Egypt</title>
                                </head>
                                <body>
                               
                                <h2 style='color:red'>Dear Sir</h2>
                                <p>Thank you for registration on Pure Vision Egypt .
                                </p>
                                <h4> We wish you to be happy ??.</h4>

                                            <p>Thanks,<br/>
                                Pure Vision Egypt<br/>
                                26st. wadi El-Nile - Maadi, Cairo<br/>
                                +20223807075    <br/>
                                +201093003177  <br/>
                                +201020029956
                                </p>
                               Click To The Link To Activation Account: 
                            <a href='http://ahmedhariedy62848.ipage.com/wazeftak/activation.php?code=".$accesscode."'>active code</a>                                
                                </body>
                                </html>
                                ";
            /*<p>To activate your account, please click on this link: <a href='https://amrwahed.000webhostapp.com/invice/activation.php?user_id=".$last_id."'>active account</a></p>*/

            /*$txt = str_replace("\n.", "\n..", $message);*/

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <info@purevisionegypt.com>' . "\r\n";
            $headers .= 'Cc: info@purevisionegypt.com' . "\r\n";

            /*  $headers = 'From: info@purevisionegypt.com' . "\r\n" .
                  'Reply-To: info@purevisionegypt.com' . "\r\n" .
                  'X-Mailer: PHP/' . phpversion();*/

            mail($to, $subject, $message, $headers);
            $response["status"] = 200;
            $response["message"] = "User created";

        }else{
            $response["status"] = 404;
            $response["message"] = "User Not Created";
        }
    }
    }else{
        $response["status"] = 3;
        $response["message"] = "FIll All Fields";
    }



}
else{
    $response["status"] = 2;
    $response["message"] = "Missing mandatory parameters";
}



echo json_encode($response);
?>