<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/teachers.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare teacher object
$teacher = new teachers($db);
 
// set ID property of record to read
$teacher->teacher_id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of teacher to be edited
$stmt = $teacher->getById();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){

    // teacher array
    $teacher_arr=array("error" => FALSE);
    
    // create array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $teacher_item=array(
            "id" => $teacher_id,
            "class_id" => $class_id,
            "name" => $name,
            "phone_number" => $phone_number,
            "photo" => $photo
        );

        array_push($teacher_arr, $teacher_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($teacher_arr);
}
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user teacher does not exist
    echo json_encode(array(
        "error" => FALSE, 
        "message" => "teacher does not exist."
    ));
}

?>