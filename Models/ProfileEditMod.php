<?php

// The only responsibility of the "Model" is to
// query the database and return the results

require_once '../Classes/Database.php';

class ProfileEditMod {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchUserInformation($username) {
        $this->db->bind("u", $username);
        $query = $this->db->query("SELECT * FROM user WHERE username=:u");

        return $query;
    }

    public function doesUserAlreadyExist($email, $username) {
        $this->db->bind("e",$email);
        $this->db->bind("u",$username);
        $select = $this->db->query("SELECT * FROM user WHERE email=:e AND NOT username=:u");

        // User credentials already exist
        if(!empty($select)) {
            return true;
        }

        return false;
    }

    public function updateUser($fn, $ln, $e, $u, $s, $pn) {
        $stmt= "UPDATE user SET first_name=:fn, last_name=:ln, email=:e, state=:s, phone_number=:pn WHERE username=:u";
        $query = $this->db->query($stmt, array(
            "fn"=>  $fn,
            "ln"=>  $ln,
            "e" =>  $e,
            "u" =>  $u,
            "s" =>  $s,
            "pn"=>  $pn));
    }
}

?>