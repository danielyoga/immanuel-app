<?php
// required headers
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate user object
$user = new User($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->phone_number = $data->phone_number;
$phone_number_exists = $user->phone_numberExists();
 
// generate json web token
include_once '../config/core.php';
include_once '../libs/php-jwt-master/src/BeforeValidException.php';
include_once '../libs/php-jwt-master/src/ExpiredException.php';
include_once '../libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
 
// check if phone_number exists and if password is correct
if($phone_number_exists && password_verify($data->password, $user->password)){

    if( $user->type == "teacher" && !empty($data->password_new)){
        // echo $user->id;
        $user->id = $user->id;
        $user->password = $data->password_new;

        if($user->changePasswordTeacher()){
            http_response_code(200);
            
            // response in json format
            echo json_encode(
                array(
                    "error" => false,
                    "message" => "User was updated."
                )
            );
        }
        else{
            // set response code
            http_response_code(401);
        
            // show error message
            echo json_encode(array("error" => true, "message" => "Unable to update user."));
        }
    }
    else if( $user->type == "parent"  && !empty($data->password_new)){

        $user->id = $user->id;
        $user->password = $data->password_new;

        if($user->changePasswordParent()){
            http_response_code(200);
            
            // response in json format
            echo json_encode(
                array(
                    "error" => false,
                    "message" => "User was updated."
                )
            );
        }
        else{
            // set response code
            http_response_code(401);
        
            // show error message
            echo json_encode(array("error" => true, "message" => "Unable to update user."));
        }
    }

 
    // $user->password = $data->password_new;

    // if($user->resetPassword()){


    // }
    else{
        // set response code
        http_response_code(401);
    
        // show error message
        echo json_encode(array("error" => true, "message" => "Unable to update user."));
    }
 
}
 
// login failed
else{
 
    // set response code
    http_response_code(401);
 
    // tell the user login failed
    echo json_encode(array(
        "error" => true,
        "message" => "Login failed."
    ));
}
?>