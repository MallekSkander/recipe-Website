<?php

// The only responsibility of the "Model" is to
// query the database and return the results

require '../Classes/Database.php';

class AdminProfilesMod {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchUsers() {
        return $this->db->query("SELECT * FROM user");
    }
}

?>