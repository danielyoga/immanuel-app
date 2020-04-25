<?php

// required headers
header("Access-Control-Allow-Origin: https://immanuelkids-app.com");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/reports.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare reports object
$reports = new reports($db);
 
// set ID property of record to read
$reports->activity_id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of reports to be edited
$stmt = $reports->getByActivity();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){

    // reports array
    $reports_arr=array("error" => FALSE, "count" => $num);
    $reports_arr["records"]=array();
    
    // create array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $reports_item=array(
            "id" => $report_id,
            "activity_id" => $activity_id,
            "child_id" => $child_id,
            "child_name" => $child_name,
            "parameter" => $input,
            "value" => $value
        );
 
        array_push($reports_arr["records"], $reports_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($reports_arr);
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
            $activity->activity_id = $reports->activity_id;
        
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
                die();
            }

    // ============================
    // get parameter report of each class
    // ============================

            // prepare class object
            include_once '../objects/classes.php';
            $class = new classes($db);
            
            // set ID property of record to read
            $class->id = $local_class_id;
            
            // read the details of class to be edited
            $stmt = $class->getById();
            $num = $stmt->rowCount();
            
            // check if more than 0 record found
            if($num>0){
                
                $PARAM_REPORT_ARR;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    extract($row);
            
                    $PARAM_REPORT_ARR = $param_report;

                }
            
                // set response code - 200 OK
                http_response_code(200);
            
                $PARAM_REPORT_ARR = explode("; ", $PARAM_REPORT_ARR);

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
            // init children to reports
            // ============================
            extract($row);
    
            // init per parameter report
            $length = count($PARAM_REPORT_ARR);
            for ($i = 0; $i < $length; $i++) {

                // set reports property values
                // $reports->activity_id is on top
                $reports->child_id = $children_id;
                $reports->input = $PARAM_REPORT_ARR[$i];
                $reports->value = 0; // default

                // create the reports
                if(
                    !empty($reports->child_id) &&
                    !empty($reports->activity_id) &&
                    $reports->create()
                ){
                
                    // set response code
                    http_response_code(200);
                
                    // display message: reports was created
                    echo json_encode(array( "error" => false, "message" => "reports was created."));

                }
                
                // message if unable to create reports
                else{
                
                    // set response code
                    http_response_code(400);
                
                    // display message: unable to create reports
                    echo json_encode(array( "error" => true, "message" => "Unable to create reports."));
                }

            }// end of for parameter report

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