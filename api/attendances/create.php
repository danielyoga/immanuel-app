<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/attendances.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$attendances = new attendances($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set attendances property values
$attendances->child_id = $data->child_id;
$attendances->activity_id = $data->activity_id;
$attendances->isAttend = $data->isAttend;

// create the attendances
if(
    !empty($attendances->child_id) &&
    !empty($attendances->activity_id) &&
    $attendances->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: attendances was created
    echo json_encode(array( "error" => false, "message" => "attendances was created."));
}
 
// message if unable to create attendances
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create attendances
    echo json_encode(array( "error" => true, "message" => "Unable to create attendances."));
}
?>