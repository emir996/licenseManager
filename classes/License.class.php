<?php 

class License {

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Db();
        $this->fm = new Format();
    }

    public function getAll(){
        $query = "SELECT * FROM licenses";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSingleLicense($id){
        $query = "SELECT * FROM licenses WHERE lic_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function insertLicense(){

        $lic_name = mysqli_real_escape_string($this->db->conn, $_POST['lic_name']);
        $lic_creator = mysqli_real_escape_string($this->db->conn, $_POST['lic_creator']);
        $lic_type = mysqli_real_escape_string($this->db->conn, $_POST['lic_type']);
        $lic_period = mysqli_real_escape_string($this->db->conn, $_POST['lic_period']);

            if(!empty($lic_name) || !empty($lic_creator) || !empty($lic_type) || !empty($lic_period)){
                
                $query = "INSERT INTO licenses (lic_name, lic_type, lic_period, lic_creator) VALUES ('$lic_name','$lic_type','$lic_period','$lic_creator')";

            $result = $this->db->insert($query);

                if($result){
                    $msg = "License added successfully";
                    return $msg;
                }

            } else {

                $msg = "All fields must not be empty";
                return $msg;
        }

        
    }

    public function updateLicense(){

        $lic_id = mysqli_real_escape_string($this->db->conn, $_POST['lic_id']);
        $lic_name = mysqli_real_escape_string($this->db->conn, $_POST['lic_name']);
        $lic_creator = mysqli_real_escape_string($this->db->conn, $_POST['lic_creator']);
        $lic_type = mysqli_real_escape_string($this->db->conn, $_POST['lic_type']);
        $lic_period = mysqli_real_escape_string($this->db->conn, $_POST['lic_period']);

        if(!empty($lic_name) || !empty($lic_creator) || !empty($lic_type) || empty($lic_period)){

            $query = "UPDATE licenses SET
                    lic_name = '$lic_name',
                    lic_type = '$lic_type',
                    lic_period = '$lic_period',
                    lic_creator = '$lic_creator'
                 WHERE lic_id = '$lic_id'";

        $result = $this->db->update($query);
            if($result)
            {
                $msg = "Successfuly updated license";
                return $msg;
            }

        } else {

            $msg = "All fields must not be empty";
            return $msg;
        
        }
    }

    public function deleteLicense(){
        $lic_id = $_GET['del_id'];
        $query = "DELETE FROM licenses WHERE lic_id = '$lic_id'";
        $del_result = $this->db->delete($query);
    }

    public function getUserData($user_id){
        $query = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = $this->db->select($query);
        return $result;
    }
}