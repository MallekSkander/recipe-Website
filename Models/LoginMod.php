<?php

// The only responsibility of the "Model" is to
// query the database and return the results

require '../Classes/Database.php';

class LoginMod {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($username, $password) {
        $this->db->bind("u", $username);
        $pw = $this->db->single("SELECT password FROM user WHERE username=:u OR email=:u");

        // User exists and the password provided
        // in the form matches the hashed password
        if(!empty($pw) && (password_verify($password, $pw))) {
            return true;
        }

        return false;
    }

    public function isAdmin($username) {
        $this->db->bind("u", $username);
        $is_admin = $this->db->single("SELECT is_admin FROM user WHERE username=:u");

        if(intval($is_admin) == 0) {
            return false;
        }

        return true;
    }

    public function isBanned($username) {
        $this->db->bind("u", $username);
        $is_banned = $this->db->single("SELECT is_banned FROM user WHERE username=:u");

        if(intval($is_banned) == 0) {
            return false;
        }

        return true;
    }

    public function getState($username) {
        $this->db->bind("u", $username);
        $s = $this->db->single("SELECT state FROM user WHERE username=:u");
        return $s;
    }
}

?>