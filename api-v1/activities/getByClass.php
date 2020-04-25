<?php

// required headers
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/activities.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare activity object
$activity = new activities($db);

// set ID property of record to read
$activity->class_id = isset($_GET['id']) ? $_GET['id'] : die();
$activity->month = isset($_GET['month']) ? $_GET['month'] : die();
 
// read the details of activity to be edited
$stmt = $activity->getByClass();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){

    // activity array
    $activity_arr=array("error" => FALSE);
    $activity_arr['records']=array();
    
    // create array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $activity_item=array(
            "id" => $activity_id,
            "date" => $date,
            "title" => $title,
            "reference" => $reference,
            "summary" => $summary
        );

        array_push($activity_arr['records'], $activity_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($activity_arr);
}
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user activity does not exist
    echo json_encode(array(
        "error" => FALSE, 
        "message" => "activity does not exist."
    ));
}

?>