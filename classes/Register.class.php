<?php 
class Register {

    private $db;
    private $fm;
    
    private $username;
    private $email;
    private $password;
    private $confirm_password;

    public function __construct(){
        $this->db = new Db();
        $this->fm = new Format();
    }

    public function registerUser(){

        $username = mysqli_real_escape_string($this->db->conn, $_POST['r_username']);
        $email = mysqli_real_escape_string($this->db->conn, $_POST['r_email']);
        $password = mysqli_real_escape_string($this->db->conn, md5($_POST['r_password']));
        $r_password = mysqli_real_escape_string($this->db->conn, md5($_POST['r_replace_password']));

        if(empty($username) || empty($email) || empty($password) || empty($r_password)){
            $registerMsg = "All fields must be filled in";
            return $registerMsg;
        } else if($password !== $r_password){
            $registerMsg = "Your passwords didnt match";
            return $registerMsg;
        } else {

            $query = "INSERT INTO USERS (username, email, password, confirm_pass) VALUES ('$username','$email','$password','$r_password')";
            $result = $this->db->insert($query);

            if($result){
                header('Refresh: 3; URL=http://localhost/managerLicense/');
                $registerMsg = "You have successfully logged and will be redirected to login page for 3 sec...";
                return $registerMsg;
                
            }
        }


    }

}