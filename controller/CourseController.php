<?php

    include '../controller/connection.php';
    // namespace Group\CourseController;
    
    class CourseController{
        use AppConnection;

        public function stores($courseName,$duration,$amount,$coursenumber,$filename)
        {
            $insert = "INSERT INTO add_new_course(creator_id,course_name,duration,amount,course_number,logo_course,date) VALUES (?,?,?,?,?,?,?)";
            $query  = $this->conn->prepare($insert);
            $query  ->execute(array("null",$courseName,$duration,$amount,$coursenumber,$filename,date("d M, y")));
        }

        public function index()
        {
            $select = "SELECT * FROM add_new_course ORDER BY course_id DESC";
            $query  = $this->conn->prepare($select);
            $query  ->execute();
            return $query;
        }

        public function show($id)
        {
            $select = "SELECT * FROM add_new_course WHERE course_id = ?";
            $query  = $this->conn->prepare($select);
            $query  ->execute(array($id));
            return $query;
        }
        public function updateCourse($courseNameEdit,$durationEdit,$amountEdit,$coursenumberEdit,$id)
        {
            $update  = "UPDATE add_new_course SET course_name=?,duration=?,amount=?,course_number=? WHERE course_id=?";
            $query   = $this->conn->prepare($update);
            $query   ->execute(array($courseNameEdit,$durationEdit,$amountEdit,$coursenumberEdit,$id));
            // return "Hello";
        }

        public function delete($id)
        {
            $delete = "DELETE FROM add_new_course WHERE course_id = ?";
            $query  = $this->conn->prepare($delete);
            $query  ->execute(array($id));
        }
        public function getCourse($id)
        {
            $select = "SELECT * FROM add_new_course WHERE course_id = ?";
            $query  = $this->conn->prepare($select);
            $query  ->execute(array($id));
            return $query;
        }
        public function RegisterCourse($id,$courseId)
        {
            $insert = "INSERT INTO registers_course(userId,courseId,date) VALUES (?,?,?)";
            $query  = $this->conn->prepare($insert);
            $query  ->execute(array($id,$courseId, date("d M, y")));
        }
        public function coursesApplied()
        {
            $select = "SELECT pa.first_name,pa.last_name,pa.phone_number,pa.app_role,anc.course_name,anc.duration,anc.amount,rc.pay_status,rc.date,rc.increment FROM registers_course rc LEFT JOIN add_new_course anc ON rc.courseId = anc.course_id LEFT JOIN pay_application pa ON rc.userId = pa.pay_id WHERE rc.admission_status = 0";
            $query  = $this->conn->prepare($select);
            $query  ->execute();
            return $query;
        }

        public function coursesReceipt($userId)
        {
            $select = "SELECT pa.first_name,pa.last_name,pa.phone_number,anc.course_name,anc.duration,anc.amount,rc.pay_status,rc.date,rc.increment FROM registers_course rc LEFT JOIN add_new_course anc ON rc.courseId = anc.course_id LEFT JOIN pay_application pa ON rc.userId = pa.pay_id WHERE rc.userId = ?";
            $query  = $this->conn->prepare($select);
            $query  ->execute(array($userId));
            return $query;

        }

        public function Admissioned($id)
        {
            $update  = "UPDATE registers_course SET admission_status = '1', add_date = ? WHERE increment = '$id'";
            $query  = $this->conn->prepare($update);
            $query  ->execute([date("d M, y h:i a")]);
        }

    }

?>