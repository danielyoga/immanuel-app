<?php

class Reports{
 
    // database connection and table name
    private $conn;
    private $table_name = "reports";
 
    // object properties
    public $report_id;
    public $activity_id;
    public $child_id;
    public $input;
    public $value;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new attendances record
    function create(){
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    activity_id = :activity_id,
                    child_id = :child_id,
                    input = :input,
                    value = :value";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
        
        // bind the values
        $stmt->bindParam(':activity_id', $this->activity_id);
        $stmt->bindParam(':child_id', $this->child_id);
        $stmt->bindParam(':input', $this->input);
        $stmt->bindParam(':value', $this->value);
    
    
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // get activity by Activity
    function getByActivity(){
    
        $query = "SELECT *
                    FROM " . $this->table_name . " report " .
                " LEFT JOIN activities activity
                    ON report.activity_id = activity.activity_id " .
                " LEFT JOIN children child
                    ON report.child_id = child.children_id " .
                " WHERE 
                report.activity_id = ? ";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->activity_id);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // update review
    public function update(){
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    value = 1 
                WHERE report_id = :report_id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':report_id', $this->report_id);
   
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // reset review
    public function reset(){
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    value = 0 
                WHERE activity_id = :activity_id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':activity_id', $this->activity_id);
   
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

}

?>