<?php

class Attendances{
 
    // database connection and table name
    private $conn;
    private $table_name = "attendances";
 
    // object properties
    public $attendance_id;
    public $child_id;
    public $activity_id;
    public $isAttend;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new attendances record
    function create(){
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    child_id = :child_id,
                    activity_id = :activity_id,
                    isAttend = :isAttend";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
        
        // bind the values
        $stmt->bindParam(':child_id', $this->child_id);
        $stmt->bindParam(':activity_id', $this->activity_id);
        $stmt->bindParam(':isAttend', $this->isAttend);
    
    
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // get activity by id
    function getById(){
    
        $query = "SELECT *
                    FROM " . $this->table_name . " activity " .
                " LEFT JOIN teachers teacher
                    ON activity.presenter_id = teacher.teacher_id " .
                " WHERE 
                    activity_id = ?";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->activity_id);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }

    // get activity by class
    function getByClass(){
    
        $query = "SELECT *
                    FROM " . $this->table_name . " activity " .
                " WHERE 
                    class_id = ? ".
                " AND MONTH(date) = ? ".
                " ORDER BY activity.date DESC ";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->class_id);
        $stmt->bindParam(2, $this->month);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }

    // get activity by children id
    function getByChildren(){
    
        $query = "SELECT *
                    FROM " . $this->table_name . " activity " .
                " LEFT JOIN attendances attendance
                    ON activity.activity_id = attendance.activity_id " .
                " WHERE 
                    attendance.child_id = ? " .
                " ORDER BY activity.date DESC "; 
                // " LIMIT 8";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->child_id);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }
 
    
}

?>