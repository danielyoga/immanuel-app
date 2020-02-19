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

    // create new teacher record
    function create(){
    
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    class_id = :class_id,
                    name = :name,
                    phone_number = :phone_number,
                    photo = :photo,
                    password = :password";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone_number=htmlspecialchars(strip_tags($this->phone_number));
        $this->password=htmlspecialchars(strip_tags($this->password));
    
        // bind the values
        $stmt->bindParam(':class_id', $this->class_id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':phone_number', $this->phone_number);
        $stmt->bindParam(':photo', $this->photo);
    
        // hash the password before saving to database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);
    
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
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