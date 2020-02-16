<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/events.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare event object
$event = new events($db);
 
 
// read the details of event to be edited
$stmt = $event->getEvents();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){

    // event array
    $event_arr=array("error" => FALSE);
    $event_arr["records"]=array();
    
    // create array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $event_item=array(
            "id" => $id,
            "date" => $date,
            "poster" => $poster
        );

        array_push($event_arr["records"], $event_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($event_arr);
}
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user event does not exist
    echo json_encode(array(
        "error" => FALSE, 
        "message" => "event does not exist."
    ));
}

?>