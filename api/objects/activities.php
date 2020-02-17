<?php

class Activities{
 
    // database connection and table name
    private $conn;
    private $table_name = "activities";
 
    // object properties
    public $activity_id;
    public $class_id;
    public $date;
    public $title;
    public $reference;
    public $summary;
    public $presenter_id;
    
    public $child_id;
    public $month;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new activity record
    function create(){
    
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