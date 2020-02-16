<?php

class Teachers{
 
    // database connection and table name
    private $conn;
    private $table_name = "teachers";
 
    // object properties
    public $teacher_id;
    public $class_id;
    public $name;
    public $phone_number;
    public $photo;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // get all children by id
    function getById(){
    
        $query = "SELECT *
                    FROM " . $this->table_name .
                " WHERE 
                    teacher_id = ?";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->teacher_id);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }

    function getByClass(){
    
        $query = "SELECT *
                    FROM " . $this->table_name .
                " WHERE 
                    class_id = ?";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->class_id);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }
}
?>