<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/teachers.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$teachers = new teachers($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$teachers->class_id = $data->class_id;
$teachers->name = $data->name;
$teachers->phone_number = $data->phone_number;
$teachers->photo = $data->photo;
$teachers->password = $data->password;
 
// create the teachers
if( !empty($teachers->class_id) &&
    !empty($teachers->photo) &&
    !empty($teachers->name) &&
    !empty($teachers->phone_number) &&
    !empty($teachers->password) &&
    $teachers->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: teachers was created
    echo json_encode(array( "error" => false, "message" => "teacher was created."));
}
 
// message if unable to create teachers
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create teachers
    echo json_encode(array( "error" => true, "message" => "Unable to create teachers."));
}
?>