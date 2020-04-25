<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/medias.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$media = new medias($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set media property values
$media->activity_id = $data->activity_id;
$media->photo = $data->photo;

// create the media
if(
    !empty($media->activity_id) &&
    !empty($media->photo) &&
    $media->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: media was created
    echo json_encode(array( "error" => false, "message" => "media was created."));
}
 
// message if unable to create media
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create media
    echo json_encode(array( "error" => true, "message" => "Unable to create media."));
}
?>