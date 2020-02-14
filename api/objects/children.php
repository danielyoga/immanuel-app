<?php

class Children{
 
    // database connection and table name
    private $conn;
    private $table_name = "children";
 
    // object properties
    public $children_id;
    public $parent_id;
    public $class_id;
    public $name;
    public $nickname;
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
                    parent_id = :parent_id,
                    class_id = :class_id,
                    child_name = :name,
                    nickname = :nickname,
                    photo = :photo";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->nickname=htmlspecialchars(strip_tags($this->nickname));
    
        // bind the values
        $stmt->bindParam(':parent_id', $this->parent_id);
        $stmt->bindParam(':class_id', $this->class_id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':nickname', $this->nickname);
        $stmt->bindParam(':photo', $this->photo);
    
    
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // get all children by parent
    function getByParent(){
    
        $query = "SELECT *
                    FROM " . $this->table_name . " child " .
                " LEFT JOIN classes class
                    ON child.class_id = class.id " .
                " WHERE 
                    parent_id = ?";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->parent_id);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }

    // get all children by id
    function getById(){
    
        $query = "SELECT *
                    FROM " . $this->table_name . " child " .
                " LEFT JOIN classes class
                    ON child.class_id = class.id " .
                " WHERE 
                    children_id = ?";
    
        // prepare the query
        $stmt = $this->conn->prepare( $query );
    
        // bind parent_id of children to be updated
        $stmt->bindParam(1, $this->children_id);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }
 
    
}

?>