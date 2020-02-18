<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/reports.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$reports = new reports($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set reports property values
$reports->activity_id = $data->activity_id;
$reports->child_id = $data->child_id;
$reports->input = $data->input;
$reports->value = $data->value;

// create the reports
if(
    !empty($reports->input) &&
    !empty($reports->activity_id) &&
    !empty($reports->child_id) &&
    $reports->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: reports was created
    echo json_encode(array( "error" => false, "message" => "reports was created."));
}
 
// message if unable to create reports
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create reports
    echo json_encode(array( "error" => true, "message" => "Unable to create reports."));
}
?>