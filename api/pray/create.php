<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/pray.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$pray = new Pray($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set pray property values
$pray->prayer = $data->pray;
$pray->parent_id = $data->parent_id;
$pray->isRead = 0; // default: false

// create the pray
if(
    !empty($pray->prayer) &&
    !empty($pray->parent_id) &&
    $pray->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: pray was created
    echo json_encode(array( "error" => false, "message" => "pray was created."));
}
 
// message if unable to create pray
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create pray
    echo json_encode(array( "error" => true, "message" => "Unable to create pray."));
}
?>