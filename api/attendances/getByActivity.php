<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/attendances.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare attendances object
$attendances = new attendances($db);
 
// set ID property of record to read
$attendances->activity_id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of attendances to be edited
$stmt = $attendances->getByActivity();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){

    // attendances array
    $attendances_arr=array("error" => FALSE, "count" => $num);
    $attendances_arr["records"]=array();
    
    // create array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $attendances_item=array(
            "id" => $attendance_id,
            "child_id" => $child_id,
            "child_name" => $child_name,
            "isAttend" => $isAttend
        );
 
        array_push($attendances_arr["records"], $attendances_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($attendances_arr);
}
else{
    // ============================
    // get class id
    // ============================
    $local_class_id;

    // prepare activity object
    include_once '../objects/activities.php';
    $activity = new activities($db);
 
    // set ID property of record to read
    $activity->activity_id = $attendances->activity_id;
 
    // read the details of activity to be edited
    $stmt = $activity->getById();
    $num = $stmt->rowCount();
 
    // check if more than 0 record found
    if($num>0){

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $local_class_id = $activity_class_id;
        }
        
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

    // ============================
    // get children by class
    // ============================

    // prepare children object
    include_once '../objects/children.php';
    $children = new Children($db);
    
    // set ID property of record to read
    $children->class_id = $local_class_id;
    
    // read the details of children to be edited
    $stmt = $children->getAllByClass();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num>0){
        
        // create array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            // ============================
            // init children to attendances
            // ============================
            extract($row);
    
            // set attendances property values
            // $attendances->activity_id is on top
            $attendances->child_id = $children_id;
            $attendances->isAttend = 0;

            // create the attendances
            if(
                !empty($attendances->child_id) &&
                !empty($attendances->activity_id) &&
                $attendances->create()
            ){
            
                // set response code
                http_response_code(200);
            
                // display message: attendances was created
                echo json_encode(array( "error" => false, "message" => "attendances was created."));

            }
            
            // message if unable to create attendances
            else{
            
                // set response code
                http_response_code(400);
            
                // display message: unable to create attendances
                echo json_encode(array( "error" => true, "message" => "Unable to create attendances."));
            }

        } //out of while

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

}

?>