<?php

// The only responsibility of the "Model" is to
// query the database and return the results

require '../Classes/Database.php';

class AdminHistoryMod {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchHistory() {
        return $this->db->query("SELECT * FROM history");
    }
}

?>