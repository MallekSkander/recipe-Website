<?php

// The only responsibility of the "Model" is to
// query the database and return the results

require_once '../Classes/Database.php';

class ProfileMod {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchUserInformation($username) {
        $this->db->bind("u", $username);
        $query = $this->db->query("SELECT * FROM user WHERE username=:u");

        return $query;
    }

    public function deleteUser($username) {
        $this->db->bind("u", $username);
        $query = $this->db->query("DELETE FROM user WHERE username=:u");
        
        return $query;
    }
}

?>