<?php

    class Exam{
        private $connection;
        function __construct() {
            $this->connection = new mysqli("localhost","root","","final");
        }
        function insert($data){
            $name = $data['name'];
            $email = $data['email'];
            $department = $data['department'];
            $gender = $data['gender'];
            $phone = $data['phone'];

            $InsertResult = $this->connection->query("INSERT INTO tbl_student(name,email,department,gender,phone)VALUES('$name','$email','$department','$gender','$phone')");

            
            if($InsertResult){
                return '<span class="alert alert-success">Data Submited</span>';
            }
            else{
                return '<span class="alert alert-danger">Data Not Submited</span>';
            }
        }
            
        



        function show(){
           $result =  $this->connection->query("SELECT * FROM tbl_student");

           return $result;
        }






        function delete($id){
            
            $delete = $this->connection->query("DELETE FROM tbl_student WHERE student_id = $id");

            header("Location:index.php");

        }

        function edit($data,$id){

            $name = $data['name'];
            $email = $data['email'];
            $department = $data['department'];
            $gender = $data['gender'];
            $phone = $data['phone'];
 
            
            $this->connection->query("UPDATE  tbl_student SET name='$name', email='$email', department='$department', gender='$gender',phone='$phone' WHERE student_id =$id");

            header("Location:index.php");

        }
    }




?>