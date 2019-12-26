<?php 

Session::checkLogin();

class User {

    private $db;
    private $fm;


    public function __construct(){

        $this->db = new Db();
        $this->fm = new Format();

    }

    public function login(){

        $username = mysqli_real_escape_string($this->db->conn, $_POST['username']);
        $password = mysqli_real_escape_string($this->db->conn, md5($_POST['password']));

        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);
        
        if(empty($username) || empty($password)){
            $msg = "You have to fill all fields";
            return $msg;
        } else {
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = $this->db->select($query);

            if($result == true){

                $value = $result->fetch_assoc();
                Session::set("login", true);
                Session::set("user_id", $value["user_id"]);
                Session::set("username", $value["username"]);
                Session::set("status", $value["status"]);
                header('location: dashboard/');

            } else {

                $msg = "Sorry, we cannot recognize you, try again";
                return $msg;
            }
        }
    }

    public function getUserData($id){
        $query = "SELECT * FROM users WHERE lic_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}