<?php

class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "parents";
 
    // object properties
    public $id;
    public $name;
    public $title;
    public $phone_number;
    public $password;

    public $class_id;
    public $type;
    public $isAdmin;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
    // create new user record
    function create(){
    
        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    name = :name,
                    title = :title,
                    phone_number = :phone_number,
                    password = :password";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->phone_number=htmlspecialchars(strip_tags($this->phone_number));
        $this->password=htmlspecialchars(strip_tags($this->password));
    
        // bind the values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':phone_number', $this->phone_number);
    
        // hash the password before saving to database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);
    
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
 
    // check if given phone_number exist in the database
    function phone_numberExists(){
    
        // query to check if phone_number exists
        $query = "SELECT *
                FROM " . $this->table_name . "
                WHERE phone_number = ?
                LIMIT 0,1";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // sanitize
        $this->phone_number=htmlspecialchars(strip_tags($this->phone_number));
    
        // bind given phone_number value
        $stmt->bindParam(1, $this->phone_number);
    
        // execute the query
        $stmt->execute();
    
        // get number of rows
        $num = $stmt->rowCount();
    
        // if phone_number exists, assign values to object properties for easy access and use for php sessions
        if($num>0){ // PARENT
    
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // assign values to object properties
            $this->id       = $row['id'];
            $this->name     = $row['name'];
            $this->title    = $row['title'];
            $this->password = $row['password'];
            $this->type     = "parent";
    
            // return true because phone_number exists in the database
            return true;

        }

        else{ // TEACHER
                // query to check if phone_number exists
                $query = "SELECT *
                FROM teachers 
                WHERE phone_number = ?
                LIMIT 0,1";

                // prepare the query
                $stmt = $this->conn->prepare( $query );

                // sanitize
                $this->phone_number=htmlspecialchars(strip_tags($this->phone_number));

                // bind given phone_number value
                $stmt->bindParam(1, $this->phone_number);

                // execute the query
                $stmt->execute();

                // get number of rows
                $num = $stmt->rowCount();

                // if phone_number exists, assign values to object properties for easy access and use for php sessions
                if($num>0){

                    // get record details / values
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // assign values to object properties
                    $this->id       = $row['teacher_id'];
                    $this->name     = $row['name'];
                    $this->password = $row['password'];
                    $this->class_id = $row['class_id'];
                    $this->isAdmin  = $row['isAdmin'];
                    $this->type     = "teacher";

                    // return true because phone_number exists in the database
                    return true;
                }
        }
    
        // return false if phone_number does not exist in the database
        return false;
    }
 
    // update a user record
    public function update(){
    
        // if password needs to be updated
        $password_set=!empty($this->password) ? ", password = :password" : "";
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                SET
                    name = :name,
                    phone_number = :phone_number
                    {$password_set}
                WHERE id = :id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone_number=htmlspecialchars(strip_tags($this->phone_number));
    
        // bind the values from the form
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':phone_number', $this->phone_number);
    
        // hash the password before saving to database
        if(!empty($this->password)){
            $this->password=htmlspecialchars(strip_tags($this->password));
            $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password_hash);
        }
    
        // unique ID of record to be edited
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // update a user record
    public function changePasswordTeacher(){
    
    
        // if no posted password, do not update the password
        $query = "UPDATE teachers 
                SET teachers.password = :password
                 WHERE teacher_id = :id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // hash the password before saving to database
        if(!empty($this->password)){
            $this->password=htmlspecialchars(strip_tags($this->password));
            $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password_hash);
        }
    
        // unique ID of record to be edited
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // update a user record
    public function changePasswordParent(){
    
    
        // if no posted password, do not update the password
        $query = "UPDATE " . $this->table_name . "
                 SET parents.password = :password
                 WHERE id = :id";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // hash the password before saving to database
        if(!empty($this->password)){
            $this->password=htmlspecialchars(strip_tags($this->password));
            $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password_hash);
        }
    
        // unique ID of record to be edited
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
}

?>