<?php

require_once '../Classes/Controller.php';
require_once '../Models/ProfileMod.php';

class ProfileCtrl extends Controller {
    public $model;

    public function __construct() {
        $this->model = new ProfileMod();
        $this->enforceRestrictions();
    }

    public function enforceRestrictions() {
        if (!isset($_SESSION['username'])) {
            header('location: login.php');
            die();
        }
    }

    public function fetchUserInformation() {
        $username = $_SESSION['username'];

        $result = $this->model->fetchUserInformation($username);

        if (!empty($result)) {
            return $result;
        }

        // Failed to get user information!
        // Redirect the user to the login page
        header('location: login.php');
    }

    public function deleteUser() {
        // Unset 'username' variable, destroy
        // the session and delete the user.
        $username = $_SESSION['username'];
        unset($_SESSION['username']);
        session_destroy();
        $result = $this->model->deleteUser($username);
    }

    public function logout() {
        unset($_SESSION['username']);
        session_destroy();
        header('location: index.html');
    }
}

?>