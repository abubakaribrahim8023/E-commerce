<?php

    trait AppConnection{
        public function __construct(){
            $this->conn = new pdo("mysql:host=localhost; dbname=institute_payment", "root", "");
            $this->name = "welcome";
        }
    }

?>