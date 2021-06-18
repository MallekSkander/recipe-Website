<?php

require '../Classes/Controller.php';
require '../Models/ProfileSecurityMod.php';
require_once '../Controllers/HistoryCtrl.php';

class ProfileSecurityCtrl extends Controller {
    public $model;

    public function __construct() {
        $this->model = new ProfileSecurityMod();
        $this->enforceRestrictions();
    }

    public function enforceRestrictions() {
		if (!isset($_SESSION['username'])) {
            header("location: ../login.php");
    		die();
		}
	}

    // Check if the password and password confirmation are identical.
    public function arePasswordsIdentical($password, $passwordConfirm) {
			if ( $password == $passwordConfirm) {
				return true;
			}

			return false;
	}

    public function updateUserPassword() {
        if($_SERVER['REQUEST_METHOD']=='POST') {
            $username = $_SESSION["username"];

			// Assign each form field to a variable
			$password_old = $_POST["password_old"];
			$password_new = $_POST["password_new"];
            $password_confirm = $_POST["password_confirm"];

			// Check if any of the required fields aren't set.
			$all_set = isset($password_old, $password_new, $password_confirm); 

			if ($all_set == false) {
                $this->setError("You forgot to fill some required (*) fields.");
                return;
            }

			$result = $this->arePasswordsIdentical($password_new, $password_confirm);
			if ($result == false) {
                $this->setError("Passwords do not match.");
                return;
            }

            // We're checking to see if the old password the user provided
            // actually matches their old password.
            $result = $this->model->fetchOldPassword($username, $password_old);
            if ($result == false) {
                $this->setError("The provided password does not match the old one.");
                return;
            }

            // All checks have passed, we can safely
			// update the user's password.
            $this->model->updateUserPassword(
                $username,
                $password_new
			);

		    $history = new HistoryCtrl();
            $history->addToHistory($username, "Updated the password", "0", date('Y-d-m'), date('H:i:s'));

			// Redirect the user to their profile page.
			header("location: profile.php");
        }
    }
}

?>