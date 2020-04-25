<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/activities.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$activities = new activities($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

// set product property values
$activities->class_id = $data->class_id;
$activities->date = $data->date;
$activities->title = $data->title;
$activities->reference = $data->reference;
$activities->summary = $data->summary;
$activities->presenter_id = $data->presenter_id;

// create the activities
if( !empty($activities->class_id) &&
    !empty($activities->date) &&
    !empty($activities->title) &&
    !empty($activities->reference) &&
    !empty($activities->summary) &&
    !empty($activities->presenter_id) &&
    $activities->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: activities was created
    echo json_encode(array( "error" => false, "message" => "activity was created."));
}
 
// message if unable to create activities
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create activities
    echo json_encode(array( "error" => true, "message" => "Unable to create activity."));
}
?>