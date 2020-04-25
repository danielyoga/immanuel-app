<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/children.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$children = new Children($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));

// set product property values
$children->parent_id = $data->parent_id;
$children->class_id = $data->class_id;
$children->name = $data->name;
$children->nickname = $data->nickname;
$children->photo = $data->photo;
 
// create the children
if( !empty($children->parent_id) &&
    !empty($children->class_id) &&
    !empty($children->name) &&
    !empty($children->nickname) &&
    !empty($children->photo) &&
    $children->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: children was created
    echo json_encode(array( "error" => false, "message" => "Child was created."));
}
 
// message if unable to create children
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create children
    echo json_encode(array( "error" => true, "message" => "Unable to create children."));
}
?>