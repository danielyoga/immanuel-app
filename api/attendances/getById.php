<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// ========database connection=========
// get database connection
include_once '../config/database.php';
// instantiate product object
include_once '../objects/attendances.php';
 
// instantiate database and attendances object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$attendances = new attendances($db);
 
// get id
$attendances->attendance_id = isset($_GET['id']) ? $_GET['id'] : die();

// ========Get All attendancess=========
// query attendancess
$stmt = $attendances->getById();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // attendances array
    $attendances_arr = array("error" => FALSE);
    $attendances_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $attendances_item = array(
            "id" => $attendance_id,
            "date" => $date,
            "activity_name" => $activity_title,
            "child_name" => $child_name,
            "parent_title" => $title,
            "parent_name" => $name,
            "keterangan" => $keterangan
        );
 
        array_push($attendances_arr["records"], $attendances_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show attendancess data in json format
    echo json_encode($attendances_arr);
}
else{// no attendancess found will be here
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no attendances found
    echo json_encode(array(
        "error" => FALSE,
        "message" => "No attendances found."
    ));
}
?>