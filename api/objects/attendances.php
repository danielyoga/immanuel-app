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
    public $keterangan;

    public $parent_id;
 
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

    // get all reviews from db
    function getAll(){
        
        // query to check if phone_number exists
        $query = "SELECT *
                FROM " . $this->table_name . " attendance " .
                " LEFT JOIN activities activity
                ON attendance.activity_id = activity.activity_id " .
                " LEFT JOIN children child
                ON attendance.child_id = child.children_id " .
                " LEFT JOIN parents parent
                ON parent.id = child.parent_id " .
                " WHERE 
                    attendance.isAttend = 0 " .
                " AND 
                    attendance.isParentKnow = 1 " .
                "  ORDER BY isRead ASC";

        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // execute the query
        $stmt->execute();

        return $stmt;
    }

    // get all reviews from db
    function getAllByParent(){
        
        // query to check if phone_number exists
        $query = "SELECT * 
                FROM " . $this->table_name . " attendance " .
                " LEFT JOIN activities activity
                ON attendance.activity_id = activity.activity_id " .
                " LEFT JOIN children child
                ON attendance.child_id = child.children_id " .
                " LEFT JOIN parents parent
                ON parent.id = child.parent_id " .
                " WHERE 
                    attendance.isAttend = 0 " .
                " AND 
                    attendance.isParentKnow = 0 " .
                " AND 
                    parent.id = ? " .
                "  ORDER BY isRead ASC";

        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->parent_id);

        // execute the query
        $stmt->execute();

        return $stmt;
    }

    // get all reviews from db
    function getById(){
        
        // query to check if phone_number exists
        $query = "SELECT * , activity.title AS activity_title 
                FROM " . $this->table_name . " attendance " .
                " LEFT JOIN activities activity
                ON attendance.activity_id = activity.activity_id " .
                " LEFT JOIN children child
                ON attendance.child_id = child.children_id " .
                " LEFT JOIN parents parent
                ON parent.id = child.parent_id " .
                " WHERE 
                    attendance.attendance_id = ? ";

        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->attendance_id);

        // execute the query
        $stmt->execute();

        return $stmt;
    }

    // update attendance
    public function submitReason(){
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    isParentKnow = 1,
                    keterangan = :keterangan
                WHERE attendance_id = :attendance_id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':keterangan', $this->keterangan);
        $stmt->bindParam(':attendance_id', $this->attendance_id);
   
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // update attendance
    public function markAsRead(){
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    isRead = 1 
                WHERE attendance_id = :attendance_id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':attendance_id', $this->attendance_id);
   
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // get activity by Activity
    function getByActivity(){
    
        $query = "SELECT *
                    FROM " . $this->table_name . " attendance " .
                " LEFT JOIN activities activity
                    ON attendance.activity_id = activity.activity_id " .
                " LEFT JOIN children child
                    ON attendance.child_id = child.children_id " .
                " WHERE 
                    attendance.activity_id = ? ";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->activity_id);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // update attendance
    public function update(){
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    isAttend = 1 
                WHERE attendance_id = :attendance_id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':attendance_id', $this->attendance_id);
   
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // reset attendance
    public function reset(){
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    isAttend = 0 
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