<?php

// The only responsibility of the "Model" is to
// query the database and return the results

require_once '../Classes/Database.php';

class RegisterMod {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createUser($fn, $ln, $e, $u, $pw, $s, $pn) {
        $stmt= "INSERT INTO user(first_name,last_name,email,username,password,state,phone_number) VALUES(:fn,:ln,:e,:u,:pw,:s,:pn)";
        $insert = $this->db->query($stmt, array(
            "fn"=>  $fn,
            "ln"=>  $ln,
            "e" =>  $e,
            "u" =>  $u,
            "pw"=>  password_hash($pw, PASSWORD_DEFAULT),
            "s" =>  $s,
            "pn"=>  $pn));

        if($insert > 0 ) {
            return 0;
        }

        return -1;
    }

    public function doesUserAlreadyExist($email, $username) {
        $this->db->bind("e",$email);
        $this->db->bind("u",$username);
        $select = $this->db->query("SELECT * FROM user WHERE email=:e OR username=:u");

        // User credentials already exist
        if(!empty($select)) {
            return true;
        }

        return false;
    }
}

?>