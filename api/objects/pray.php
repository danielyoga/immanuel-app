<?php

class Pray{
 
    // database connection and table name
    private $conn;
    private $table_name = "prayers";
 
    // object properties
    public $id;
    public $prayer;
    public $parent_id;
    public $isRead;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new user record
    function create(){
    
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    prayer = :prayer,
                    parent_id = :parent_id,
                    isRead = :isRead";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->prayer=htmlspecialchars(strip_tags($this->prayer));
        $this->parent_id=htmlspecialchars(strip_tags($this->parent_id));
    
        // bind the values
        $stmt->bindParam(':prayer', $this->prayer);
        $stmt->bindParam(':parent_id', $this->parent_id);
        $stmt->bindParam(':isRead', $this->isRead);
    
    
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
                FROM " . $this->table_name . " prayer " .
                " LEFT JOIN parents parent
                ON prayer.parent_id = parent.id " .
                "  ORDER BY isRead ASC";

        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // execute the query
        $stmt->execute();

        return $stmt;
    }

    // update pray
    public function update(){
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    isRead = 1 
                WHERE prayer_id = :id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':id', $this->id);
   
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
    
}

?>