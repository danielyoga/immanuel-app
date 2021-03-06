<?php

class Events{
 
    // database connection and table name
    private $conn;
    private $table_name = "events";
 
    // object properties
    public $id;
    public $date;
    public $poster;
    
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new activity record
    function create(){
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
        SET
             date = :date, 
             poster = :poster";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':poster', $this->poster);


        // execute the query, also check if query was successful
        if($stmt->execute()){
        return true;
        }

        return false;
    }

    // get events one month interval
    function getEvents(){
    
        $query = "SELECT *
                FROM " . $this->table_name . "
                 WHERE 
                MONTH(date) = MONTH(NOW()) 
                OR MONTH(date) = IF(MONTH(NOW()) + 1 =  0, 12, MONTH(NOW()) - 1) 
                OR MONTH(date) = IF(MONTH(NOW()) + 1 = 13, 1, MONTH(NOW()) + 1) 
                ORDER BY date DESC";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // execute query
        $stmt->execute();

        return $stmt;
    }
 
    
}

?>