<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once '../config/database.php';
include_once '../objects/reviews.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$review = new Reviews($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set review property values
$review->review = $data->review;
$review->parent_id = $data->parent_id;
$review->isRead = 0; // default: false
 
// create the review
if(
    !empty($review->review) &&
    !empty($review->parent_id) &&
    $review->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: review was created
    echo json_encode(array( "error" => false, "message" => "review was created."));
}
 
// message if unable to create review
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create review
    echo json_encode(array( "error" => true, "message" => "Unable to create review."));
}
?>