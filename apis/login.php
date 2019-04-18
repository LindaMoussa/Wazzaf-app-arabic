<?php
header('Content-Type: application/json');
$response = array();
include '../db/connect.php';
//include './function.php';

//Get the input request parameters
//$inputJSON = file_get_contents('php://input');
//$input = json_decode($inputJSON, TRUE); //convert JSON into array


//Check for Mandatory parameters
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $password = $_POST['password'];
    $query    = "SELECT * FROM users WHERE user_email = '$email'";
    $sql = mysqli_query($con,$query);

        if(mysqli_num_rows($sql) > 0){
            $row= mysqli_fetch_array($sql);

            //Validate the password
            if(password_verify($password, $row["user_password"])){

                $response["message"] = "Login successful";
                $response["user_id"] = $row["user_id"];
                $response["email"] = $email;
                $response["type"] = $row["user_type"];
                $response["status"] = $row["user_status"];
                $response["access"] = $row["accesscode"];
                $response["token"] = $row["token"];

            }
            else{
                $response["status"] = 1;
                $response["message"] = "Invalid  password combination";
            }
        }else{
            $response["status"] = 3;
            $response["message"] = "Email Not Founded";
        }


}
else{
    $response["status"] = 2;
    $response["message"] = "Missing mandatory Fileds";
}

//Display the JSON response
echo json_encode($response);





?>