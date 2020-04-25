<?php

// required headers
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/classes.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare class object
$class = new classes($db);
 
// set ID property of record to read
$class->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of class to be edited
$stmt = $class->getById();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){

    // class array
    $class_arr=array("error" => FALSE);
    
    // create array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $class_item=array(
            "id" => $id,
            "name" => $class_name,
            "param" => $param_report,
        );

        array_push($class_arr, $class_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($class_arr);
}
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user class does not exist
    echo json_encode(array(
        "error" => FALSE, 
        "message" => "class does not exist."
    ));
}

?>