<?php

// The only responsibility of the "Model" is to
// query the database and return the results

require_once '../Classes/Database.php';

class ProfileSecurityMod {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchOldPassword($username, $password_old) {
        $this->db->bind("u", $username);
        $pw = $this->db->single("SELECT password FROM user WHERE username=:u");

        if (password_verify($password_old, $pw)) {
            return true;
        }

        return false;
    }

    public function updateUserPassword($username, $password_new) {
    $stmt= "UPDATE user SET password=:pw WHERE username=:u";
        $query = $this->db->query($stmt, array(
            "u" =>  $username,
            "pw" =>  password_hash($password_new, PASSWORD_DEFAULT)));
    }
}

?>