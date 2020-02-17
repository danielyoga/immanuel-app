<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// ========database connection=========
// get database connection
include_once '../config/database.php';
// instantiate product object
include_once '../objects/pray.php';
 
// instantiate database and pray object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$pray = new pray($db);

// ========Get All prays=========
// query prays
$stmt = $pray->getAll();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // pray array
    $pray_arr = array("error" => FALSE);
    $pray_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $pray_item = array(
            "id" => $prayer_id,
            "pray" => $prayer,
            "parent_title" => $title,
            "parent_name" => $name,
            "isRead" => $isRead,
        );
 
        array_push($pray_arr["records"], $pray_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show prays data in json format
    echo json_encode($pray_arr);
}
else{// no prays found will be here
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no pray found
    echo json_encode(array(
        "error" => FALSE,
        "message" => "No pray found."
    ));
}
?>