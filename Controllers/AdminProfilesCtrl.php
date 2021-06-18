<?php

require_once '../Classes/Controller.php';
require_once '../Models/AdminProfilesMod.php';

class AdminProfilesCtrl extends Controller {
    private $model;

    public function __construct() {
        $this->model = new AdminProfilesMod();
        $this->enforceRestrictions();
    }

    public function enforceRestrictions() {
        if (!isset($_SESSION['username'])) {
            header('location: profile.php');
            die();
        }

        if (!isset($_SESSION['is_admin'])) {
            header('location: profile.php');
            die();
        }
    }

    public function fetchUsers() {
        return $this->model->fetchUsers();
    }
}
    
?>