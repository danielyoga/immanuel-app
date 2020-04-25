<?php

class Classes{
 
    // database connection and table name
    private $conn;
    private $table_name = "classes";
 
    // object properties
    public $id;
    public $name;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new user record
    function create(){
    
        // // insert query
        // $query = "INSERT INTO " . $this->table_name . "
        //         SET
        //             name = :name,
        //             email = :email,
        //             password = :password";
    
        // // prepare the query
        // $stmt = $this->conn->prepare($query);
    
        // // sanitize
        // $this->name=htmlspecialchars(strip_tags($this->name));
        // $this->email=htmlspecialchars(strip_tags($this->email));
        // $this->password=htmlspecialchars(strip_tags($this->password));
    
        // // bind the values
        // $stmt->bindParam(':name', $this->name);
        // $stmt->bindParam(':email', $this->email);
    
        // // hash the password before saving to database
        // $password_hash = md5($this->password);
        // // $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        // $stmt->bindParam(':password', $password_hash);
    
        // // execute the query, also check if query was successful
        // if($stmt->execute()){
        //     return true;
        // }
    
        // return false;
    }


    // get all class from db
    function getAll(){
    
        // query to check if phone_number exists
        $query = "SELECT *
                FROM " . $this->table_name .
                " WHERE id != 0";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // execute the query
        $stmt->execute();
    
        return $stmt;
    }

    // get class by id
    function getById(){
    
        // query to check if phone_number exists
        $query = "SELECT *
                FROM " . $this->table_name .
                " WHERE id = ?";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );

        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->id);
    
        // execute the query
        $stmt->execute();
    
        return $stmt;
    }
 
    
}

?>