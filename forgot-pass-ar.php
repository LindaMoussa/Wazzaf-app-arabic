<?php

require './checksession.php';


require 'db/connect.php';

?>
<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="imges/search.png">
        <title>SuperCareer</title>
        
        <link href="https://fonts.googleapis.com/css?family=Cairo|Tajawal" rel="stylesheet">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/forgot-pass.css">
        
    </head>
    
    <body>
        
           <section class="header">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="container">
                <a class="navbar-brand" href="#">Logo</a>
               
            </div>
        </nav>
    </section>


    <section class="container form-container mb-5">
        <div class="row mt-5">
            <div class="col-md-6 col-10 m-auto pass-inputs">
                <div class="row">
                    <div class="col-md-1 px-0">
                        <div class="back-btn">
                    <a href="profile.php" data-toggle="tooltip" data-placement="bottom" title="Back">
                        <i class="icofont-hand-drawn-left"></i>
                    </a>
                </div>
                    </div>
                    </div>
                    <div class="row mt-4 mb-2">
                    <div class="col-md-12 px-0 text-center">
                        <h3>Forgot Password</h3>
                    </div>
                
                </div>
                
                <?php
                    if (isset($_POST['submitsend'])){

                        if (!empty($_POST['email'])){
                            $email = $_POST['email'];
                            $select = "SELECT user_email , accesscode FROM `users` where 	user_email = '$email' ";
                            $query= mysqli_query($con , $select);


                            if (mysqli_num_rows($query)>0){
                                $accesscodesa = rand(1, 1000000) ;
                                $fetchemail = mysqli_fetch_array($query);

                                $updatee= "UPDATE `users` SET `accesscode`='{$accesscodesa}' WHERE  user_email = '{$fetchemail['user_email']}'";
                                $updatequey = mysqli_query($con , $updatee);
                              /*  var_dump($updatequey);die();*/
                                if ($updatequey){


                                    $emailuser = $fetchemail['user_email'];
                                    $select2 = "SELECT accesscode FROM `users` where 	user_email = '$email' ";
                                    $query2= mysqli_query($con , $select2);
                                    $fetchaccess = mysqli_fetch_array($query2);
                                    $accesscode = $fetchaccess['accesscode'];

                                    $to = $emailuser;
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
                        <form action=''>
                        code : <input type='text' value='".$accesscode."'>
                        </form>
                         
         
                                              
                            
                           
                        </body>
                        </html>
                        ";
                                    /*<p>To activate your account, please click on this link: <a href='https://amrwahed.000webhostapp.com/invice/activation.php?user_id=".$last_id."'>active account</a></p>*/

                                    /*$txt = str_replace("\n.", "\n..", $message);
                                     <form action='activation.php' method='post'><span>Activation Number </span><input type='text' value='$accesscode'></form>
                                    */

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
                                    echo '<span>sending code</span>';

                                }else{
                                    echo '<span>problem happened</span>';
                                }

                            }else{
                                echo '<span>NO Data Found</span>';
                            }

                        }else{
                            echo '<span> You Should Fill Email Field  </span>';
                        }


                    }else{

                    }

                ?>
                <form action="" method="post">
                    <div class="mb-5">
                        <p class="resetPass-p">يرجى إدخال عنوان البريد الإلكتروني المسجل على حسابك لتلقي رمز إعادة تعيين كلمة المرور.</p>
                    
                    </div>
                    <div class="form-group">
                        <label>البريد الاليكتروني</label>
                        <input type="email" class="form-control" id="email" placeholder="" name="email" required>

                    </div>

<!--                    <span class="error-msg"><i class="icofont-warning-alt"></i></span>-->
                    <div class="text-center mt-1">

                      <input type="submit" class="btn btn-primary" id="sub" name="submitsend" value="ارسال">
                    </div> 

                </form>

                <?php
                if (isset($_POST['veryfied'])) {

                    if (!empty($_POST['code'])) {
                        $code = $_POST['code'];
                        $selectcode = "select user_id,accesscode from users WHERE accesscode='{$code}'";
                        $runqeu = mysqli_query($con, $selectcode);

                        if(mysqli_num_rows($runqeu)>0) {

                                $row = mysqli_fetch_array($runqeu);

                                if ($row['accesscode'] == $code) {
                                    /*header("location:new-password.php");*/

                                    $_SESSION["id"]=$row["user_id"];
                                    header("location:new-password.php");


                            } else {
                                echo '<span> Code Do not Match  </span>';
                            }
                        }
                    } else {
                        echo '<span> You Should Fill Code Field  </span>';
                    }

                }else{}
                ?>
                <!--id="codediv"-->
                <form action="" method="post" >
                    <div class="form-group sentCode mt-3 mx-auto text-center" >
                        <label>الكود</label>
                        <input type="text" class="form-control" id="code" placeholder="" name="code" required>

                    </div>

                    <div class="text-center mt-1">

                        <input type="submit" class="btn btn-primary"  name="veryfied" value="تحقق">
                    </div>
                </form>


            </div>

        </div>

    </section>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
           <script>
               $(document).ready(function() {

                   $("#sub").click(function() {
                       $("#codediv").css("opacity", "1");
                   });
               });  </script>
    <script>


    </script>
        
    
    </body>
</html>