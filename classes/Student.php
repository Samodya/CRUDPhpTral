<?php
    require("Connection.php");
    class Student{
        private $SID;
        private $StudentName;
        private $contact;
        private $address;
        private $email;
        private $batchno;
        private $course;

        public function __construct($_StudentName,$_contact,$_address,
                                    $_email,$_batchno,$_course){
            $this->StudentName=$_StudentName;
            $this->contact=$_contact;
            $this->address=$_address;
            $this->email=$_email;
            $this->batchno=$_batchno;
            $this->course=$_course;
        }

        public function SetSID($_SID){
            $this->SID=$_SID;
        }

        public function GetSID(){
            return $this->SID;
        }

        public function SetStudentName($_StudentName){
            $this->StudentName=$_StudentName;
        }

        public function GetStudentName(){
            return $this->StudentName;
        }

        public function Setcontact($_contact){
            $this->contact=$_contact;
        }

        public function Getcontact(){
            return $this->contact;
        }

        public function Setaddress($_address){
            $this->address=$_address;
        }

        public function Getaddress(){
            return $this->address;
        }

        public function Setemail($_email){
            $this->email=$_email;
        }

        public function Getemail(){
            return $this->email;
        }

        public function Setbatchno($_batchno){
            $this->batchno=$_batchno;
        }

        public function Getbatchno(){
            return $this->batchno;
        }

        public function Setcourse($_course){
            $this->course=$_course;
        }

        public function Getcourse(){
            return $this->course;
        }

        public function AddStudent(){
            try {
                $conn=Connection::GetConnection();
                $query="INSERT INTO `students`( `StudentName`, `contact`, `address`, `email`, `batchno`, `course`) 
                VALUES (:StudentName,:contact,:addresses,:email,:batchno,:course)";
                $stmt=$conn->prepare($query);
                $stmt->bindParam(":StudentName",$this->StudentName,PDO::PARAM_STR);
                $stmt->bindParam(":contact",$this->contact,PDO::PARAM_INT);
                $stmt->bindParam(":addresses",$this->address,PDO::PARAM_STR);
                $stmt->bindParam(":email",$this->email,PDO::PARAM_STR);
                $stmt->bindParam(":batchno",$this->batchno,PDO::PARAM_STR);
                $stmt->bindParam(":course",$this->course,PDO::PARAM_STR);
                $stmt->execute();
                return $conn->lastInsertID();
            } catch (PDOException $th) {
                echo $th;
            }
        }

        public static function GetStudents(){
            try {
                $conn=Connection::GetConnection();
                $query="SELECT `SID`, `StudentName`, `contact`, `address`, `email`, `batchno`, `course`
                         FROM `students`";
                $stmt=$conn->prepare($query);
                $stmt->execute();
                $studens=array();
                $result=$stmt->fetchAll();
                
                foreach($result as $value){
                    $student=new Student($value['StudentName'],$value['contact'],$value['address'],
                        $value['email'],$value['batchno'],$value['course']);
                    $student->SetSID($value['SID']);
                    array_push($studens,$student);
                }
                return $studens;
            } catch (PDOException $th) {
                throw $th;
            }
        }

        public function GetStudent(){

        }

        public function UpdateStudent(){
            try {
                $conn=Connection::GetConnection();
                $query="UPDATE `students`
                        SET `StudentName`=:StudentName,`contact`=:contact,
                            `address`=:addresses,`email`=:email,`batchno`=:batchno,`course`=:course
                        WHERE `SID`=:StID";
                $stmt=$conn->prepare($query);
                $stmt->bindParam(":StID",$this->SID,PDO::PARAM_INT);
                $stmt->bindParam(":StudentName",$this->StudentName,PDO::PARAM_STR);
                $stmt->bindParam(":contact",$this->contact,PDO::PARAM_INT);
                $stmt->bindParam(":addresses",$this->address,PDO::PARAM_STR);
                $stmt->bindParam(":email",$this->email,PDO::PARAM_STR);
                $stmt->bindParam(":batchno",$this->batchno,PDO::PARAM_STR);
                $stmt->bindParam(":course",$this->course,PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                throw $th;
            }
        }

        public static function DeleteStudent($SID){
            try {
                $conn=Connection::GetConnection();
                $query="DELETE FROM `students` WHERE `SID`=:StID";
                $stmt=$conn->prepare($query);
                $stmt->bindParam(":StID",$SID,PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }
?>