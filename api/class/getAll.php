<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// ========database connection=========
// get database connection
include_once '../config/database.php';
// instantiate product object
include_once '../objects/classes.php';
 
// instantiate database and classes object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$classes = new Classes($db);

// ========Get All classess=========
// query classess
$stmt = $classes->getAll();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // classes array
    $classes_arr = array("error" => FALSE);
    $classes_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $classes_item = array(
            "id" => $id,
            "name" => $class_name,
        );
 
        array_push($classes_arr["records"], $classes_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show classess data in json format
    echo json_encode($classes_arr);
}
else{// no classess found will be here
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no classes found
    echo json_encode(array(
        "error" => FALSE,
        "message" => "No classes found."
    ));
}
?>