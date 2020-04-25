<?php

class Medias{
 
    // database connection and table name
    private $conn;
    private $table_name = "medias";
 
    // object properties
    public $id;
    public $activity_id;
    public $photo;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new user record
    function create(){
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    activity_id = :activity_id,
                    photo = :photo";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':activity_id', $this->activity_id);
        $stmt->bindParam(':photo', $this->photo);
    
    
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }


    // get all media from each activity
    function getAllByActivity(){
    
        $query = "SELECT *
                FROM " . $this->table_name . 
                " WHERE activity_id = ?";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // bind activity_id of medias to be updated
        $stmt->bindParam(1, $this->activity_id);
    
        // execute the query
        $stmt->execute();
    
        return $stmt;
    }
 
    
}

?>