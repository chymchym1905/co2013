<?php

    class DatabaseClass
    {
        private $conn = null;
        private $server_name;
        private $user_name;
        private $password;
        private $db_name;


        public function __construct(
            $server_name = "localhost", 
            $db_name = "onlinecoursesellingdb",
            $user_name = "root", 
            $password = "",
        )
        {
            $this->db_name = $db_name;
            $this->server_name = $server_name;
            $this->user_name = $user_name;
            $this->password = $password;
    
            $this->conn = mysqli_connect($server_name, $user_name, $password, $db_name,3308);
            mysqli_set_charset($this->conn, 'UTF8');
    
            if (!$this->conn) {
                echo "Connection Failed.";
            }
        }

        public function getCourseByID($id){
            $sql = "SELECT * FROM course where id = '$id'";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function getInstructorByID($id){
            $sql = "SELECT * FROM instructor where id = '$id'";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function getStudentByID($id){
            $sql = "SELECT * FROM student where id = '$id'";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function getLessonByID($id){
            $sql = "SELECT * FROM lesson where id = '$id'";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function getAllCourse(){
            $sql = "CALL allcourse";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result();
        }

        public function getAllInstructor(){
            $sql = "CALL allinstructor";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result();
        }

        public function getLessonsbyCourseID($id){
            $sql = "CALL get_course_lesson(?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt->get_result();
        }

        public function getAllStudents(){
            $sql = "CALL allstudent";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result();
        }

        public function getAllLessons(){
            $sql = "CALL alllesson";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->get_result();
        }

        public function getVideoLessonByID($id){
            $sql = "CALL getlessonbyID(?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt->get_result();
        }

        public function getScorebyStudentID($id){
            $sql = "CALL see_student_details(?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt->get_result();
        }

        public function getSearchLesson($input){
            $sql = "SELECT * FROM lesson WHERE name LIKE '%$input%'";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function getSearchCourse($input){
            $sql = "SELECT * FROM course WHERE name LIKE '%$input%'";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }


        public function checkCourseName($name){
            $sql = "SELECT * FROM course WHERE name = '$name'";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }
        public function addCourse($name,$fee,$level,$startdate,$enddate){
            $add = "INSERT INTO course(name, fee, level, startdate, enddate) 
            VALUES('$name','$fee','$level','$startdate','$enddate')";
            mysqli_query($this->conn,$add);
        }

        public function addInstructor($name, $email, $phone, $address, $wage){
            $add = "INSERT INTO instructor(name, email, phone, address, wage)
            VALUES('$name','$email','$phone','$address','$wage')";
            mysqli_query($this->conn,$add);
        }

        public function addStudent($name, $email, $phone, $address, $gpa){
            $add = "INSERT INTO student(name, email, phone, address, GPA)
            VALUES('$name','$email','$phone','$address','$gpa')";
            mysqli_query($this->conn,$add);
        }

        public function addLesson($name, $courseid, $video){
            $add = "INSERT INTO lesson(name, courseID, video)
            VALUES('$name','$courseid','{$video}')";
            mysqli_query($this->conn,$add);
        }

        public function queryExecutor($sql){
            mysqli_query($this->conn,$sql);
        }

        public function editCourse($course,$name,$fee,$level,$startdate,$enddate){
            $edit = "CALL Up_Course(?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($edit);
            $stmt->bind_param("isdsss", $course,$name,$fee,$level,$startdate,$enddate);
            $stmt->execute();
        }

        public function editInstructor($instructorint,$name,$email,$phone,$salary,$address){
            $edit = "CALL Up_Instructor(?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($edit);
            $stmt->bind_param("isissd", $instructorint,$name,$phone,$email,$address,$salary);
            $stmt->execute();
        }

        public function editStudent($studentint,$name,$email,$phone,$gpa,$address){
            $edit = "CALL Up_Student(?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($edit);
            $stmt->bind_param("isdssd", $studentint,$name,$phone,$email,$address,$gpa);
            $stmt->execute();
        }

        public function editLesson($id, $name, $courseid, $video){
            $edit = "UPDATE lesson SET name='$name', video = '{$video}', courseID = '$courseid' WHERE id = '$id'";
            mysqli_query($this->conn,$edit);
        }
    }
?>