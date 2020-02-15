<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/medias.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare media object
$media = new Medias($db);
 
// set ID property of record to read
$media->activity_id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of media to be edited
$stmt = $media->getAllByActivity();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){

    // media array
    $media_arr=array("error" => FALSE, "count" => $num);
    $media_arr["records"]=array();
    
    // create array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $media_item=array(
            "id" => $id,
            "activity_id" => $activity_id,
            "photo" => $photo
        );

        array_push($media_arr["records"], $media_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($media_arr);
}
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user media does not exist
    echo json_encode(array(
        "error" => FALSE, 
        "message" => "media does not exist."
    ));
}

?>