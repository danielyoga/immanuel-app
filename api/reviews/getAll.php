<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// ========database connection=========
// get database connection
include_once '../config/database.php';
// instantiate product object
include_once '../objects/reviews.php';
 
// instantiate database and reviews object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$reviews = new reviews($db);

// ========Get All reviewss=========
// query reviewss
$stmt = $reviews->getAll();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // reviews array
    $reviews_arr = array("error" => FALSE);
    $reviews_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $reviews_item = array(
            "id" => $review_id,
            "review" => $review,
            "parent_title" => $title,
            "parent_name" => $name,
            "isRead" => $isRead,
        );
 
        array_push($reviews_arr["records"], $reviews_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show reviewss data in json format
    echo json_encode($reviews_arr);
}
else{// no reviewss found will be here
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no reviews found
    echo json_encode(array(
        "error" => FALSE,
        "message" => "No reviews found."
    ));
}
?>