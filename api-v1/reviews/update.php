<?php
// required headers
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// required to encode json web token
include_once '../config/core.php';
include_once '../libs/php-jwt-master/src/BeforeValidException.php';
include_once '../libs/php-jwt-master/src/ExpiredException.php';
include_once '../libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/reviews.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate reviews object
$reviews = new reviews($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// get id
$reviews->id = isset($data->id) ? $data->id : die();
 
// if id is not empty
if($reviews->update()){
 
// set response code
http_response_code(200);

// response in json format
echo json_encode(
        array(
            "error" => false,
            "message" => "reviews was updated."
        )
    );

}
else{
 
    // set response code
    http_response_code(401);
 
    // tell the reviews access denied
    echo json_encode(array("error" => true, "message" => "Empty parameter."));
}
?>