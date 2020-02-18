<?php
// required headers
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
 
// instantiate reports object
$reports = new reports($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// get id
$reports->report_id = isset($data->id) ? $data->id : die();
 
// if id is not empty
if($reports->update()){
 
// set response code
http_response_code(200);

// response in json format
echo json_encode(
        array(
            "error" => false,
            "message" => "reports was updated."
        )
    );

}
else{
 
    // set response code
    http_response_code(401);
 
    // tell the reports access denied
    echo json_encode(array("error" => true, "message" => "Empty parameter."));
}
?>