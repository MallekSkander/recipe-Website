<?php

// The only responsibility of the "Model" is to
// query the database and return the results

require_once '../Classes/Database.php';

class HistoryMod {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchHistory($username) {
        $this->db->bind("u", $username);
        $query = $this->db->query("SELECT description, date, time FROM history WHERE username=:u");

        return $query;
    }

    public function clearHistory($username) {
        $this->db->bind("u", $username);
        $query = $this->db->query("DELETE FROM history WHERE username=:u");
        
        return $query;
    }

    public function addToHistory($username, $description, $code, $date, $time) {
        $stmt= "INSERT INTO history(username,description,code,date,time) VALUES(:u,:de,:c,:da,:t)";
        $insert = $this->db->query($stmt, array(
            "u"=>   $username,
            "de"=>  $description,
            "c" =>  $code,
            "da" => $date,
            "t" => $time,
        ));

        if($insert > 0 ) {
            return 0;
        }

        return -1;
    }
}

?>