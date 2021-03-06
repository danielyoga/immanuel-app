<?php

// required headers
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/children.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare children object
$children = new Children($db);
 
// set ID property of record to read
$children->class_id = isset($_GET['class_id']) ? $_GET['class_id'] : die();
 
// read the details of children to be edited
$stmt = $children->getAllByClass();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){

    // children array
    $children_arr=array("error" => FALSE, "count" => $num);
    $children_arr["records"]=array();
    
    // create array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        

        $children_item=array(
            "id" => $children_id,
            "parent_id" => $parent_id,
            "parent_title" => $title,
            "parent_name" => $name,
            "parent_phone" => $phone_number,
            "name" => $child_name,
            "nickname" => $nickname,
            "photo" => $photo,
            "class_id" => $class_id
        );
 
        array_push($children_arr["records"], $children_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($children_arr);
}
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user children does not exist
    echo json_encode(array(
        "error" => FALSE, 
        "count" => $num,
        "message" => "Children does not exist."
    ));
}

?>