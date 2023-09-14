<?php
    include ("connection.php");

    class ApplyAndPayController{
        use AppConnection;

        public function store($a,$b,$c,$d,$e,$f,$g){
            $store = "INSERT INTO pay_application(first_name,last_name,email,phone_number,gender,app_role,pay_status,date) VALUES (?,?,?,?,?,?,?,?)";
            $query = $this->conn->prepare($store);
            $query->execute([$a,$b,$c,$d,$e,$f,"1",$g]);
            // return $this->name;
        }
        public function login($email,$password){
            $selet = "SELECT * FROM pay_application WHERE email = ? AND password = ?";
            $query = $this->conn->prepare($selet);
            $query->execute(array($email,$password));
            return $query;
        }
        public function show($id){
            $selet = "SELECT * FROM pay_application WHERE pay_id = ?";
            $query = $this->conn->prepare($selet);
            $query->execute(array($id));
            return $query;

        }
        public function update($first_name,$last_name,$email,$pnumber,$gender,$app_role,$state,$lga,$courseStudy,$address,$id){
            $update = "UPDATE pay_application SET first_name=?,last_name=?,email=?,phone_number=?,gender=?,app_role=?,state=?,ltd=?,course_of_study=?,home_address=? WHERE pay_id = ?";
            $query = $this->conn->prepare($update);
            $query->execute(array($first_name,$last_name,$email,$pnumber,$gender,$app_role,$state,$lga,$courseStudy,$address,$id));
        }
        public function index()
        {
            $selet = "SELECT * FROM pay_application ORDER BY pay_id DESC";
            $query = $this->conn->prepare($selet);
            $query->execute();
            return $query;
            
        }
    }
?>