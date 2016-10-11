<?php
/**
 * User Class
 */
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
    private $user_files_table_name = "user_files";
 
    // object properties
    public $id;
    public $first_name;
    public $last_name;
    public $birth_date;
    public $gender;
    public $created_at;
    public $updated_at;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    /**
     * Fetch users
     * @param  [int] $page            
     * @param  [int] $from_record_num 
     * @param  [int] $records_per_page
     * @return [array]                  
     */
    public function readAll($page, $from_record_num, $records_per_page){
 
        $query = "SELECT
                    id, first_name, last_name, birth_date, gender
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id DESC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }

    /**
     * Get count of all users
     */
    public function countAll(){
 
        $query = "SELECT id FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    /**
     * Fetch a single user
     * @return [array]
     */
    function readOne(){
 
        $query = "SELECT
                    first_name, last_name, birth_date, gender
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->num = $stmt->rowCount();

        if($this->num>0){
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->birth_date = $row['birth_date'];
            $this->gender = $row['gender'];
        }else{
            return null;
        }
    }

    /**
     * Create a new user
     * @return [boolean]
     */
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    first_name = ?, last_name = ?, birth_date = ?, gender = ?, created_at = ?, updated_at = ?";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->birth_date=htmlspecialchars(strip_tags($this->birth_date));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->created_at=date("Y-m-d H:i:s");
        $this->updated_at=date("Y-m-d H:i:s");
 
        // bind values
        $stmt->bindParam(1, $this->first_name);
        $stmt->bindParam(2, $this->last_name);
        $stmt->bindParam(3, $this->birth_date);
        $stmt->bindParam(4, $this->gender);
        $stmt->bindParam(5, $this->created_at);
        $stmt->bindParam(6, $this->updated_at);
 
        if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return false;
        }
    }

    /**
     * Update a user details
     * @return [boolean]
     */
    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    first_name = :first_name,
                    last_name = :last_name,
                    gender = :gender,
                    birth_date  = :birth_date
                WHERE
                    id = :id";
     
        $stmt = $this->conn->prepare($query);
     
        // posted values
        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->birth_date=htmlspecialchars(strip_tags($this->birth_date));
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        // bind parameters
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':birth_date', $this->birth_date);
        $stmt->bindParam(':id', $this->id);
     
        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Insert files
     * @param  [array] $files_array [files array]
     * @return [boolean]
     */
    public function insert_files($files_array){

        foreach ($files_array as $files) {
    
        $query = "INSERT INTO " . $this->user_files_table_name . " SET user_id = ?, file_name = ?, created_at = ?, updated_at = ?";
 
        $stmt = $this->conn->prepare($query);

         // bind parameters
        $stmt->bindParam(1, $files['user_id']);
        $stmt->bindParam(2, $files['file_name']);
        $stmt->bindParam(3, date("Y-m-d H:i:s"));
        $stmt->bindParam(4, date("Y-m-d H:i:s"));
     
        // execute the query
        $stmt->execute();
        }

        return true;
    }

    /**
     * Delete user
     * @return [boolean]
     */
    function delete(){
 
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
         
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>