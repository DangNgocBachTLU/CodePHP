<?php
    class Employee{
        private $conn;
        private $table_name = "tbEmployee";

        protected $id;
        protected $name;
        protected $address;
        protected $birth;
        protected $experience;
        protected $basicsalary;

        public function __construct($db){
            $this->conn = $db;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }
        public function setAddress($address){
            $this->address = $address;
        }
        public function getAddress(){
            return $this->address;
        }
        public function setBirth($birth){
            $this->birth = $birth;
        }
        public function getBirth(){
            return $this->birth;
        }
        public function setExperience($experience){
            $this->experience = $experience;
        }
        public function getExperience(){
            return $this->experience;
        }
        public function setBasicSalary($basicsalary){
            $this->basicsalary = $basicsalary;
        }
        public function getBasicSalary(){
            return $this->basicsalary;
        }

        public function add(){
            $query = "INSERT INTO " .$this->table_name." SET Name=:name,Address=:address,DateOfBirth=:birth,YearExperience=:experience,BasicSalary=:basicsalary";  
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":address", $this->address);
            $stmt->bindParam(":birth", $this->birth);
            $stmt->bindParam(":experience", $this->experience);
            $stmt->bindParam(":basicsalary", $this->basicsalary);
            if($this->name!='' && $this->address!='' && $this->birth!='' && $this->experience!='' && $this->basicsalary!=''){
                if($stmt->execute()){
                    return true;
                }
                return false;
            }
        }

        public function readAll($from_record_num, $records_per_page){
            $query = "SELECT * FROM " . $this->table_name . " ORDER BY ID ASC LIMIT {$from_record_num}, {$records_per_page}";
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            return $stmt;
        }

        public function countAll(){
            $query = "SELECT ID FROM " . $this->table_name . "";
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            $num = $stmt->rowCount();
            return $num;
        }

        public function viewEm(){
            if(isset($this->id)){
                $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ".$this->id." LIMIT 0, 1";
                $stmt = $this->conn->prepare( $query );
                $stmt->execute();
            
                if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $this->name = $row['Name'];
                    $this->address = $row['Address'];
                    $this->birth = $row['DateOfBirth'];
                    $this->experience = $row['YearExperience'];
                    $this->basicsalary = $row['BasicSalary'];
                }
            }
        }

        public function update(){
            $query = "UPDATE " .$this->table_name." SET Name=:name,Address=:address,DateOfBirth=:birth,YearExperience=:experience,BasicSalary=:basicsalary WHERE ID =:id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":address", $this->address);
            $stmt->bindParam(":birth", $this->birth);
            $stmt->bindParam(":experience", $this->experience);
            $stmt->bindParam(":basicsalary", $this->basicsalary);
            $stmt->bindParam(":id", $this->id);
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        public function delete(){
            $query = "DELETE FROM " . $this->table_name . " WHERE ID =".$this->id;
            $stmt = $this->conn->prepare($query);
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>