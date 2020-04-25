<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/events.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$events = new events($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set events property values
$events->date = $data->date;
$events->poster = $data->photo;


// create the events
if(
    !empty($events->date) &&
    !empty($events->poster) &&
    $events->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: events was created
    echo json_encode(array( "error" => false, "message" => "events was created."));
}
 
// message if unable to create events
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create events
    echo json_encode(array( "error" => true, "message" => "Unable to create events."));
}
?>